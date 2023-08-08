<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\TeamRequest;
use App\Models\Team;
use Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teams = Team::with('user')
                        ->applyFilters($request->only(['status']))
                        ->orderBy('team_order','desc')
                        ->paginate(20);

        return view('dashboard.teams.index', compact('teams'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        try{
            $team = new Team;
            $team->name = $request->name;
            $team->status = $request->status;
            $team->email = $request->email;
            $team->contact_number = $request->contact_number;
            $team->designation = $request->designation;
            $team->rera_no = $request->rera_no;
            $team->category = $request->category;
            $team->description = $request->description;
            $team->team_order = $request->team_order;
            $team->user_id = Auth::user()->id;
            if ($request->hasFile('image')) {
                $team->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $team->save();
            return redirect()->route('dashboard.teams.index')->with('success','Team has been created successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.teams.index')->with('error',$error->getMessage());
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
    public function edit(Team $team)
    {
        return view('dashboard.teams.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, Team $team)
    {
        try{
            $team->name = $request->name;
            $team->status = $request->status;
            $team->email = $request->email;
            $team->contact_number = $request->contact_number;
            $team->designation = $request->designation;
            $team->description = $request->description;
            $team->rera_no = $request->rera_no;
            $team->category = $request->category;
            $team->team_order = $request->team_order;
            if ($request->hasFile('image')) {
                $team->clearMediaCollection('images');
                $team->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $team->save();
            return redirect()->route('dashboard.teams.index')->with('success','Team has been Updated successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.teams.index')->with('error',$error->getMessage());
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
            Team::find($id)->delete();

            return redirect()->route('dashboard.teams.index')->with('success','Team has been deleted successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.teams.index')->with('error',$error->getMessage());
        }
    }
}
