<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\AmenityRequest;
use App\Models\Amenity;
use Auth;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $amenities = Amenity::with('user')
        ->applyFilters($request->only(['status']))
        ->orderBy('id','desc')
        ->paginate(5);

        return view('dashboard.realState.amenities.index', compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.realState.amenities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmenityRequest $request)
    {
        try{
            $amenity = new Amenity;
            $amenity->name = $request->name;
            $amenity->status = $request->status;
            $amenity->user_id = Auth::user()->id;
            $amenity->addMediaFromRequest('image')->toMediaCollection('images');
            $amenity->save();
            return redirect()->route('dashboard.amenities.index')->with('success','Amenity has been created successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.amenities.index')->with('error',$error->getMessage());
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
    public function edit(Amenity $amenity)
    {
        return view('dashboard.realState.amenities.edit',compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AmenityRequest $request, Amenity $amenity)
    {
        try{
            $amenity->name = $request->name;
            $amenity->status = $request->status;
            if ($request->hasFile('image')) {
                $amenity->clearMediaCollection('images');
                $amenity->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $amenity->save();

            return redirect()->route('dashboard.amenities.index')->with('success','Amenity has been updated successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.amenities.index')->with('error',$error->getMessage());
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
            Amenity::find($id)->delete();

            return redirect()->route('dashboard.amenities.index')->with('success','Amenity has been deleted successfully');

        }catch(\Exception $error){
            return redirect()->route('dashboard.amenities.index')->with('error',$error->getMessage());
        }


    }
}
