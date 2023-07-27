<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\TestimonialRequest;
use App\Models\{Testimonial, Agent};
use Auth;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:'.config('constants.Permissions.testimonials'),
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
        $testimonials = Testimonial::with('user')
                        ->latest()
                        ->get();

        return view('dashboard.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::active()->latest()->get();
        return view('dashboard.testimonials.create', compact('agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        try{
            $testimonial = new Testimonial;
            $testimonial->client_name = $request->client_name;
            $testimonial->status = $request->status;
            $testimonial->feedback_title = $request->feedback_title;
            $testimonial->feedback = $request->feedback;
            if ($request->hasFile('image')) {
                $img =  $request->file('image');
                $imgExt = $img->getClientOriginalExtension();

                $imageName =  Str::slug($request->client_name).'.'.$imgExt;
                $testimonial->addMediaFromRequest('image')->usingFileName($imageName)->toMediaCollection('images', 'testimonialFiles');
            }
            $testimonial->rating = $request->rating;
            $testimonial->agent_id = $request->agent_id;
            $testimonial->user_id = Auth::user()->id;
            $testimonial->save();

            return response()->json([
                'success' => true,
                'message'=> 'Testimonial has been Updated successfully.',
                'redirect' => route('dashboard.testimonials.index'),
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'success' => false,
                'message'=> $error->getMessage(),
                'redirect' => route('dashboard.testimonials.index'),
            ]);
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
    public function edit(Testimonial $testimonial)
    {
        $agents = Agent::active()->latest()->get();
        return view('dashboard.testimonials.edit',compact('testimonial','agents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, Testimonial $testimonial)
    {
        try{

            $testimonial->client_name = $request->client_name;
            $testimonial->status = $request->status;
            $testimonial->feedback_title = $request->feedback_title;
            $testimonial->feedback = $request->feedback;
            if ($request->hasFile('image')) {
                $testimonial->clearMediaCollection('images');
                $img =  $request->file('image');
                $imgExt = $img->getClientOriginalExtension();
                $imageName =  Str::slug($request->client_name).'.'.$imgExt;
                $testimonial->addMediaFromRequest('image')->usingFileName($imageName)->toMediaCollection('images', 'testimonialFiles');
            }
            $testimonial->rating = $request->rating;
            $testimonial->agent_id = $request->agent_id;
            $testimonial->user_id = Auth::user()->id;
            $testimonial->save();
            return response()->json([
                'success' => true,
                'message'=> 'Testimonial has been Updated successfully.',
                'redirect' => route('dashboard.testimonials.index'),
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'success' => false,
                'message'=> $error->getMessage(),
                'redirect' => route('dashboard.testimonials.index'),
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
            Testimonial::find($id)->delete();

            return redirect()->route('dashboard.testimonials.index')->with('success','Testimonial has been deleted successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.testimonials.index')->with('error',$error->getMessage());
        }
    }
}
