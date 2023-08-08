<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Dashboard\NewRequest;
use App\Models\LatestNew;
use Auth;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $latestNews = LatestNew::with('user')
        ->applyFilters($request->only(['status']))
        ->orderBy('id','desc')
        ->paginate(5);

        return view('dashboard.contentManagement.news.index', compact('latestNews'));
    }

    /**
     * Show the form for creating a latestNew resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.contentManagement.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewRequest $request)
    {
        try{
            $latestNew = new LatestNew();
            $latestNew->name = $request->name;
            $latestNew->status = $request->status;
            $latestNew->content = $request->content;
            $latestNew->slug = Str::slug($request->name, '-');
            $latestNew->user_id = Auth::user()->id;
            if ($request->hasFile('mainImage')) {
                $latestNew->addMediaFromRequest('mainImage')->toMediaCollection('mainImages');
            }
            if ($request->hasFile('subImages')) {
                foreach ($subImages as $image) {
                    $latestNew->addMedia($image)->toMediaCollection('subImages');
                }
            }
            $latestNew->save();
            return redirect()->route('dashboard.latestNews.index')->with('success','latestNew has been created successfully.');
            }catch(\Exception $error){
            return redirect()->route('dashboard.latestNews.index')->with('error',$error->getMessage());
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
    public function edit($id)
    {
        $latestNew = LatestNew::find($id);
        return view('dashboard.contentManagement.news.edit',compact('latestNew'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewRequest $request, $id)
    {
        try{
            $latestNew = LatestNew::find($id);
            $latestNew->name = $request->name;
            $latestNew->status = $request->status;
            $latestNew->slug = Str::slug($request->name, '-');
            $latestNew->content = $request->content;
            if ($request->hasFile('mainImage')) {
                $latestNew->clearMediaCollection('mainImages');
                $latestNew->addMediaFromRequest('mainImage')->toMediaCollection('mainImages');
            }
            if ($request->hasFile('subImages')) {
                $latestNew->clearMediaCollection('subImages');
                foreach ($subImages as $image) {
                    $latestNew->addMedia($image)->toMediaCollection('subImages');
                }
            }
            $latestNew->save();
            return redirect()->route('dashboard.latestNews.index')->with('success','latestNew has been created successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.latestNews.index')->with('error',$error->getMessage());
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
            LatestNew::find($id)->delete();

            return redirect()->route('dashboard.latestNews.index')->with('success','latestNew has been deleted successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.latestNews.index')->with('error',$error->getMessage());
        }

    }
}
