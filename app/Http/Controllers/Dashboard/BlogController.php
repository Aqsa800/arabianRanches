<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Dashboard\BlogRequest;
use App\Models\Blog;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogs = Blog::with('user')
        ->applyFilters($request->only(['status']))
        ->orderBy('id','desc')
        ->paginate(5);

        return view('dashboard.contentManagement.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.contentManagement.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        try{
            $blog = new Blog;
            $blog->name = $request->name;
            $blog->status = $request->status;
            $blog->meta_title = $request->meta_title;
            $blog->meta_description = $request->meta_description;
            $blog->meta_keyword = $request->meta_keyword;
            $blog->content = $request->content;
            $blog->publish_date = $request->publish_date;
            $blog->slug = $this->createSlug($request->name);
            $blog->user_id = Auth::user()->id;
            if ($request->hasFile('mainImage')) {
                $image = $request->file('mainImage');
                $file_name = 'blogImg_' . time() . '.' . $image->getClientOriginalExtension();
                //$blog->addMediaFromRequest('mainImage')->toMediaCollection('mainImages');
                $blog->addMediaFromRequest('mainImage')->usingFileName($file_name)->toMediaCollection('mainImages');
            }
           
            $blog->save();
            return redirect()->route('dashboard.blogs.index')->with('success','Blog has been created successfully.');

        }catch(\Exception $error){
            return redirect()->route('dashboard.blogs.index')->with('error',$error->getMessage());
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
    public function edit(Blog $blog)
    {
        return view('dashboard.contentManagement.blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        try{
            $blog->name = $request->name;
            $blog->status = $request->status;
            $blog->meta_title = $request->meta_title;
            $blog->meta_description = $request->meta_description;
            $blog->meta_keyword = $request->meta_keyword;
            
            $blog->content = $request->content;
            $blog->publish_date = $request->publish_date;
            if ($request->hasFile('mainImage')) {
                $blog->clearMediaCollection('mainImages');
                $blog->addMediaFromRequest('mainImage')->toMediaCollection('mainImages');
            }
            
            $blog->save();
            return redirect()->route('dashboard.blogs.index')->with('success','Blog has been updated successfully.');

        }catch(\Exception $error){
            return redirect()->route('dashboard.blogs.index')->with('error',$error->getMessage());
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
            Blog::find($id)->delete();

            return redirect()->route('dashboard.blogs.index')->with('success','Blog has been deleted successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.blogs.index')->with('error',$error->getMessage());
        }


    }
    public function createSlug($title)
    {
        // Normalize the title
        $slug = Str::slug($title);
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug);
        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i >= 1; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }
    protected function getRelatedSlugs($slug)
    {
        return Blog::select('slug')->where('slug', 'like', $slug.'%')->get();
    }
}
