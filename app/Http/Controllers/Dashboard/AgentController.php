<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\AgentRequest;
use App\Models\Agent;
use Auth;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $agents = Agent::with('user')
            ->applyFilters($request->only(['status']))
            ->orderBy('id','desc')
            ->paginate(5);

        return view('dashboard.realState.agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.realState.agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgentRequest $request)
    {
        try{
            $agent = new Agent;
            $agent->name = $request->name;
            $agent->status = $request->status;
            $agent->email = $request->email;
            $agent->contact_number = $request->contact_number;
            $agent->license_number = $request->license_number;
            $agent->message = $request->message;
            $agent->user_id = Auth::user()->id;
            if ($request->hasFile('image')) {
                $agent->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $agent->save();
            return redirect()->route('dashboard.agents.index')->with('success','Agent has been created successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.agents.index')->with('error',$error->getMessage());
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
    public function edit(Agent $agent)
    {
        return view('dashboard.realState.agents.edit',compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgentRequest $request, Agent $agent)
    {
        try{
            $agent->name = $request->name;
            $agent->status = $request->status;
            $agent->email = $request->email;
            $agent->contact_number = $request->contact_number;
            $agent->license_number = $request->license_number;
            $agent->message = $request->message;
            if ($request->hasFile('image')) {
                $agent->clearMediaCollection('images');
                $agent->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $agent->save();
            return redirect()->route('dashboard.agents.index')->with('success','Agent has been created successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.agents.index')->with('error',$error->getMessage());
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
            Agent::find($id)->delete();

            return redirect()->route('dashboard.agents.index')->with('success','Agent has been deleted successfully');

        }catch(\Exception $error){
            return redirect()->route('dashboard.agents.index')->with('error',$error->getMessage());
        }
    }
}
