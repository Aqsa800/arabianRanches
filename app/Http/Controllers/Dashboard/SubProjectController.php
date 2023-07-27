<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\Project\{
    SubProjectRequest
};
use App\Models\{
    Project,
    Amenity
};
use DB;
use Auth;
class SubProjectController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:'.config('constants.Permissions.real_estate'),
        ['only' => ['index','create', 'edit', 'update', 'destroy']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        return view('dashboard.realEstate.projects.sub.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $amenities = Amenity::active()->latest()->get();
        return view('dashboard.realEstate.projects.sub.create', compact('project','amenities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubProjectRequest $request, Project $project)
    {
        DB::beginTransaction();
        try{

            $subProject = new Project;
            $subProject->title = $request->title;
            $subProject->status = $request->status;
            $subProject->is_parent_project = 0;
            $subProject->parent_project_id = $project->id;
            $subProject->starting_price = $request->starting_price;
            $subProject->short_description = $request->short_description;
            $subProject->user_id = Auth::user()->id;
            $subProject->save();
            if($request->has('amenities')){
                $subProject->amenities()->attach($request->amenities);
            }

            DB::commit();
            return redirect()->route('dashboard.projects.subProjects',$project->id )->with('success','Sub Project has been created successfully.');
        }catch(\Exception $error){
            return redirect()->back()->with('error',$error->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Project $subProject)
    {
        $amenities = Amenity::active()->latest()->get();
        return view('dashboard.realEstate.projects.sub.edit', compact('amenities','project', 'subProject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubProjectRequest $request, Project $project,  Project $subProject)
    {
        try{
            $subProject->title = $request->title;
            $subProject->status = $request->status;
            $subProject->starting_price = $request->starting_price;
            $subProject->short_description = $request->short_description;
            $subProject->save();

            if($request->has('amenities')){
                $subProject->amenities()->detach();
                $subProject->amenities()->attach($request->amenities);
            }
            return redirect()->route('dashboard.projects.subProjects',$project->id )->with('success','Sub Project has been created successfully.');
        }catch(\Exception $error){
            return redirect()->back()->with('error',$error->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project , Project $subProject)
    {
        try{

            if($subProject->projectBedrooms->count() > 0){
                $subProject->projectBedrooms()->delete();
            }
            $subProject->delete();
            return redirect()->route('dashboard.projects.subProjects',$project->id )->with('success','Sub Project has been deleted successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.projects.subProjects',$project->id)->with('error',$error->getMessage());
        }
    }
}
