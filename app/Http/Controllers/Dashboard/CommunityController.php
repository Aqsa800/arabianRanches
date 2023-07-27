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
    Subcommunity,
    Developer,
    OfferType,
    TagCategory,
    Stat,

};
use Auth;

class CommunityController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:'.config('constants.Permissions.real_estate'),
        ['only' => ['index','create', 'store','show','edit', 'update', 'destroy', 'subCommunities', 'mediaDestroy', 'mediasDestroy']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $communities = Community::with('user')
                        ->applyFilters($request->only(['status']))
                        ->latest()
                        ->get();

        return view('dashboard.realEstate.communities.index', compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::active()->latest()->get();
        $tags = TagCategory::active()->latest()->get();
        $developers =Developer::active()->latest()->get();

        return view('dashboard.realEstate.communities.create', compact('developers', 'categories', 'tags'));
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
            $community->status = $request->status;
            $community->emirates = $request->emirates;
            $community->short_description = $request->short_description;
            $community->description = $request->description;
            $community->meta_title = $request->meta_title;
            $community->meta_description = $request->meta_description;
            $community->meta_keywords = $request->meta_keywords;

            if ($request->hasFile('mainImage')) {
                $img =  $request->file('mainImage');
                $ext = $img->getClientOriginalExtension();
                $imageName =  Str::slug($request->name).'.'.$ext;
                $community->addMediaFromRequest('mainImage')->usingFileName($imageName)->toMediaCollection('mainImages', 'commnityFiles');
            }

            if ($request->hasFile('imageGallery')) {
                $subImages = $request->file('imageGallery');
                
                foreach ($subImages as $subImage) {
                    $community->addMedia($subImage)->toMediaCollection('imageGalleries', 'commnityFiles');
                }
            }

            if ($request->hasFile('video')) {
                $video =  $request->file('video');
                $ext = $video->getClientOriginalExtension();
                $videoName =  Str::slug($request->name).'.'.$ext;
                $community->addMediaFromRequest('video')->usingFileName($videoName)->toMediaCollection('videos', 'commnityFiles');
            }

            $community->user_id = Auth::user()->id;
            $community->save();

            if($request->has('categoryIds')){
                $community->categories()->attach($request->categoryIds);
            }
            if($request->has('tagIds')){
                foreach($request->tagIds as $tag){
                    $community->tags()->create(['tag_category_id'=>$tag]);
                }
            }
            if($request->has('developerIds')){
                $community->communityDevelopers()->attach($request->developerIds);
            }

            return response()->json([
                'success' => true,
                'message'=> 'Community has been created successfully.',
                'redirect' => route('dashboard.communities.index'),
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'success' => false,
                'message'=> $error->getMessage(),
                'redirect' => route('dashboard.communities.index'),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community)
    {
        
        return redirect()->route('community', $community->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        $categories = Category::active()->latest()->get();
        $tags = TagCategory::active()->latest()->get();
        $developers =Developer::active()->latest()->get();
        return view('dashboard.realEstate.communities.edit',compact('developers','community','tags','categories'));
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
            $community->status = $request->status;
            $community->emirates = $request->emirates;
            $community->short_description = $request->short_description;
            $community->description = $request->description;
            $community->meta_title = $request->meta_title;
            $community->meta_description = $request->meta_description;
            $community->meta_keywords = $request->meta_keywords;

            if ($request->hasFile('mainImage')) {
                $community->clearMediaCollection('mainImages');
                $img =  $request->file('mainImage');
                $ext = $img->getClientOriginalExtension();
                $imageName =  Str::slug($request->name).'.'.$ext;
                $community->addMediaFromRequest('mainImage')->usingFileName($imageName)->toMediaCollection('mainImages', 'commnityFiles');
            }

            if ($request->hasFile('imageGallery')) {
                $subImages = $request->file('imageGallery');

                foreach ($subImages as $subImage) {
                    $community->addMedia($subImage)->toMediaCollection('imageGalleries', 'commnityFiles');
                }
            }

            if ($request->hasFile('video')) {
                $community->clearMediaCollection('videos');
                $video =  $request->file('video');
                $ext = $video->getClientOriginalExtension();
                $videoName =  Str::slug($request->name).'.'.$ext;
                $community->addMediaFromRequest('video')->usingFileName($videoName)->toMediaCollection('videos', 'commnityFiles');
            }

            $community->user_id = Auth::user()->id;
            $community->save();

            if($request->has('categoryIds')){
                $community->categories()->detach();
                $community->categories()->attach($request->categoryIds);
            }

            if($request->has('developerIds')){
                $community->communityDevelopers()->detach();
                $community->communityDevelopers()->attach($request->developerIds);
            }

            if($request->has('tagIds')){
                $community->tags()->delete();
                foreach($request->tagIds as $tag){
                    $community->tags()->create(['tag_category_id'=>$tag]);
                }
            }

            return response()->json([
                'success' => true,
                'message'=> 'Community has been updated successfully.',
                'redirect' => route('dashboard.communities.index'),
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'success' => false,
                'message'=> $error->getMessage(),
                'redirect' => route('dashboard.communities.index'),
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        try{
            $community->tags()->delete();
            $community->delete();

            return redirect()->route('dashboard.communities.index')->with('success','Communicaty has been deleted successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.communities.index')->with('error',$error->getMessage());
        }

    }
    public function subCommunities(Request $request)
    {
        $parent_id = $request->category_id;
        $subcategories = Subcommunity::where('community_id',$parent_id)->active()->get();
        return response()->json([
            'subcategories' => $subcategories
        ]);
    }
    public function mediaDestroy(Community $community, $media)
    {
        try{
            $community->deleteMedia($media);
            return redirect()->route('dashboard.communities.edit', $community->id)->with('success','Community Image has been deleted successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.communities.edit', $community->id)->with('error',$error->getMessage());
        }
    }
    public function mediasDestroy(Community $community)
    {
        try{
            $community->clearMediaCollection('imageGalleries');
            return redirect()->route('dashboard.communities.edit', $community->id)->with('success','Community Gallery has been deleted successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.communities.edit', $community->id)->with('error',$error->getMessage());
        }
    }
}
