<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\FeatureRequest;
use App\Models\Feature;
use Auth;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $features = Feature::with('user')
        ->applyFilters($request->only(['status']))
        ->orderBy('id','desc')
        ->paginate(5);

        return view('dashboard.realState.features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.realState.features.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeatureRequest $request)
    {
        try{
            $feature = new Feature;
            $feature->name = $request->name;
            $feature->status = $request->status;
            $feature->user_id = Auth::user()->id;
            if ($request->hasFile('image')) {
                $feature->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $feature->save();
            return redirect()->route('dashboard.features.index')->with('success','Feature has been created successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.features.index')->with('error',$error->getMessage());
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
    public function edit(Feature $feature)
    {
        return view('dashboard.realState.features.edit',compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeatureRequest $request, Feature $feature)
    {
        try{
            $feature->name = $request->name;
            $feature->status = $request->status;
            if ($request->hasFile('image')) {
                $feature->clearMediaCollection('images');
                $feature->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $feature->save();

            return redirect()->route('dashboard.features.index')->with('success','Feature has been updated successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.features.index')->with('error',$error->getMessage());
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
            Feature::find($id)->delete();

            return redirect()->route('dashboard.features.index')->with('success','Feature has been deleted successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.features.index')->with('error',$error->getMessage());
        }

    }
}
