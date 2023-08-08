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
    Neighbour,
    Agent,
    PropertyBedroom,
    PropertyDetail,
    Subcommunity
};
use Auth;
use DB;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $properties = Property::with('user')->latest()->get();

        return view('dashboard.realState.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $amenities = Amenity::active()->orderBy('id','desc')->get();
        $accommodations = Accommodation::active()->orderBy('id','desc')->get();
        $categories = Category::active()->orderBy('id','desc')->get();
        $completionStatuses = CompletionStatus::active()->orderBy('id','desc')->get();
        $communities = Community::active()->orderBy('id','desc')->get();
        $subCommunity = Subcommunity::active()->orderBy('id','desc')->get();
        $developers = Developer::active()->orderBy('id','desc')->get();
        $offerTypes = OfferType::active()->orderBy('id','desc')->get();
        $agents = Agent::active()->orderBy('id','desc')->get();

        return view('dashboard.realState.properties.create', compact('agents','amenities','subCommunity', 'accommodations', 'categories', 'completionStatuses', 'communities', 'developers', 'offerTypes'));
    }
    public function createSlug($title)
    {
        // Normalize the title
        $slug = Str::slug($title);
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug);
        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i >= 1; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        //throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($slug)
    {
        return Property::select('slug')->where('slug', 'like', $slug.'%')->get();
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
            $property->permit_number = $request->permit_number;
            $property->meta_title = $request->meta_title;
            $property->meta_description = $request->meta_description;
            $property->meta_keyword = $request->meta_keyword;
            $property->slug = $this->createSlug($request->name);
            $property->description = $request->description;
            $property->bathrooms = $request->bathrooms;
            $property->parking = $request->parking_space;
            $property->unit_model = $request->unit_model;
            $property->price = $request->price;
            $property->cheques = $request->cheques;
            $property->cheque_frequency = $request->cheque_frequency;
            $property->built_area = $request->area;
            $property->plot_area = $request->plot_area;
            $property->unit_measure = $request->unit_measure;
            $property->status = $request->status;
            $property->is_feature = $request->is_feature;
            $property->featured_project = $request->featured_project;
            $property->exclusive = $request->exclusive;
            $property->emirate = $request->emirate;
            
            if($request->has('communityIds')){
                $property->communities()->associate($request->communityIds);
            }
            
            if($request->has('sub_community')){
                $property->subcommunities()->associate($request->sub_community);
            }
            
            if($request->has('agent_id')){
                $property->agent()->associate($request->agent_id);
            }

            $property->rating = $request->rating;
            $property->primary_view = $request->primary_view;

            if($request->has('completion_status_id')){
                $property->completionStatus()->associate($request->completion_status_id);
            }

            if($request->has('developer_id')){
                $property->developer()->associate($request->developer_id);
            }

            if($request->has('offer_type_id')){
                $property->offerType()->associate($request->offer_type_id);
            }
            if($request->has('categoryIds')){
                $property->category()->associate($request->categoryIds);
            }

            $property->property_source = 'crm';
            
            $property->address_longitude = $request->address_longitude;
            $property->address_latitude = $request->address_latitude;
            $property->address = $request->address;
            

            $property->user_id = Auth::user()->id;

           
            
            
           
            
            if ($request->hasFile('mainImage')) {
                $property->addMediaFromRequest('mainImage')->toMediaCollection('mainImages');
            }
            if ($request->hasFile('subImages')) {
                foreach ($request->subImages as $subImage) {
                    $property->addMedia($subImage)->toMediaCollection('subImages');
                }
            }
            if ($request->hasFile('floorPlan')) {
                $property->addMediaFromRequest('floorPlan')->toMediaCollection('floorPlans');
            }
            if ($request->hasFile('brochure')) {
                $property->addMediaFromRequest('brochure')->toMediaCollection('brochures');
            }
            $property->save();

            if($request->has('bedrooms')){
                foreach($request->bedrooms as $bedroom){
                    $property->bedroomss()->create(['bedroom'=>$bedroom]);
                }
             }
           
             if(isset($request->detailsKey)){
                foreach($request->detailsKey as $key => $detKey ) {
                    
                    if (!empty($detKey)) {
                        $property->propertyDetails()->attach($detKey, ['value' => $request->detailsName[$key]]);
                    }
                 }
             }
            if($request->has('accommodationIds')){
                $property->accommodations()->attach($request->accommodationIds);
            }
            if($request->has('amenityIds')){
                $property->amenities()->attach($request->amenityIds);
            }
            
            DB::commit();
            return redirect()->route('dashboard.properties.index')->with('success','Property has been created successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.properties.index')->with('error',$error->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return redirect()->route('property', $property->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
       
        $amenities = Amenity::active()->orderBy('id','desc')->get();
        $accommodations = Accommodation::active()->orderBy('id','desc')->get();
        $categories = Category::active()->orderBy('id','desc')->get();
        $completionStatuses = CompletionStatus::active()->orderBy('id','desc')->get();
        $communities = Community::active()->orderBy('id','desc')->get();
        $subCommunity = Subcommunity::active()->orderBy('id','desc')->get();
        $developers = Developer::active()->orderBy('id','desc')->get();
        $offerTypes = OfferType::active()->orderBy('id','desc')->get();
        $agents = Agent::active()->orderBy('id','desc')->get();
        return view('dashboard.realState.properties.edit', compact('agents','property','subCommunity','amenities', 'accommodations', 'categories', 'completionStatuses', 'communities', 'developers', 'offerTypes'));
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
            $property->permit_number = $request->permit_number;
            $property->slug = $this->createSlug($request->name);
            $property->description = $request->description;
            $property->meta_title = $request->meta_title;
            $property->meta_description = $request->meta_description;
            $property->meta_keyword = $request->meta_keyword;
            $property->bathrooms = $request->bathrooms;
            $property->parking = $request->parking_space;
            $property->unit_model = $request->unit_model;
            $property->price = $request->price;
            $property->cheques = $request->cheques;
            $property->cheque_frequency = $request->cheque_frequency;
            $property->built_area = $request->area;
            $property->plot_area = $request->plot_area;
            $property->unit_measure = $request->unit_measure;
            $property->status = $request->status;
            $property->is_feature = $request->is_feature;
            $property->featured_project = $request->featured_project;
            $property->exclusive = $request->exclusive;
            $property->emirate = $request->emirate;

              
            if($request->has('communityIds')){
                $property->communities()->associate($request->communityIds);
            }
            if($request->has('sub_community')){
                $property->subcommunities()->associate($request->sub_community);
            }
            if($request->has('agent_id')){
                $property->agent()->associate($request->agent_id);
            }

            $property->rating = $request->rating;
            $property->primary_view = $request->primary_view;

            if($request->has('completion_status_id')){
                $property->completionStatus()->associate($request->completion_status_id);
            }

            if($request->has('developer_id')){
                $property->developer()->associate($request->developer_id);
            }

            if($request->has('offer_type_id')){
                $property->offerType()->associate($request->offer_type_id);
            }
            if($request->has('categoryIds')){
                $property->category()->associate($request->categoryIds);
            }
            
            $property->address_longitude = $request->address_longitude;
            $property->address_latitude = $request->address_latitude;
            $property->address = $request->address;
            

            $property->user_id = Auth::user()->id;

            if ($request->hasFile('mainImage')) {
                $property->clearMediaCollection('mainImages');
                $property->addMediaFromRequest('mainImage')->toMediaCollection('mainImages');
            }
            if ($request->hasFile('subImages')) {
                $subImages = $request->file('subImages');
                $property->clearMediaCollection('subImages');
                foreach ($subImages as $subImage) {
                    $property->addMedia($subImage)->toMediaCollection('subImages');
                }
            }
            if ($request->hasFile('floorPlan')) {
                $property->clearMediaCollection('floorPlans');
                $property->addMediaFromRequest('floorPlan')->toMediaCollection('floorPlans');
            }
            if ($request->hasFile('brochure')) {
                $property->clearMediaCollection('brochures');
                $property->addMediaFromRequest('brochure')->toMediaCollection('brochures');
            }

            $property->save();
            if($request->has('bedrooms')){
                $oldBedrooms = $property->bedroomss->toArray();
                foreach ($oldBedrooms as $oldBedroom) {
                    PropertyBedroom::destroy($oldBedroom['id']);
                }
                foreach($request->bedrooms as $bedroom){
                    $property->bedroomss()->create(['bedroom'=>$bedroom]);
                }
             }
            if(isset($request->detailsKey)){
                $oldDets = $property->propertyDetails->toArray();
                foreach ($oldDets as $oldDet) {
                    PropertyDetail::destroy($oldDet['id']);
                }
                foreach($request->detailsKey as $key => $detKey ) {
                    
                    if (!empty($detKey)) {
                        $property->propertyDetails()->create(['key' => $detKey , 'value' => $request->detailsName[$key]]);
                    }
                 }
             }

            if($request->has('accommodationIds')){
                $property->accommodations()->detach();
                $property->accommodations()->attach($request->accommodationIds);
            }
            if($request->has('amenityIds')){
                $property->amenities()->detach();
                $property->amenities()->attach($request->amenityIds);
            }
           

            DB::commit();

            return redirect()->route('dashboard.properties.index')->with('success','Property has been updated successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.properties.index')->with('error',$error->getMessage());
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
    public function destroySpec($id)
    {
        
        try{
            
            PropertyDetail::find($id)->delete();

            return redirect()->back()->with('success','Property detail has been deleted successfully');
        }catch(\Exception $error){
            return redirect()->back()->with('error',$error->getMessage());
        }

    }
    protected function propertyAssets(){

        $amenities = Amenity::active()->orderBy('id','desc')->get();
        $accommodations = Accommodation::active()->orderBy('id','desc')->get();
        $categories = Category::active()->orderBy('id','desc')->get();
        $completionStatuses = CompletionStatus::active()->orderBy('id','desc')->get();
        $communities = Community::active()->orderBy('id','desc')->get();
        $developers = Developer::active()->orderBy('id','desc')->get();
        $features = Feature::active()->orderBy('id','desc')->get();
        $offerTypes = OfferType::active()->orderBy('id','desc')->get();
        $specifications = Specification::active()->orderBy('id','desc')->get();

    }
}
