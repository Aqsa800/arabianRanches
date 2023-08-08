<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\AccommodationRequest;
use App\Models\Accommodation;
use Auth;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $accommodations = Accommodation::with('user')
        ->applyFilters($request->only(['status']))
        ->orderBy('id','desc')
        ->paginate(5);

        return view('dashboard.realState.accommodations.index', compact('accommodations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.realState.accommodations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccommodationRequest $request)
    {
        try{
            $accommodation = new Accommodation;
            $accommodation->name = $request->name;
            $accommodation->status = $request->status;
            $accommodation->user_id = Auth::user()->id;
            if ($request->hasFile('image')) {
            $accommodation->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $accommodation->save();
            return redirect()->route('dashboard.accommodations.index')->with('success','Accommodation has been created successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.accommodations.index')->with('error',$error->getMessage());
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
    public function edit(Accommodation $accommodation)
    {
        return view('dashboard.realState.accommodations.edit',compact('accommodation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccommodationRequest $request, Accommodation $accommodation)
    {
        try{
            $accommodation->name = $request->name;
            $accommodation->status = $request->status;
            if ($request->hasFile('image')) {
                $accommodation->clearMediaCollection('images');
                $accommodation->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $accommodation->save();

            return redirect()->route('dashboard.accommodations.index')->with('success','Accommodation has been updated successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.accommodations.index')->with('error',$error->getMessage());
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
            Accommodation::find($id)->delete();

            return redirect()->route('dashboard.accommodations.index')->with('success','Accommodation has been deleted successfully');

        }catch(\Exception $error){
            return redirect()->route('dashboard.accommodations.index')->with('error',$error->getMessage());
        }

    }
}
