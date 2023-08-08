<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\{
    Testimonial,
    PageTag,
    Property,
    Accommodation,
    Community,
    OfferType
};
use File;
class HomeController extends Controller
{
    public function home()
    {
        $fileName = 'pages/home.html';
        $filePathName = storage_path($fileName);

        if(File::exists($filePathName)) {
            return File::get($filePathName);
        }else{
            $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
            $testimonials = Testimonial::active()->latest()->get();
            return view('frontend.home', compact('testimonials', 'pagemeta'));
        }


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
        $accommodations = Accommodation::active()->latest()->get();
        $communities = Community::active()->latest()->get();
        $offerTypes = OfferType::active()->latest()->get();

        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $bedrooms = ['Studio',1,2,3,4,5,6,7,8,9,10,11];
        $bathrooms = [1,2,3,4,5,6,7];
        $properties = Property::query();
        if (isset($request->bedroom)) {
            $properties->where('bedrooms', $request->bedroom);
        }
        if (isset($request->bathroom)) {
            $properties->where('bathrooms', $request->bathroom);
        }
        if (isset($request->price)) {
            $properties->where('price','<=', $request->price);
        }
        if (isset($request->offerType)) {
            $properties->where('offer_type_id', $request->offerType);
        }
        if (isset($request->community)) {
            $properties->where('community_id', $request->community);
        }
        if (isset($request->accommodation)) {
            $properties->where('accommodation_id', $request->accommodation);
        }
        $properties = $properties->active()->latest()->paginate(16);

        return view('frontend.properties', compact('request','pagemeta','bedrooms','bathrooms', 'properties', 'accommodations', 'communities', 'offerTypes'));

    }

    public function singleProperty($slug)
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $property = Property::where('slug', $slug)->first();
        return view('frontend.singleProperty', compact('pagemeta', 'property'));
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
