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


        return view('dashboard.realEstate.communities.create');
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
            $community->user_id = Auth::user()->id;
            $community->save();

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
        return view('dashboard.realEstate.communities.edit',compact('community'));
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
            $community->meta_title = $request->meta_title;
            $community->meta_description = $request->meta_description;
            $community->meta_keywords = $request->meta_keywords;

            $community->user_id = Auth::user()->id;
            $community->save();

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
            $community->delete();

            return redirect()->route('dashboard.communities.index')->with('success','Communicaty has been deleted successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.communities.index')->with('error',$error->getMessage());
        }
    }
}
