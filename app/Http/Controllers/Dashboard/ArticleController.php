<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Dashboard\ArticleRequest;
use App\Models\Article;
use Auth;

class ArticleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:'.config('constants.Permissions.content_management'),
        ['only' => ['index','create', 'edit', 'update', 'destroy']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::with('user')
        ->applyFilters($request->only(['status']))
        ->orderBy('id','desc')
        ->get();

        return view('dashboard.contentManagement.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.contentManagement.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        try{
            $article = new Article;
            $article->title = $request->title;
            $article->author = $request->author;
            $article->article_type = $request->article_type;
            $article->status = $request->status;
            $article->content = $request->content;
            $article->meta_title = $request->meta_title;
            $article->meta_keywords = $request->meta_keywords;
            $article->meta_description = $request->meta_description;
            $article->publish_at = $request->publish_at;
            $article->user_id = Auth::user()->id;
            if ($request->hasFile('mainImage')) {
                $img =  $request->file('mainImage');
                $imgExt = $img->getClientOriginalExtension();

                $imageName =  Str::slug($request->title).'.'.$imgExt;
                $article->addMediaFromRequest('mainImage')->usingFileName($imageName)->toMediaCollection('mainImages', 'articleFiles');

            }

            $article->save();

            return response()->json([
                'success' => true,
                'message'=> 'Article has been created successfully.',
                'redirect' => route('dashboard.articles.index'),
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'success' => false,
                'message'=> $error->getMessage(),
                'redirect' => route('dashboard.articles.index'),
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        if($article->article_type === 'Blog'){
            return redirect()->route('blog', $article->slug);
        }else{
            return redirect()->route('news', $article->slug);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('dashboard.contentManagement.articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        try{
            $article->title = $request->title;
            $article->author = $request->author;
            $article->article_type = $request->article_type;
            $article->status = $request->status;
            $article->content = $request->content;
            $article->meta_title = $request->meta_title;
            $article->meta_keywords = $request->meta_keywords;
            $article->meta_description = $request->meta_description;
            $article->publish_at = $request->publish_at;
            $article->generateSlug();
            $article->user_id = Auth::user()->id;
            if ($request->hasFile('mainImage')) {
                $article->clearMediaCollection('mainImages');

                $img =  $request->file('mainImage');
                $imgExt = $img->getClientOriginalExtension();

                $imageName =  Str::slug($request->title).'.'.$imgExt;
                $article->addMediaFromRequest('mainImage')->usingFileName($imageName)->toMediaCollection('mainImages', 'articleFiles');

            }

            $article->save();
            return response()->json([
                'success' => true,
                'message'=> 'Article has been updated successfully.',
                'redirect' => route('dashboard.articles.index'),
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'success' => false,
                'message'=> $error->getMessage(),
                'redirect' => route('dashboard.articles.index'),
            ]);
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
            Article::find($id)->delete();

            return redirect()->route('dashboard.articles.index')->with('success','Article has been deleted successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.articles.index')->with('error',$error->getMessage());
        }


    }
}
