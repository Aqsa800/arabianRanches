<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\TestimonialRequest;
use App\Models\Testimonial;
use Auth;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $testimonials = Testimonial::with('user')
                        ->applyFilters($request->only(['status']))
                        ->orderBy('id','desc')
                        ->paginate(5);

        return view('dashboard.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.testimonials.create');
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
            $testimonial->name = $request->name;
            $testimonial->status = $request->status;
            $testimonial->designation = $request->designation;
            $testimonial->message = $request->message;
            $testimonial->user_id = Auth::user()->id;
            $testimonial->addMediaFromRequest('image')->toMediaCollection('images');
            $testimonial->save();
            return redirect()->route('dashboard.testimonials.index')->with('success','Testimonial has been created successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.testimonials.index')->with('error',$error->getMessage());
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
        return view('dashboard.testimonials.edit',compact('testimonial'));
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
            $testimonial->name = $request->name;
            $testimonial->status = $request->status;
            $testimonial->designation = $request->designation;
            $testimonial->message = $request->message;
            if ($request->hasFile('image')) {
                $testimonial->clearMediaCollection('images');
                $testimonial->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $testimonial->save();

            return redirect()->route('dashboard.testimonials.index')->with('success','Testimonial has been updated successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.testimonials.index')->with('error',$error->getMessage());
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
