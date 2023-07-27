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
        $this->middleware('permission:'.config('constants.Permissions.xml_listings'), ['only' => ['index','create', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $properties = Property::with('developer','agent','category','user')->latest()->get();

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
        $categories = Category::active()->latest()->get();
        $completionStatuses = CompletionStatus::active()->latest()->get();
        $communities = Community::active()->latest()->get();
        $subCommunities = Subcommunity::active()->latest()->get();
        $developers = Developer::active()->latest()->get();
        $offerTypes = OfferType::active()->latest()->get();
        $agents = Agent::active()->latest()->get();
        $currencies = ['AED'];
        $bedrooms = ['Studio',1,2,3,4,5,6,7,8,9,10,11];


        return view('dashboard.realEstate.properties.create', compact('developers','bedrooms','currencies','agents','amenities','subCommunities', 'accommodations', 'categories', 'completionStatuses', 'communities', 'developers', 'offerTypes'));
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
            $property->is_furniture = $request->is_furniture;
            $property->reference_number = $request->reference_number;
            $property->emirate = $request->emirate;
            $property->permit_number = $request->permit_number;
            $property->meta_title = $request->meta_title;
            $property->meta_description = $request->meta_description;
            $property->meta_keywords = $request->meta_keywords;
            $property->description = $request->description;
            $property->bathrooms = $request->bathrooms;
            $property->bedrooms = $request->bedrooms;
            $property->area = $request->area;
            $property->parking_space = $request->parking_space;
            $property->price = $request->price;
            $property->cheque_frequency = $request->cheque_frequency;
            $property->status = $request->status;
            $property->is_feature = $request->is_feature;
            $property->exclusive = $request->exclusive;
            $property->property_source = 'crm';
            $property->rating = $request->rating;
            $property->primary_view = $request->primary_view;
            $property->is_display_home = $request->is_display_home;
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
            if($request->has('developer_id')){
                $property->developer()->associate($request->developer_id);
            }

            if($request->has('sub_community_id')){
                $property->subcommunities()->associate($request->sub_community_id);
            }

            if($request->has('agent_id')){
                $property->agent()->associate($request->agent_id);
            }
            if($request->has('completion_status_id')){
                $property->completionStatus()->associate($request->completion_status_id);
            }
            if($request->has('developer_id')){
                $property->developer()->associate($request->developer_id);
            }

            if($request->has('offer_type_id')){
                $property->offerType()->associate($request->offer_type_id);
            }
            if($request->has('category_id')){
                $property->category()->associate($request->category_id);
            }

            if ($request->hasFile('mainImage')) {
                $img =  $request->file('mainImage');
                $ext = $img->getClientOriginalExtension();
                $imageName =  Str::slug($request->name).'.'.$ext;

                $property->addMediaFromRequest('mainImage')->usingFileName($imageName)->toMediaCollection('mainImages', 'propertyFiles' );
            }
            if ($request->hasFile('qr')) {
                $img =  $request->file('qr');
                $ext = $img->getClientOriginalExtension();
                $imageName =  Str::slug($request->name).'_qr.'.$ext;

                $property->addMediaFromRequest('qr')->usingFileName($imageName)->toMediaCollection('qrs', 'propertyFiles' );
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
        $categories = Category::active()->latest()->get();
        $completionStatuses = CompletionStatus::active()->latest()->get();
        $communities = Community::with('subCommunities')->active()->latest()->get();
        $developers = Developer::active()->latest()->get();
        $offerTypes = OfferType::active()->latest()->get();
        $agents = Agent::active()->latest()->get();
        $currencies = ['AED'];
        $bedrooms = ['Studio',1,2,3,4,5,6,7,8,9,10,11];
        return view('dashboard.realEstate.properties.edit', compact('bedrooms','currencies','agents','property','amenities', 'accommodations', 'categories', 'completionStatuses', 'communities', 'developers', 'offerTypes'));
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
            $property->is_furniture = $request->is_furniture;
            $property->reference_number = $request->reference_number;
            $property->emirate = $request->emirate;
            $property->permit_number = $request->permit_number;
            $property->meta_title = $request->meta_title;
            $property->meta_description = $request->meta_description;
            $property->meta_keywords = $request->meta_keywords;
            $property->description = $request->description;
            $property->bathrooms = $request->bathrooms;
            $property->bedrooms = $request->bedrooms;
            $property->area = $request->area;
            $property->parking_space = $request->parking_space;
            $property->price = $request->price;
            $property->cheque_frequency = $request->cheque_frequency;
            $property->status = $request->status;
            $property->is_feature = $request->is_feature;
            $property->exclusive = $request->exclusive;
            $property->property_source = $request->property_source;
            $property->rating = $request->rating;
            $property->primary_view = $request->primary_view;
            $property->is_display_home = $request->is_display_home;
            $property->address_longitude = $request->address_longitude;
            $property->address_latitude = $request->address_latitude;
            $property->address = $request->address;
            $property->user_id = Auth::user()->id;

            if($request->has('community_id')){
                $property->community_id = $request->community_id;
            }

            if($request->has('sub_community_id')){
                $property->subcommunity_id = $request->sub_community_id;
            }
            if($request->has('developer_id')){
                $property->developer_id = $request->developer_id;
            }

            if($request->has('agent_id')){
                $property->agent_id = $request->agent_id;
            }

            $property->rating = $request->rating;
            $property->primary_view = $request->primary_view;

            if($request->has('completion_status_id')){
                $property->completion_status_id = $request->completion_status_id;
            }

            if($request->has('offer_type_id')){
                $property->offer_type_id = $request->offer_type_id;
            }
            if($request->has('category_id')){
                $property->category_id = $request->category_id;
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
            if ($request->hasFile('qr')) {
                $property->clearMediaCollection('qrs');
                $img =  $request->file('qr');
                $ext = $img->getClientOriginalExtension();
                $imageName =  Str::slug($request->name).'_qr.'.$ext;

                $property->addMediaFromRequest('qr')->usingFileName($imageName)->toMediaCollection('qrs', 'propertyFiles' );
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
