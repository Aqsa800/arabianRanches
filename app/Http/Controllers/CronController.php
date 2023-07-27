<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{
    Accommodation,
    Agent,
    Amenity,
    Category,
    Community,
    CompletionStatus,
    Developer,
    Imagegallery,
    OfferType,
    Property,
    PropertyAmenity,
    Subcommunity
};
use Illuminate\Http\File;
use App\Jobs\XMLSubImageJob;

class CronController extends Controller
{




    public function addxml()
    {
        $apiURL     = 'https://manda.propertybase.com/api/v2/feed/00D4J000000qB4kUAE/XML2U/a0L4J0000008Hk4UAE/full';

        $xml_arr  = simplexml_load_file($apiURL, 'SimpleXMLElement', LIBXML_NOCDATA);

        $xml_arr  = json_decode(json_encode($xml_arr, true), true);


        foreach ($xml_arr['listing'] as $key => $value) {

            $allraedy               = Property::where('reference_number', $value['id'])->first();

            $property               = $allraedy ? $allraedy : new Property;

            $property->reference_number     = array_key_exists("id", $value) ? $value['id'] : '';

            $property->unit_refNo     = array_key_exists("custom_fields", $value) ? (!empty($value['custom_fields']['unit_number']) ? $value['custom_fields']['unit_number'] : '') : '';

            $property->permit_number     = array_key_exists("custom_fields", $value) ? (!empty($value['custom_fields']['pba_uaefields__rera_permit_number']) ? $value['custom_fields']['pba_uaefields__rera_permit_number'] : '') : '';
            $property->sub_title     = array_key_exists("custom_fields", $value) ? (!empty($value['custom_fields']['pba_uaefields__property_propertyfinder']) ? $value['custom_fields']['pba_uaefields__property_propertyfinder'] : '') : '';
            $property->name     = array_key_exists("general_listing_information", $value) ? (!empty($value['general_listing_information']['listing_title']) ? $value['general_listing_information']['listing_title'] : '') : '';

            // $property->community_id = 1;

            // $property->category_id = 1;
            // $property->user_id = 1;

            $property->description     = array_key_exists("general_listing_information", $value) ? (!empty($value['general_listing_information']['description']) ? $value['general_listing_information']['description'] : '') : '';


            $property->bedrooms     = array_key_exists("general_listing_information", $value) ? (!empty($value['general_listing_information']['bedrooms']) ? $value['general_listing_information']['bedrooms'] : 0) : 0;
            $property->bathrooms     = array_key_exists("general_listing_information", $value) ? (!empty($value['general_listing_information']['fullbathrooms']) ? $value['general_listing_information']['fullbathrooms'] : 0) : 0;
            $property->parking_space     = array_key_exists("custom_fields", $value) ? (!empty($value['custom_fields']['pba_uaefields__parking']) ? $value['custom_fields']['pba_uaefields__parking'] : 0) : 0;
            $property->furnished     = array_key_exists("custom_fields", $value) ? (!empty($value['custom_fields']['pba_uaefields__furnished']) ? $value['custom_fields']['pba_uaefields__furnished'] : '') : '';

            $property->area     = array_key_exists("general_listing_information", $value) ? (!empty($value['general_listing_information']['totalarea']) ? $value['general_listing_information']['totalarea'] : '') : '';


            $property->price     = array_key_exists("general_listing_information", $value) ? (!empty($value['general_listing_information']['listingprice']) ? $value['general_listing_information']['listingprice'] : '') : '';
            $property->currency     = array_key_exists("general_listing_information", $value) ? (!empty($value['general_listing_information']['currency_iso_code']) ? $value['general_listing_information']['currency_iso_code'] : '') : '';

            $property->cheque_frequency     = array_key_exists("custom_fields", $value) ? (!empty($value['custom_fields']['pba_uaefields__price_unit']) ? $value['custom_fields']['pba_uaefields__price_unit'] : '') : '';

            $property->address     = array_key_exists("custom_fields", $value) ? (!empty($value['custom_fields']['pba_uaefields__propertyfinder_region']) ? $value['custom_fields']['pba_uaefields__propertyfinder_region'] : '') : '';


            $property->exclusive     = array_key_exists("custom_fields", $value) ? (!empty($value['custom_fields']['exclusive']) ? ($value['custom_fields']['exclusive'] == "true" ? '1' : '0') : '0') : '0';

            $property->address_latitude     = array_key_exists("address_information", $value) ? (!empty($value['address_information']['latitude']) ? $value['address_information']['latitude'] : 0) : 0;
            $property->address_longitude     = array_key_exists("address_information", $value) ? (!empty($value['address_information']['longitude']) ? $value['address_information']['longitude'] : 0) : 0;

            $property->emirate     = array_key_exists("address_information", $value) ? (!empty($value['address_information']['city']) ? $value['address_information']['city'] : '') : '';

            $property->primary_view     = array_key_exists("custom_fields", $value) ? (!empty($value['custom_fields']['pba_uaefields__view']) ? $value['custom_fields']['pba_uaefields__view'] : '') : '';


            $property->property_source     = 'xml';

            $property->status     = array_key_exists("general_listing_information", $value) ? (!empty($value['general_listing_information']['status']) ? $value['general_listing_information']['status'] : config('constants.active')) : config('constants.active');

            $property->rating     = 5;
            $property->user_id     = 1;


            $staCode = array_key_exists("general_listing_information", $value) ? (!empty($value['general_listing_information']['listingtype']) ? $value['general_listing_information']['listingtype'] : '') : '';
            if ($staCode != '') {
                if ($staCode == "Sale" || $staCode == "sale") {
                    $staCode = "Resale";
                }
                $cat = Category::where('name', 'like', '%' . $staCode . '%')->first();
                if (!empty($cat)) {
                    $property->category()->associate($cat->id);
                } else {
                    $catgry = new Category;
                    $catgry->name = $staCode;
                    $catgry->status = config('constants.active');
                    $catgry->user_id = 1;
                    $catgry->save();
                    $property->category()->associate($catgry->id);
                }
            }

            $comName = array_key_exists("custom_fields", $value) ? (!empty($value['custom_fields']['pba_uaefields__community_propertyfinder']) ? $value['custom_fields']['pba_uaefields__community_propertyfinder'] : '') : '';
            if ($comName != '') {
                $community = Community::where('name', 'like', '%' . $comName . '%')->first();
                if (!empty($community)) {
                    $property->communities()->associate($community->id);
                } else {
                    $comnty = new Community();
                    $comnty->name = $comName;
                    $comnty->emirates = array_key_exists("address_information", $value) ? (!empty($value['address_information']['city']) ? $value['address_information']['city'] : '') : '';
                    $comnty->status = config('constants.active');
                    $comnty->user_id = 1;
                    $comnty->save();
                    $property->communities()->associate($comnty->id);
                }
            }

            $offerType = array_key_exists("custom_fields", $value) ? (!empty($value['custom_fields']['pba_uaefields__property_sub_type']) ? $value['custom_fields']['pba_uaefields__property_sub_type'] : '') : '';
            if ($offerType != '') {
                $offerName = explode(' ', trim($offerType))[0];

                $offType = OfferType::where('name', 'like', '%' . $offerName . '%')->first();
                if (!empty($offType)) {
                    $property->offerType()->associate($offType->id);
                } else {
                    $typeOffer = new OfferType();
                    $typeOffer->name = $offerName;
                    $typeOffer->status = config('constants.active');
                    $typeOffer->user_id = 1;
                    $typeOffer->save();
                    $property->offerType()->associate($typeOffer->id);
                }
            }

            $subComName = array_key_exists("custom_fields", $value) ? (!empty($value['custom_fields']['pba_uaefields__sub_community_propertyfinder']) ? $value['custom_fields']['pba_uaefields__sub_community_propertyfinder'] : '') : '';
            if ($subComName != '') {
                $subCommunity = Subcommunity::where('name', 'like', '%' . $subComName . '%')->where('community_id', $property->community_id)->first();
                if (!empty($subCommunity)) {
                    $property->subcommunities()->associate($subCommunity->id);
                } else {
                    $subComnty = new Subcommunity();
                    $subComnty->name = $subComName;
                    $subComnty->community_id = $property->community_id;
                    $subComnty->status = config('constants.active');
                    $subComnty->user_id = 1;
                    $subComnty->save();
                    $property->subcommunities()->associate($subComnty->id);
                }
            }

            $propAccom = array_key_exists("general_listing_information", $value) ? (!empty($value['general_listing_information']['propertytype']) ? $value['general_listing_information']['propertytype'] : '') : '';
            if ($propAccom != '') {
                $propTyp = Accommodation::where('name', 'like', '%' . $propAccom . '%')->first();
                $acc = $propTyp ? $propTyp : new Accommodation;
                $acc->name = $propAccom;
                $acc->status = config('constants.active');
                $acc->user_id = 1;
                $acc->save();
                $property->accommodations()->associate($acc->id);
            }

            if (array_key_exists("listing_agent", $value)) {
                $existsuser = Agent::where('email', $value['listing_agent']['listing_agent_email'])->first();

                $users = $existsuser ? $existsuser : new Agent;
                $users->name = (isset($value['listing_agent']['listing_agent_firstname']) ? $value['listing_agent']['listing_agent_firstname'] : '') . ' ' . (isset($value['listing_agent']['listing_agent_lastname']) ? $value['listing_agent']['listing_agent_lastname'] : '');
                $users->email = isset($value['listing_agent']['listing_agent_email']) ? $value['listing_agent']['listing_agent_email'] : '';
                $users->whatsapp_number = isset($value['listing_agent']['listing_agent_mobil_phone']) ? $value['listing_agent']['listing_agent_mobil_phone'] : '';
                $users->contact_number = isset($value['listing_agent']['listing_agent_phone']) ? $value['listing_agent']['listing_agent_phone'] : '';
                $users->status = config('constants.Inactive');
                $users->user_id = 1;
                $users->save();
                $property->agent()->associate($users->id);
            }

            $compStatus = array_key_exists("custom_fields", $value) ? (!empty($value['custom_fields']['pba_uaefields__completion_status']) ? $value['custom_fields']['pba_uaefields__completion_status'] : '') : '';

            if ($compStatus != '') {
                $existcompl = CompletionStatus::where('name', 'like', '%' . $compStatus . '%')->first();
                if (!empty($existcompl)) {
                    $property->completionStatus()->associate($existcompl->id);
                } else {
                    $existcomplStats =  new CompletionStatus;
                    $existcomplStats->name = $compStatus;
                    $existcomplStats->status = config('constants.active');
                    $existcomplStats->user_id = 1;
                    $existcomplStats->save();

                    $property->completionStatus()->associate($existcomplStats->id);
                }
            }

            $property->save();



            $amnnity = array_key_exists("custom_fields", $value) ? (!empty($value['custom_fields']['pba_uaefields__private_amenities']) ? $value['custom_fields']['pba_uaefields__private_amenities'] : '') : '';

            if ($amnnity != '') {
                $amnIdAll = [];
                $amnityAll = explode(";", $amnnity);
                foreach ($amnityAll as $keys => $faci) {

                    $checkFC = Amenity::where('name', $faci)->first();
                    $facility  = $checkFC ? $checkFC : new Amenity();
                    $facility->name   = $faci;
                    $facility->status   = config('constants.active');
                    $facility->user_id   = 1;
                    $facility->save();
                    $facCheck = PropertyAmenity::where('property_id', $property->id)->where('amenity_id', $facility->id)->first();
                    if ($facCheck) {
                    } else {
                        $propertyAmn = new PropertyAmenity;
                        $propertyAmn->property_id = $property->id;
                        $propertyAmn->amenity_id  = $facility->id;
                        $propertyAmn->save();
                    }
                }
            }
        }
        echo "Property added successfully.";
    }
    public function addxmlMainImg()
    {
        ini_set('max_execution_time', 6000);
        set_time_limit(6000);
        $apiURL     = 'https://manda.propertybase.com/api/v2/feed/00D4J000000qB4kUAE/XML2U/a0L4J0000008Hk4UAE/full';

        $xml_arr  = simplexml_load_file($apiURL, 'SimpleXMLElement', LIBXML_NOCDATA);

        $xml_arr  = json_decode(json_encode($xml_arr, true), true);
        foreach ($xml_arr['listing'] as $key => $value) {

            $allraedy               = Property::where('reference_number', $value['id'])->first();


            $property = $allraedy ? $allraedy : new Property;

            $img = array_key_exists("listing_media", $value) ? (!empty($value['listing_media']['images']) ? $value['listing_media']['images']['image']['0']['url'] : '') : '';
            if ($allraedy) {
                $property->clearMediaCollection('mainImages');
            }
           try {
            $property->addMediaFromUrl($img)->toMediaCollection('mainImages', 'propertyFiles');
           } catch (\Throwable $th) {
            //throw $th;
           }


        }
        echo "Property Image added successfully.";
    }
    public function addxmlSubImg()
    {
       // XMLSubImageJob::dispatch();

        ini_set('max_execution_time', 6000);
        set_time_limit(6000);
        $apiURL     = 'https://manda.propertybase.com/api/v2/feed/00D4J000000qB4kUAE/XML2U/a0L4J0000008Hk4UAE/full';

        $xml_arr  = simplexml_load_file($apiURL, 'SimpleXMLElement', LIBXML_NOCDATA);

        $xml_arr  = json_decode(json_encode($xml_arr, true), true);
        foreach ($xml_arr['listing'] as $key => $value) {

            $allraedy               = Property::where('reference_number', $value['id'])->first();

            $property               = $allraedy ? $allraedy : new Property;
            if ($allraedy) {
                $property->clearMediaCollection('subImages');
            }

            if (array_key_exists("listing_media", $value) && (count($value['listing_media']['images']['image']) > 0)) {
                foreach ($value['listing_media']['images']['image'] as $keys => $img) {
                    // if(filesize($img['url']) < (128 * 1024)){
                        if ($keys < 5) {
                            $property->addMediaFromUrl($img['url'])->toMediaCollection('subImages', 'propertyFiles');
                        } else {
                             break;
                        }
                    // }
                }
            }
        }
        echo "Property Sub Images added successfully.";
    }

}
