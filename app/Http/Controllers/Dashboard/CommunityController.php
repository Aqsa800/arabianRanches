<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\CommunityRequest;
use Illuminate\Support\Str;
use App\Models\{
    Amenity,
    Accommodation,
    Category,
    CompletionStatus,
    Community,
    CommunityProximities,
    Developer,
    Neighbour,
    OfferType
};
use Auth;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $communities = Community::with('user')
        ->applyFilters($request->only(['status']))
        ->orderBy('id','desc')
        ->paginate(10);

        return view('dashboard.realState.communities.index', compact('communities'));
    }
    public function createCmntySlug($title)
    {
        // Normalize the title
        $slug = Str::slug($title);
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedCmntySlugs($slug);
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

    protected function getRelatedCmntySlugs($slug)
    {
        return Community::select('slug')->where('slug', 'like', $slug.'%')->get();
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
        $developers = Developer::active()->orderBy('id','desc')->get();
        $offerTypes = OfferType::active()->orderBy('id','desc')->get();
        $specifications = Neighbour::active()->orderBy('id','desc')->get();
        return view('dashboard.realState.communities.create', compact('amenities', 'accommodations', 'categories', 'completionStatuses', 'communities', 'developers', 'offerTypes', 'specifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommunityRequest $request)
    {
        try{
            $community = new Community;
            $community->name = $request->name;
            $community->video_url = $request->video_url;
            $community->meta_title = $request->meta_title;
            $community->meta_description = $request->meta_description;
            $community->meta_keyword = $request->meta_keyword;
            $community->status = $request->status;
            $community->guide = $request->guide;
            $community->slug = $this->createCmntySlug($request->name);
            $community->ownership = $request->ownership;
            $community->emirates = $request->emirate;
            $community->community_order = $request->community_order;
            $community->description = $request->description;
            $community->user_id = Auth::user()->id;
            // dd($request->developer_id);
           
            if($request->has('completion_status_id')){
                $community->completionStatus()->associate($request->completion_status_id);
            }
            if($request->has('developer_id')){
                $community->developers()->associate($request->developer_id);
            }
           
            if ($request->hasFile('mainImage')) {
                $image = $request->file('mainImage');
                $file_name = 'commImg_' . time() . '.' . $image->getClientOriginalExtension();
                $community->addMediaFromRequest('mainImage')->usingFileName($file_name)->toMediaCollection('mainImage');
            }
            if ($request->hasFile('subImages')) {
                foreach ($request->subImages as $subImage) {
                    $file_name = 'commImg_' . time() . '.' . $subImage->getClientOriginalExtension();
                    $community->addMediaFromRequest($subImage)->usingFileName($file_name)->toMediaCollection('subImages');
                }
            }
            $community->save();
            if (isset($request->speci_id)) { 
                //dd($request->speci_id);
                
                foreach($request->speci_id as $key => $speci_id ) {
                    //dd($request->speci_id);
                    if (!empty($speci_id)) {
                        $community->proximities()->attach($speci_id, ['value' => $request->spec_name[$key]]);
                    }
                 }
            }
           
            if($request->has('accommodationIds')){
                $community->accommodations()->attach($request->accommodationIds);
            }
            if($request->has('amenityIds')){
                $community->amenities()->attach($request->amenityIds);
            }
            if($request->has('facilityIds')){
                $community->facilities()->attach($request->facilityIds);
            }
            if($request->has('offer_type_id')){
                $community->offerType()->attach($request->offer_type_id);
            }
            return redirect()->route('dashboard.communities.index')->with('success','Community has been created successfully.');
        }catch(\Exception $error){
            return redirect()->back()->with('error',$error->getMessage());
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
    public function edit(Community $community)
    {
        $amenities = Amenity::active()->orderBy('id','desc')->get();
        $accommodations = Accommodation::active()->orderBy('id','desc')->get();
        $categories = Category::active()->orderBy('id','desc')->get();
        $completionStatuses = CompletionStatus::active()->orderBy('id','desc')->get();
        $communities = Community::active()->orderBy('id','desc')->get();
        $developers = Developer::active()->orderBy('id','desc')->get();
        $offerTypes = OfferType::active()->orderBy('id','desc')->get();
        $specifications = Neighbour::active()->orderBy('id','desc')->get();
        return view('dashboard.realState.communities.edit',compact('amenities', 'accommodations', 'categories', 'completionStatuses', 'community', 'developers', 'offerTypes', 'specifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommunityRequest $request, Community $community)
    {
        try{
            
            $community->name = $request->name;
            $community->video_url = $request->video_url;
            $community->status = $request->status;
            $community->ownership = $request->ownership;
            $community->emirates = $request->emirate;
            $community->meta_title = $request->meta_title;
            $community->meta_description = $request->meta_description;
            $community->meta_keyword = $request->meta_keyword;
            $community->description = $request->description;
            $community->user_id = Auth::user()->id;
             $community->guide = $request->guide;
            $community->community_order = $request->community_order;
           
            if($request->has('completion_status_id')){
                $community->completionStatus()->associate($request->completion_status_id);
            }
            if($request->has('developer_id')){
                $community->developers()->associate($request->developer_id);
            }
            if ($request->hasFile('mainImage')) {
                
                $community->clearMediaCollection('mainImages');
                $image = $request->file('mainImage');
                $file_name = 'commImg_' . time() . '.' . $image->getClientOriginalExtension();
                $community->addMediaFromRequest('mainImage')->usingFileName($file_name)->toMediaCollection('mainImages');
            }
            if ($request->hasFile('subImages')) {
                
                $community->clearMediaCollection('subImages');
                foreach ($request->subImages as $subImage) {
                    $file_name = 'commImg_' . time() . '.' . $subImage->getClientOriginalExtension();
                    
                    $community->addMedia($subImage)->usingFileName($file_name)->toMediaCollection('subImages');
                    
                }
            }
           
            $community->save();

            if (isset($request->speci_id)) { 
                //dd($request->speci_id);
                $oldDets = $community->proximities->toArray();
                foreach ($oldDets as $oldDet) {
                    $community->proximities()->detach($oldDet['id']);
                }
                foreach($request->speci_id as $key => $speci_id ) {
                    //dd($request->speci_id);
                    if (!empty($speci_id)) {
                        $community->proximities()->attach($speci_id, [ 'value' => $request->spec_name[$key]]);
                    }
                 }
            }
           
            if($request->has('accommodationIds')){
                $community->accommodations()->detach();
                $community->accommodations()->attach($request->accommodationIds);
            }
            if($request->has('amenityIds')){
                $community->amenities()->detach();
                $community->amenities()->attach($request->amenityIds);
            }
            if($request->has('facilityIds')){
                $community->facilities()->detach();
                $community->facilities()->attach($request->facilityIds);
            }
            if($request->has('offer_type_id')){
                $community->offerType()->detach();
                $community->offerType()->attach($request->offer_type_id);
            }
            return redirect()->route('dashboard.communities.index')->with('success','Communicaty has been updated successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.communities.index')->with('error',$error->getMessage());
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
            Community::find($id)->delete();

            return redirect()->route('dashboard.communities.index')->with('success','Communicaty has been deleted successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.communities.index')->with('error',$error->getMessage());
        }

    }
    public function destroySpec($id)
    {
        try{
            
            CommunityProximities::find($id)->delete();

            return redirect()->back()->with('success','Community detail has been deleted successfully');
        }catch(\Exception $error){
            return redirect()->back()->with('error',$error->getMessage());
        }

    }
}
