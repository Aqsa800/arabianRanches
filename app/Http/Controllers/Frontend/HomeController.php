<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\{
    Testimonial,
    PageTag
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
        $contents = PageContent::WherePageName(config('constants.properties.name'))->latest()->get();
        $faqs = Faq::WherePageName(config('constants.properties.name'))->latest()->get();
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $category = Category::active()->orderBy('id', 'desc')->get();
        $accom = Accommodation::active()->orderBy('id', 'desc')->get();
          // $propertyName = Property::pluck('name')->toArray();
        // $propertyNo = Property::pluck('reference_number')->toArray();
        $communityName = Community::pluck('id','name')->toArray();
        $searchKey =  $communityName;

        if (($request->ajax() && $request->isMethod('post'))) {
            $collection = Property::query();
            // if ($request->filled('status_id')) {
            if (isset($request->status_id)) {
                $collection->where('category_id', $request->status_id);
            }
            if (isset($request->accommodataion_id)) {
                $collection->where('accommodation_id', $request->accommodataion_id);
            }
            if (isset($request->price_from) && isset($request->price_to)) {

                $collection->whereBetween('price', [$request->price_from, $request->price_to]);
            } else if (isset($request->price_from)) {

                $collection->where('price', '>=', $request->price_from);
            } else if (isset($request->price_to)) {

                $collection->where('price', '<=', $request->price_to);
            }



            if (isset($request->keywords)) {

                $searchkeywords = $request->keywords;
                $searchArray = explode(",", $searchkeywords);

                $collection->whereHas('communities', function ($query) use ($searchArray) {
                    $query->whereIn('id', $searchArray);
                });
            }

            if (isset($request->bedrooms)) {
                // dd($request->bedrooms);
                $bedrooms = explode(",", $request->bedrooms);
                $collection->whereIn('bedrooms', $bedrooms);
                foreach ($bedrooms as $bed) {
                    if ($bed == 7) {
                        $collection->where('bedrooms', '>=', $bed);
                    }
                }
            }
            if (isset($request->bathrooms)) {
                $bathrooms = explode(",", $request->bathrooms);
                $collection->whereIn('bathrooms', $bathrooms);
                foreach ($bathrooms as $bath) {
                    if ($bath == 7) {
                        $collection->where('bathrooms', '>=', $bath);
                    }
                }
            }
            if (isset($request->exclusive) && $request->exclusive == 1) {
                $collection->where('exclusive', $request->exclusive);
            }

            if (isset($request->sort)) {
                if ($request->sort == "Newest") {
                    $collection->orderBy('id', 'desc');
                } elseif ($request->sort == "Lowest") {
                    $collection->orderBy('price', 'asc');
                } elseif ($request->sort == "Highest") {
                    $collection->orderBy('price', 'desc');
                } elseif ($request->sort == "Least") {
                    $collection->orderBy('bedrooms', 'asc');
                } elseif ($request->sort == "Most") {
                    $collection->orderBy('bedrooms', 'desc');
                } else {
                    $collection->orderBy('id', 'desc');
                }
            } else {
                $collection->orderBy('id', 'desc');
            }

            $propCount = $collection->active()->get();
            // dd($propCount);
            $properties = $collection->active()->paginate(8);

            $data = $request->all();
            // dd($data);
            $current_page = request()->filled('page') ? request()->page : 1;
            // dd($current_page);
            $html = view('frontend.ajaxProperties', compact('properties', 'data','pagemeta','propCount','contents', 'faqs'))->render();

            return response()->json(['success' => true, 'html' => $html, 'page' => $current_page, 'count' => $properties->count(), 'url' => '/properties?page=' . $current_page]);
        } else if (($request->isMethod('post'))) {

            $collection = Property::query();
            // if ($request->filled('status_id')) {
            if (isset($request->status)) {
                $request->merge(['status' => $request->status]);
                $collection->where('category_id', $request->status);
            }
            if (isset($request->accomodation)) {
                $collection->where('accommodation_id', $request->accomodation);
            }
            if (isset($request->developer)) {
                $collection->where('developer_id', $request->developer);
            }
            if (isset($request->community)) {
                $collection->where('community_id', $request->community);
            }
            if (isset($request->exclusive) && $request->exclusive == 1) {
                $collection->where('exclusive', $request->exclusive);
            }



            if (isset($request->keywords) || isset($request->community)) {

                if(isset($request->keywords)){
                    $searchArray = $request->keywords;
                }elseif(isset($request->community)){

                    $searchArray = array($request->community);
                    $request->merge(['keywords' => $searchArray]);

                }

                // dd($searchArray);
                $collection->whereHas('communities', function ($query) use ($searchArray) {
                    $query->whereIn('id', $searchArray);
                });

            }

            $collection->orderBy('id', 'desc');
            $propCount = $collection->active()->get();

            $properties = $collection->active()->paginate(8);
            $data = $request->all();


            return view('frontend.properties', compact('properties', 'searchKey', 'category', 'accom', 'data','pagemeta','propCount','contents', 'faqs'));
        } else {

            $properties = Property::active()->orderBy('id', 'desc')->paginate(8);
            $propCount =  Property::active()->get();

            return view('frontend.properties', compact('properties', 'searchKey', 'category', 'accom','pagemeta','propCount','contents', 'faqs'));
        }
    }

    public function singleProperty($slug)
    {
        $property = Property::with('amenities')->where('slug', $slug)->first();
        $similarProp = Property::with('amenities')->where('sub_title', $property->sub_title)->orWhere('subcommunity_id', $property->subcommunity_id)->orWhere('community_id', $property->community_id)->orWhere('bedrooms', $property->bedrooms)->take(6)->get();
        return view('frontend.singleProperty', compact('property', 'similarProp'));
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
