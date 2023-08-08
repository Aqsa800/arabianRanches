<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\DeveloperRequest;
use App\Models\Developer;
use Auth;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $developers = Developer::with('user')
        ->applyFilters($request->only(['status']))
        ->orderBy('id','desc')
        ->paginate(5);

        return view('dashboard.realState.developers.index', compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.realState.developers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeveloperRequest $request)
    {
        try{
            $developer = new Developer;
            $developer->name = $request->name;
            $developer->status = $request->status;
            $developer->user_id = Auth::user()->id;
            if ($request->hasFile('logo')) {
            $developer->addMediaFromRequest('logo')->toMediaCollection('logos');
            }
            $developer->save();
            return redirect()->route('dashboard.developers.index')->with('success','Developer has been created successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.developers.index')->with('error',$error->getMessage());
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
    public function edit(Developer $developer)
    {
        return view('dashboard.realState.developers.edit',compact('developer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeveloperRequest $request, Developer $developer)
    {
        try{
            $developer->name = $request->name;
            $developer->status = $request->status;
            if ($request->hasFile('logo')) {
                $developer->clearMediaCollection('logos');
                $developer->addMediaFromRequest('logo')->toMediaCollection('logos');
            }
            $developer->save();

            return redirect()->route('dashboard.developers.index')->with('success','Developer has been updated successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.developers.index')->with('error',$error->getMessage());
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
            Developer::find($id)->delete();

            return redirect()->route('dashboard.developers.index')->with('success','Developer has been deleted successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.developers.index')->with('error',$error->getMessage());
        }

    }
}
