<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BannerRequest;
use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $banners = Banners::with('user')
                        ->applyFilters($request->only(['status']))
                        ->orderBy('id','desc')
                        ->paginate(5);
            
        return view('dashboard.banners.index', compact('banners'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        try{
            $banner = new Banners;
            $banner->heading_one = $request->name;
            $banner->status = $request->status;
            $banner->page_url = $request->page_url;
            $banner->user_id = Auth::user()->id;
            if ($request->hasFile('image')) {
                $banner->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $banner->save();
            return redirect()->route('dashboard.banners.index')->with('success','Banner has been created successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.banners.index')->with('error',$error->getMessage());
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
    public function edit(Banners $banner)
    {
        
        return view('dashboard.banners.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banners $banner)
    {
        
        try{
            $banner->heading_one = $request->name;
            $banner->status = $request->status;
            $banner->page_url = $request->page_url;
            $banner->user_id = Auth::user()->id;
            if ($request->hasFile('image')) {
                $banner->clearMediaCollection('images');
                $banner->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $banner->save();
            return redirect()->route('dashboard.banners.index')->with('success','Banner has been Updated successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.banners.index')->with('error',$error->getMessage());
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
            Banners::find($id)->delete();

            return redirect()->route('dashboard.banners.index')->with('success','Banner has been deleted successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.banners.index')->with('error',$error->getMessage());
        }
    }
}
