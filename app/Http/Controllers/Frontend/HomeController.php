<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\{
    Testimonial,
    PageTag,
    Property
};

class HomeController extends Controller
{
    public function home()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $testimonials = Testimonial::active()->latest()->get();
        return view('frontend.home', compact('testimonials', 'pagemeta'));
    }
    public function arabianRanches1()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.arabian1', compact('pagemeta'));
    }
    public function arabianRanches2()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.arabian2', compact('pagemeta'));
    }
    public function arabianRanches3()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.arabian3', compact('pagemeta'));
    }

    public function properties(Request $request)
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $properties = Property::active()->latest()->paginate(12);
        return view('frontend.properties', compact('pagemeta', 'properties'));

    }

    public function singleProperty($slug)
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.singleProperty', compact('pagemeta'));
    }

    public function contact()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.contact',compact('pagemeta'));
    }

    public function termsConditions()
    {
        $pageContent = PageContent::active()->where('page_name','termCondition')->get();
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.termsConditions',compact('pagemeta','pageContent'));
    }
    public function privacyPolicy()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $pageContent = PageContent::active()->where('page_name','privacyPolicy')->get();
        return view('frontend.privacyPolicy',compact('pagemeta','pageContent'));
    }

}
