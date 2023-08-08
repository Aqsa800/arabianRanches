<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\NeighbourRequest;
use App\Models\Neighbour;
use Auth;

class NeighbourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $neighbours = Neighbour::with('user')
        ->applyFilters($request->only(['status']))
        ->orderBy('id','desc')
        ->paginate(5);
        return view('dashboard.realState.neighbours.index', compact('neighbours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.realState.neighbours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NeighbourRequest $request)
    {
        try{
            $neighbour = new Neighbour;
            $neighbour->name = $request->name;
            $neighbour->status = $request->status;
            $neighbour->user_id = Auth::user()->id;
            if ($request->hasFile('image')) {
                $neighbour->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $neighbour->save();
            return redirect()->route('dashboard.neighbours.index')->with('success','Neighbour has been created successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.neighbours.index')->with('error',$error->getMessage());
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
    public function edit(Neighbour $neighbour)
    {
        return view('dashboard.realState.neighbours.edit',compact('neighbour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NeighbourRequest $request, Neighbour $neighbour)
    {
        try{
            $neighbour->name = $request->name;
            $neighbour->status = $request->status;
            if ($request->hasFile('image')) {
                $neighbour->clearMediaCollection('images');
                $neighbour->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $neighbour->save();

            return redirect()->route('dashboard.neighbours.index')->with('success','Neighbour has been updated successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.neighbours.index')->with('error',$error->getMessage());
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
            Neighbour::find($id)->delete();

            return redirect()->route('dashboard.neighbours.index')->with('success','Neighbour has been deleted successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.neighbours.index')->with('error',$error->getMessage());
        }

    }
}
