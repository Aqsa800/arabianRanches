<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Dashboard\PropertyRequest;
use App\Models\{
    Property,
    Amenity,
    Accommodation,
    Category,
    CompletionStatus,
    Community,
    Developer,
    Feature,
    OfferType,
    Specification,
    Agent,
    PropertyBedroom,
    PropertyDetail,
    Subcommunity
};
use Auth;
use DB;

class PropertyController extends Controller
{
    function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $properties = Property::with('user')->latest()->get();

        return view('dashboard.realEstate.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $amenities = Amenity::active()->latest()->get();
        $accommodations = Accommodation::active()->latest()->get();
        $communities = Community::active()->latest()->get();
        $offerTypes = OfferType::active()->latest()->get();
        $currencies = ['AED'];
        $bedrooms = ['Studio',1,2,3,4,5,6,7,8,9,10,11];


        return view('dashboard.realEstate.properties.create', compact('bedrooms','amenities', 'accommodations', 'communities', 'offerTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        DB::beginTransaction();
        try{

            $property = new Property;
            $property->name = $request->name;
            $property->sub_title = $request->sub_title;
            $property->reference_number = $request->reference_number;
            $property->meta_title = $request->meta_title;
            $property->meta_description = $request->meta_description;
            $property->meta_keywords = $request->meta_keywords;
            $property->description = $request->description;
            $property->bathrooms = $request->bathrooms;
            $property->bedrooms = $request->bedrooms;
            $property->area = $request->area;
            $property->price = $request->price;
            $property->status = $request->status;
            $property->property_source = 'crm';

            $property->address_longitude = $request->address_longitude;
            $property->address_latitude = $request->address_latitude;
            $property->address = $request->address;
            $property->user_id = Auth::user()->id;

            if($request->has('accommodation_id')){
                $property->accommodations()->associate($request->accommodation_id);
            }

            if($request->has('community_id')){
                $property->communities()->associate($request->community_id);
            }

            if($request->has('offer_type_id')){
                $property->offerType()->associate($request->offer_type_id);
            }

            if ($request->hasFile('mainImage')) {
                $img =  $request->file('mainImage');
                $ext = $img->getClientOriginalExtension();
                $imageName =  Str::slug($request->name).'.'.$ext;

                $property->addMediaFromRequest('mainImage')->usingFileName($imageName)->toMediaCollection('mainImages', 'propertyFiles' );
            }


            if ($request->hasFile('subImages')) {
                foreach($request->subImages as $img)
                {
                    $property->addMedia($img)->toMediaCollection('subImages', 'propertyFiles');
                }
            }

            $property->save();
            if($request->has('amenityIds')){
                $property->amenities()->attach($request->amenityIds);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message'=> 'Property has been created successfully.',
                'redirect' => route('dashboard.properties.index'),
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'success' => false,
                'message'=> $error->getMessage(),
                'redirect' => route('dashboard.properties.index'),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {

        $amenities = Amenity::active()->latest()->get();
        $accommodations = Accommodation::active()->latest()->get();
        $communities = Community::active()->latest()->get();
        $offerTypes = OfferType::active()->latest()->get();
        $bedrooms = ['Studio',1,2,3,4,5,6,7,8,9,10,11];
        return view('dashboard.realEstate.properties.edit', compact('bedrooms','property','amenities', 'accommodations',  'communities', 'offerTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, Property $property)
    {

        DB::beginTransaction();
        try{
            $property->name = $request->name;
            $property->sub_title = $request->sub_title;
            $property->reference_number = $request->reference_number;
            $property->meta_title = $request->meta_title;
            $property->meta_description = $request->meta_description;
            $property->meta_keywords = $request->meta_keywords;
            $property->description = $request->description;
            $property->bathrooms = $request->bathrooms;
            $property->bedrooms = $request->bedrooms;
            $property->area = $request->area;
            $property->price = $request->price;
            $property->status = $request->status;
            $property->property_source = $request->property_source;

            $property->address_longitude = $request->address_longitude;
            $property->address_latitude = $request->address_latitude;
            $property->address = $request->address;
            $property->user_id = Auth::user()->id;

            if($request->has('community_id')){
                $property->community_id = $request->community_id;
            }
            if($request->has('offer_type_id')){
                $property->offer_type_id = $request->offer_type_id;
            }

            if($request->has('accommodation_id')){
                $property->accommodation_id = $request->accommodation_id;
            }

            if ($request->hasFile('mainImage')) {
                $property->clearMediaCollection('mainImage');
                $img =  $request->file('mainImage');
                $ext = $img->getClientOriginalExtension();
                $imageName =  Str::slug($request->name).'.'.$ext;
                $property->addMediaFromRequest('mainImage')->usingFileName($imageName)->toMediaCollection('mainImages', 'propertyFiles' );
            }

            if ($request->hasFile('subImages')) {

                foreach($request->subImages as $img)
                {
                    $property->addMedia($img)->toMediaCollection('subImages', 'propertyFiles');
                }
            }

            $property->save();

            if($request->has('amenityIds')){
                $property->amenities()->detach();
                $property->amenities()->attach($request->amenityIds);
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message'=> 'Property has been updated successfully.',
                'redirect' => route('dashboard.properties.index'),
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'success' => false,
                'message'=> $error->getMessage(),
                'redirect' => route('dashboard.properties.index'),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Property::find($id)->delete();

            return redirect()->route('dashboard.properties.index')->with('success','Property has been deleted successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.properties.index')->with('error',$error->getMessage());
        }

    }
    public function mediaDestroy(Property $property, $media)
    {
        try{
            $property->deleteMedia($media);
            return redirect()->route('dashboard.properties.edit', $property->id)->with('success','Property Image has been deleted successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.properties.edit', $property->id)->with('error',$error->getMessage());
        }
    }
    public function mediasDestroy(Property $property)
    {
        try{
            $property->clearMediaCollection('subImages');
            return redirect()->route('dashboard.properties.edit', $property->id)->with('success','Property Gallery has been deleted successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.properties.edit', $property->id)->with('error',$error->getMessage());
        }
    }

}
