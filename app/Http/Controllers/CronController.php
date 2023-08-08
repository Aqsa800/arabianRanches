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
    Property,
    PropertyBedroom,
    PropertyAccommodation,
    PropertyAmenity,
    Subcommunity
};
class CronController extends Controller
{

    public function addxml() {
        $apiURL     = 'http://xml.propspace.com/feed/xml.php?cl=1019&pid=8245&acc=8807';

        $xml_arr  = simplexml_load_file($apiURL,'SimpleXMLElement',LIBXML_NOCDATA);

       $xml_arr  = json_decode(json_encode($xml_arr,true),true);

        // dd($xml_arr['Listing']);
        $propertAll = Property::where('reference_number','!=', NULL)->get();

        foreach($propertAll as $prop){
            $flag = 0;
            foreach($xml_arr['Listing'] as $key => $value){
                if($prop['reference_number'] == $value['Property_Ref_No']){
                    $flag = 1;
                    break;
                }else{
                    $flag = 0;
                }
            }
            if($flag == 0){
                $propDel = Property::where('id','=', $prop['id'])->first();
                $gallDelProp = Imagegallery::where('property_id',$prop['id'])->get();
                foreach($gallDelProp as $gallr){
                    $gallr->delete();
                }

                $propDel->amenities()->detach();
                $propDel->accommodations()->detach();

                //dd($propDel);
                $propDel->delete();
            }
        }
        foreach($xml_arr['Listing'] as $key => $value) {

            $allraedy               = Property::where('reference_number',$value['Property_Ref_No'])->first();
            $property               = $allraedy ? $allraedy : new Property;

                $img = array_key_exists("Images",$value) ? (!empty($value['Images']) ? $value['Images']['image']['0'] : '') : 'frontend/assets/images/properties/p1.webp';
                $property->cover_img = $img;

                $property->reference_number     = array_key_exists("Property_Ref_No",$value) ? $value['Property_Ref_No'] : '';
                $property->unit_refNo     = array_key_exists("Unit_Reference_No",$value) ? (!empty($value['Unit_Reference_No']) ? $value['Unit_Reference_No'] : '') : '';
                $property->permit_number     = array_key_exists("permit_number",$value) ? (!empty($value['permit_number']) ? $value['permit_number'] : '') : '';
                $property->sub_title     = array_key_exists("Property_Name",$value) ? (!empty($value['Property_Name']) ? $value['Property_Name'] : '') : '';
                $property->name     = array_key_exists("Property_Title",$value) ? (!empty($value['Property_Title']) ? $value['Property_Title'] : '') : '';
                // $property->community_id = 1;

                // $property->category_id = 1;
                // $property->user_id = 1;

                $property->description     = array_key_exists("Web_Remarks",$value) ? (!empty($value['Web_Remarks']) ? $value['Web_Remarks'] : '') : '';

                $property->bedrooms     = array_key_exists("No_of_Rooms",$value) ? (!empty($value['No_of_Rooms']) ? $value['No_of_Rooms'] : 0) : 0;
                $property->bathrooms     = array_key_exists("No_of_Bathroom",$value) ? (!empty($value['No_of_Bathroom']) ? $value['No_of_Bathroom'] : 0) : 0;
                $property->parking     = array_key_exists("Parking",$value) ? (!empty($value['Parking']) ? $value['Parking'] : 0) : 0;
                $property->built_area     = array_key_exists("Unit_Builtup_Area",$value) ? (!empty($value['Unit_Builtup_Area']) ? $value['Unit_Builtup_Area'] : '') : '';
                $property->plot_area     = array_key_exists("Plot_Area",$value) ? (!empty($value['Plot_Area']) ? $value['Plot_Area'] : '') : '';
                $property->unit_measure     = array_key_exists("unit_measure",$value) ? (!empty($value['unit_measure']) ? $value['unit_measure'] : 'Sq.Ft.') : 'Sq.Ft.';
                $property->price     = array_key_exists("Price",$value) ? (!empty($value['Price']) ? $value['Price'] : '') : '';
                $property->cheques     = array_key_exists("Cheques",$value) ? (!empty($value['Cheques']) ? $value['Cheques'] : 0) : 0;
                $property->cheque_frequency     = array_key_exists("Frequency",$value) ? (!empty($value['Frequency']) ? $value['Frequency'] : '') : '';
                $property->unit_model     = array_key_exists("unit_model",$value) ? (!empty($value['unit_model']) ? $value['unit_model'] : '') : '';
                // $property->is_feature     = array_key_exists("Featured",$value) ? (!empty($value['Featured']) ? $value['Featured'] : 0) : 0;
                $property->exclusive     = array_key_exists("Exclusive",$value) ? (!empty($value['Exclusive']) ? $value['Exclusive'] : '0') : '0';

                $property->address_latitude     = array_key_exists("Latitude",$value) ?(!empty($value['Latitude']) ? $value['Latitude'] : 0) : 0;
                $property->address_longitude     = array_key_exists("Longitude",$value) ? (!empty($value['Longitude']) ? $value['Longitude'] : 0) : 0;
                $property->emirate     = array_key_exists("Emirate",$value) ? (!empty($value['Emirate']) ? $value['Emirate'] : '') : '';
                $property->primary_view     = array_key_exists("Primary_View",$value) ? (!empty($value['Primary_View']) ? $value['Primary_View'] : '') : '';
                $property->web_tour     = array_key_exists("Web_Tour",$value) ? (!empty($value['Web_Tour']) ? $value['Web_Tour'] : '') : '';
                $property->threesixty_tour     = array_key_exists("Threesixty_Tour",$value) ? (!empty($value['Threesixty_Tour']) ? $value['Threesixty_Tour'] : '') : '';
                $property->audio_tour     = array_key_exists("Audio_Tour",$value) ? (!empty($value['Audio_Tour']) ? $value['Audio_Tour'] : '') : '';
                $property->virtual_tour     = array_key_exists("Virtual_Tour",$value) ? (!empty($value['Virtual_Tour']) ? $value['Virtual_Tour'] : '') : '';
                $property->property_source     = 'xml';
                $property->status     = 'active';
                $property->rating     = 5;
                $property->user_id     = 1;
                $property->featured_project     = 0;


                $staCode = array_key_exists("Ad_Type",$value) ? $value['Ad_Type']: '';
                if($staCode != ''){
                    $cat = Category::where('name', 'like', '%' .$staCode. '%')->first();
                    if(!empty($cat)){
                        $property->category()->associate($cat->id);
                    }else{
                        $catgry = new Category;
                        $catgry->name = $staCode;
                        $catgry->status = 'active';
                        $catgry->user_id = 1;
                        $catgry->save();
                        $property->category()->associate($catgry->id);
                    }
                }

                $devName = array_key_exists("Developer",$value) ? $value['Developer'] : '';
                if($devName != ''){
                    $partner = Developer::where('name', 'like', '%' .$devName. '%')->first();
                    if(!empty($partner)){
                        $property->developer()->associate($partner->id);
                    }else{
                        $partnr = new Developer;
                        $partnr->name = $devName;
                        $partnr->status = 'active';
                        $partnr->save();
                        $property->developer()->associate($partnr->id);
                    }
                }

                $comName = array_key_exists("Community",$value) ? $value['Community'] : '';
                if($comName != ''){
                    $community = Community::where('name', 'like', '%' .$comName. '%')->first();
                    if(!empty($community)){
                        $property->communities()->associate($community->id);
                    }else{
                        $comnty = new Community();
                        $comnty->name = $comName;

                        $comnty->emirates = array_key_exists("Emirate",$value) ? $value['Emirate'] : '';
                        $comnty->status = 'active';
                        $comnty->user_id = 1;
                        $comnty->guide = 0;
                        $comnty->save();
                        $property->communities()->associate($comnty->id);
                    }
                }
                $subComName = array_key_exists("Property_Name",$value) ? $value['Property_Name'] : '';
                if($subComName != ''){
                    $subCommunity = Subcommunity::where('name', 'like', '%' .$subComName. '%')->where('community_id',$property->community_id)->first();
                    if(!empty($subCommunity)){
                        $property->subcommunities()->associate($subCommunity->id);
                    }else{
                        $subComnty = new Subcommunity();
                        $subComnty->name = $subComName;
                        $subComnty->community_id = $property->community_id;
                        $subComnty->status = 'active';
                        $subComnty->user_id = 1;
                        $subComnty->save();
                        $property->subcommunities()->associate($subComnty->id);
                    }
                }

                if(array_key_exists("Listing_Agent",$value)){
                   $existsuser = Agent::where('email',$value['Listing_Agent_Email'])->first();

                   $users = $existsuser ? $existsuser : new Agent;
                   $users->name = isset($value['Listing_Agent']) ? $value['Listing_Agent'] : '';
                   $users->email = isset($value['Listing_Agent_Email']) ? $value['Listing_Agent_Email'] : '';
                   $users->contact_number = isset($value['Listing_Agent_Phone']) ? $value['Listing_Agent_Phone'] : '';
                   $users->user_id = 1;
                   $users->save();
                   $property->agent()->associate($users->id);
                }

                $compStatus = array_key_exists("completion_status",$value) ? $value['completion_status'] : '';

                if(!is_array($value['completion_status']) ){
                    $existcompl = CompletionStatus::where('name', 'like', '%' .$compStatus. '%')->first();
                    if(!empty($existcompl)){
                        $property->completionStatus()->associate($existcompl->id);
                    }else{
                        $existcomplStats =  new CompletionStatus;
                        $existcomplStats->name = $compStatus;
                        $existcomplStats->status = 'active';
                        $existcomplStats->user_id = 1;
                        $existcomplStats->save();

                        $property->completionStatus()->associate($existcomplStats->id);
                    }

                }

                $property->save();
            if(array_key_exists("Bedrooms",$value)){
                $bedCheck = PropertyBedroom::where('property_id',$property->id)->where('bedroom',$value['Bedrooms'])->first();
                if($bedCheck){}else{
                    $bedroom = new PropertyBedroom;
                    $bedroom->property_id= $property->id;
                    $bedroom->bedroom = $value['Bedrooms'];
                    $bedroom->save();
                }
            }

            if(array_key_exists("Unit_Type",$value)){


                $propTyp = Accommodation::where('name',$value['Unit_Type'])->first();
                $acc = $propTyp ? $propTyp : new Accommodation;
                $acc->name = $value['Unit_Type'];
                $acc->status = 'active';
                $acc->user_id = 1;
                $acc->save();
                $accCheck = PropertyAccommodation::where('property_id',$property->id)->where('accommodation_id',$acc->id)->first();
                if($accCheck){}else{
                $propertyAcc = new PropertyAccommodation;
                $propertyAcc->property_id= $property->id;
                $propertyAcc->accommodation_id  = $acc->id;
                $propertyAcc->save();
                }
            }

            if(array_key_exists("Images",$value) && (count($value['Images']['image']) > 0)){
                foreach ($value['Images']['image'] as $keys => $img) {

                    $checkGM = Imagegallery::where('property_id',$property->id)->where('image',$img)->first();
                    $gallery                = $checkGM ? $checkGM : new Imagegallery;
                    $gallery->property_id   = $property->id;
                    $gallery->image  = $img;
                    $gallery->category  = 'gallery';
                    $gallery->save();
                }
            }

            if(array_key_exists("Facilities",$value)) {
                $amnIdAll =[];
                foreach($value['Facilities']['facility'] as $keys => $faci) {

                    $checkFC = Amenity::where('name',$faci)->first();
                    $facility  = $checkFC ? $checkFC : new Amenity();
                    $facility->name   = $faci;
                    $facility->status   = 'active';
                    $facility->user_id   = 1;
                    $facility->save();
                    $facCheck = PropertyAmenity::where('property_id',$property->id)->where('amenity_id',$facility->id)->first();
                    if($facCheck){}else{
                        $propertyAmn = new PropertyAmenity;
                        $propertyAmn->property_id= $property->id;
                        $propertyAmn->amenity_id  = $facility->id;
                        $propertyAmn->save();
                    }
                }
            }
        }
        echo "Property add successfully.";
    }
}
