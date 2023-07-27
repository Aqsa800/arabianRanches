<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\Project\{
    ProjectRequest,
    ProjectPaymentRequest
};
use Illuminate\Support\Str;
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
    Agent,
    PropertyBedroom,
    PropertyDetail,
    Subcommunity,
    Project,
    TagCategory,
    MetaDetail,
    ProjectAmenity
};
use Auth;
use DB;
class ProjectController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:'.config('constants.Permissions.offplan'),
        ['only' => ['index','create', 'edit', 'update', 'destroy','mediaDestroy',
                    'payments','createPayment','storePayment','editPayment','updatePayment','destroyPayment']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $projects=Project::mainProject()->with('subProjects')->get();
        $projects = Project::mainProject()->with('user')
                    ->latest()->get();
        return view('dashboard.realEstate.projects.index', compact('projects'));
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
        $developers = Developer::active()->latest()->get();
        $agents = Agent::active()->latest()->get();
        $tags = TagCategory::projectTag()->active()->latest()->get();

        return view('dashboard.realEstate.projects.create', compact('tags','agents','amenities', 'accommodations', 'communities', 'developers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        DB::beginTransaction();
        try{
            $project = new Project;
            $project->title = $request->title;
            $project->sub_title = $request->sub_title;
            $project->status = $request->status;
            $project->is_parent_project = 1;
            $project->is_new_launch = $request->is_new_launch;
            $project->is_featured = $request->is_featured;
            $project->is_display_home = $request->is_display_home;
            $project->starting_price = $request->starting_price;
            $project->completion_date = $request->completion_date;
            $project->bathrooms = $request->bathrooms;
            $project->bedrooms = $request->bedrooms;
            $project->area = $request->area;
            $project->area_unit = $request->area_unit;
            $project->features_description = $request->features_description;
            $project->address = $request->address;
            $project->address_latitude = $request->address_latitude;
            $project->address_longitude = $request->address_longitude;
            $project->meta_title = $request->meta_title;
            $project->meta_description = $request->meta_description;
            $project->meta_keywords = $request->meta_keywords;
            $project->emirate = $request->emirate;

            if($request->has('starting_price_highlight')){
                $project->starting_price_highlight = $request->starting_price_highlight;
            }
            if($request->has('completion_date_highlight')){
                $project->completion_date_highlight = $request->completion_date_highlight;
            }
            if($request->has('area_highlight')){

                $project->area_highlight = $request->area_highlight;
            }
            if($request->has('accommodation_id_highlight')){
                $project->accommodation_id_highlight = $request->accommodation_id_highlight;
            }
            if($request->has('community_id_highlight')){
                $project->community_id_highlight = $request->community_id_highlight;
            }
            if($request->has('agent_id')){
                $project->agent()->associate($request->agent_id);
            }
            if($request->has('developer_id')){
                $project->developer()->associate($request->developer_id);
            }
            if($request->has('main_community_id')){
                $project->mainCommunity()->associate($request->main_community_id);
            }
            if($request->has('sub_community_id')){
                $project->subCommunity()->associate($request->sub_community_id);
            }

            if ($request->hasFile('mainImage')) {
                $img =  $request->file('mainImage');
                $ext = $img->getClientOriginalExtension();
                $imageName =  Str::slug($request->title).'.'.$ext;

                $project->addMediaFromRequest('mainImage')->usingFileName($imageName)->toMediaCollection('mainImages', 'projectFiles' );
            }
            if ($request->hasFile('video')) {
                $video =  $request->file('video');
                $ext = $video->getClientOriginalExtension();
                $videoName =  Str::slug($request->title).'.'.$ext;
                $project->addMediaFromRequest('video')->usingFileName($videoName)->toMediaCollection('videos', 'projectFiles');
            }
            if ($request->hasFile('exteriorGallery')) {
                foreach($request->exteriorGallery as $img)
                {
                    $project->addMedia($img)->toMediaCollection('exteriorGallery', 'projectFiles');
                }
            }
            if ($request->hasFile('interiorGallery')) {

                foreach($request->interiorGallery as $img)
                {
                    $project->addMedia($img)->toMediaCollection('interiorGallery', 'projectFiles');
                }
            }
            if ($request->hasFile('brochure')) {
                $brochure =  $request->file('brochure');
                $ext = $brochure->getClientOriginalExtension();
                $brochureName =  Str::slug($request->title).'._brochure.'.$ext;
                $project->addMediaFromRequest('brochure')->usingFileName($brochureName)->toMediaCollection('brochures', 'projectFiles');
            }
            if ($request->hasFile('factsheet')) {
                $factsheet =  $request->file('factsheet');
                $ext = $factsheet->getClientOriginalExtension();
                $factsheetName =  Str::slug($request->title).'_factsheet.'.$ext;
                $project->addMediaFromRequest('factsheet')->usingFileName($factsheetName)->toMediaCollection('factsheets', 'projectFiles');
            }
            if ($request->hasFile('paymentPlan')) {
                $paymentPlan =  $request->file('paymentPlan');
                $ext = $paymentPlan->getClientOriginalExtension();
                $paymentPlantName =  Str::slug($request->title).'_paymentPlan.'.$ext;
                $project->addMediaFromRequest('paymentPlan')->usingFileName($paymentPlantName)->toMediaCollection('paymentPlans', 'projectFiles');
            }

            $project->short_description = $request->short_description;
            $project->long_description = $request->long_description;
            $project->user_id = Auth::user()->id;
            $project->save();

            if(isset($request->detailsKey)){
                foreach($request->detailsKey as $key => $detKey ) {
                    if (!empty($detKey)) {
                        $project->propertyDetails()->attach($detKey, ['value' => $request->detailsName[$key]]);
                    }
                 }
             }
            if($request->has('accommodationIds')){
                $project->accommodations()->attach($request->accommodationIds);
            }

            if($request->has('amenities')){
                foreach($request->amenities as $amenity){
                    ProjectAmenity::insert([
                        'amenity_id' => $amenity,
                        'project_id' => $project->id
                    ]);
                }
            }
            if($request->has('highlight_amenities')){

                foreach($request->highlight_amenities as $amenity){
                    $project->amenities()->attach($amenity,['highlighted'=> 1]);
                }
            }
            if($request->has('tagIds')){
                foreach($request->tagIds as $tag){
                    $project->tags()->create(['tag_category_id'=>$tag]);
                }
            }
            DB::commit();
            return response()->json([
                'success' => true,
                'message'=> 'Project has been created successfully.',
                'redirect' => route('dashboard.projects.index'),
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'success' => false,
                'message'=> $error->getMessage(),
                'redirect' => route('dashboard.projects.index'),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return redirect()->route('dubai-offplan',$project->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $amenities = Amenity::active()->latest()->get();
        $accommodations = Accommodation::active()->latest()->get();
        $communities = Community::active()->latest()->get();
        $developers = Developer::active()->latest()->get();
        $agents = Agent::active()->latest()->get();;
        $tags = TagCategory::projectTag()->active()->latest()->get();

        return view('dashboard.realEstate.projects.edit', compact('tags','project','agents','amenities', 'accommodations', 'communities', 'developers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        DB::beginTransaction();
        try{
            $project->title = $request->title;
            $project->sub_title = $request->sub_title;
            $project->status = $request->status;
            $project->is_new_launch = $request->is_new_launch;
            $project->is_featured = $request->is_featured;
            $project->is_display_home = $request->is_display_home;
            $project->starting_price = $request->starting_price;
            $project->completion_date = $request->completion_date;
            $project->bathrooms = $request->bathrooms;
            $project->bedrooms = $request->bedrooms;
            $project->area = $request->area;
            $project->area_unit = $request->area_unit;
            $project->features_description = $request->features_description;
            $project->address = $request->address;
            $project->address_latitude = $request->address_latitude;
            $project->address_longitude = $request->address_longitude;
            $project->meta_title = $request->meta_title;
            $project->meta_description = $request->meta_description;
            $project->meta_keywords = $request->meta_keywords;
            $project->emirate = $request->emirate;
            if($request->has('agent_id')){
                $project->agent()->associate($request->agent_id);
            }
            if($request->has('developer_id')){
                $project->developer()->associate($request->developer_id);
            }
            if($request->has('main_community_id')){
                $project->mainCommunity()->associate($request->main_community_id);
            }
            if($request->has('sub_community_id')){
                $project->subCommunity()->associate($request->sub_community_id);
            }
            if($request->has('starting_price_highlight')){
                $project->starting_price_highlight = $request->starting_price_highlight;
            }else{
                $project->starting_price_highlight =0;
            }
            if($request->has('completion_date_highlight')){
                $project->completion_date_highlight = $request->completion_date_highlight;
            }
            else{
                $project->completion_date_highlight =0;
            }
            if($request->has('community_id_highlight')){
                $project->community_id_highlight = $request->community_id_highlight;
            }else{
                $project->community_id_highlight =0;
            }
            if($request->has('area_highlight')){

                $project->area_highlight = $request->area_highlight;
            }else{
                $project->area_highlight =0;
            }
            if($request->has('accommodation_id_highlight')){
                $project->accommodation_id_highlight = $request->accommodation_id_highlight;
            }else{
                $project->accommodation_id_highlight =0;
            }
            // if($request->has('accommodation_id')){
            //     $project->accommodation()->associate($request->accommodation_id);
            // }
            if ($request->hasFile('mainImage')) {
                $project->clearMediaCollection('mainImages');
                $img =  $request->file('mainImage');
                $ext = $img->getClientOriginalExtension();
                $imageName =  Str::slug($request->title).'.'.$ext;

                $project->addMediaFromRequest('mainImage')->usingFileName($imageName)->toMediaCollection('mainImages', 'projectFiles' );
            }
            if ($request->hasFile('video')) {
                $project->clearMediaCollection('videos');
                $video =  $request->file('video');
                $ext = $video->getClientOriginalExtension();
                $videoName =  Str::slug($request->title).'.'.$ext;
                $project->addMediaFromRequest('video')->usingFileName($videoName)->toMediaCollection('videos', 'projectFiles');
            }
            if ($request->hasFile('exteriorGallery')) {

                foreach($request->exteriorGallery as $img)
                {
                    $project->addMedia($img)->toMediaCollection('exteriorGallery', 'projectFiles');
                }
            }
            if ($request->hasFile('interiorGallery')) {

                foreach($request->interiorGallery as $img)
                {
                    $project->addMedia($img)->toMediaCollection('interiorGallery', 'projectFiles');
                }
            }
            if ($request->hasFile('brochure')) {
                if($project->brochure){
                    $project->clearMediaCollection('brochures');
                }
                $brochure =  $request->file('brochure');
                $ext = $brochure->getClientOriginalExtension();
                $brochureName =  Str::slug($request->title).'_brochure.'.$ext;

                $project->addMedia($brochure)->usingFileName($brochureName)->toMediaCollection('brochures', 'projectFiles');
            }
            if ($request->hasFile('factsheet')) {
                if($project->factsheet){
                    $project->clearMediaCollection('factsheets');
                }
                $factsheet =  $request->file('factsheet');
                $ext = $factsheet->getClientOriginalExtension();
                $factsheetName =  Str::slug($request->title).'_factsheet.'.$ext;
                $project->addMedia($factsheet)->usingFileName($factsheetName)->toMediaCollection('factsheets', 'projectFiles');
            }
            if ($request->hasFile('paymentPlan')) {
                if($project->paymentPlan){
                    $project->clearMediaCollection('paymentPlans');
                }
                $paymentPlan =  $request->file('paymentPlan');
                $ext = $paymentPlan->getClientOriginalExtension();
                $paymentPlantName =  Str::slug($request->title).'_paymentPlan.'.$ext;
                $project->addMedia($paymentPlan)->usingFileName($paymentPlantName)->toMediaCollection('paymentPlans', 'projectFiles');
            }

            $project->short_description = $request->short_description;
            $project->long_description = $request->long_description;
            $project->user_id = Auth::user()->id;

            $project->save();

            if($request->has('accommodationIds')){
                $project->accommodations()->detach();
                $project->accommodations()->attach($request->accommodationIds);
            }
            if($request->has('amenities')){
                ProjectAmenity::where('project_id',$project->id)->where('highlighted',0)->delete();

                foreach($request->amenities as $amenity){
                    ProjectAmenity::insert([
                        'amenity_id' => $amenity,
                        'project_id' => $project->id
                    ]);

                }

            }
            if($request->has('highlight_amenities')){
                ProjectAmenity::where('project_id',$project->id)->where('highlighted',1)->delete();
                foreach($request->highlight_amenities as $amenity){

                    $project->amenities()->attach($amenity, ['highlighted' => 1]);
                }
            }
            if($request->has('tagIds')){
                $project->tags()->delete();
                foreach($request->tagIds as $tag){
                    $project->tags()->create(['tag_category_id'=>$tag]);
                }
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message'=> 'Project has been upated successfully.',
                'redirect' => route('dashboard.projects.index'),
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'success' => false,
                'message'=> $error->getMessage(),
                'redirect' => route('dashboard.projects.index'),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        try{
            $project->tags()->delete();
            $project->subProjects()->delete();
            $project->paymentPlans()->delete();
            $project->delete();
            return redirect()->route('dashboard.projects.index')->with('success','Project has been deleted successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.projects.index')->with('error',$error->getMessage());
        }
    }
    public function mediaDestroy(Project $project, $media)
    {
        try{
            $project->deleteMedia($media);
            return redirect()->route('dashboard.projects.edit', $project->id)->with('success','Project Image has been deleted successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.projects.edit', $project->id)->with('error',$error->getMessage());
        }
    }
    public function interiorMediasDestroy(Project $project)
    {
        try{
            $project->clearMediaCollection('interiorGallery');
            return redirect()->route('dashboard.projects.edit', $project->id)->with('success','Project Interior Gallery has been deleted successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.projects.edit', $project->id)->with('error',$error->getMessage());
        }
    }
    public function exteriorMediasDestroy(Project $project)
    {
        try{
            $project->clearMediaCollection('exteriorGallery');
            return redirect()->route('dashboard.projects.edit', $project->id)->with('success','Project Interior Gallery has been deleted successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.projects.edit', $project->id)->with('error',$error->getMessage());
        }
    }
    public function payments(Project $project)
    {
        return view('dashboard.realEstate.projects.paymentPlans.index', compact('project'));
    }
    public function createPayment(Project $project)
    {
        return view('dashboard.realEstate.projects.paymentPlans.create', compact('project'));
    }
    public function storePayment(ProjectPaymentRequest $request, Project $project)
    {
        DB::beginTransaction();
        try{
            $project->paymentPlans()->create(['name'=>$request->name, 'value'=>$request->value]);
            DB::commit();
            return redirect()->route('dashboard.project.paymentPlans',$project->id )->with('success','Payment Plan has been created successfully.');
        }catch(\Exception $error){
            return redirect()->back()->with('error',$error->getMessage());
        }
    }
    public function editPayment(Project $project, MetaDetail $payment)
    {
        return view('dashboard.realEstate.projects.paymentPlans.edit', compact('payment','project'));
    }
    public function updatePayment(ProjectPaymentRequest $request, Project $project,   MetaDetail $payment)
    {
        try{
            $payment->name = $request->name;
            $payment->value = $request->value;
            $payment->save();
            return redirect()->route('dashboard.project.paymentPlans',$project->id )->with('success','Sub Project has been created successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.project.paymentPlans',$project->id )->with('error',$error->getMessage());
        }
    }
    public function destroyPayment(Project $project , MetaDetail $payment)
    {
        try{
            $payment->delete();
            return redirect()->route('dashboard.project.paymentPlans',$project->id )->with('success','Sub Project has been deleted successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.project.paymentPlans',$project->id)->with('error',$error->getMessage());
        }
    }
}
