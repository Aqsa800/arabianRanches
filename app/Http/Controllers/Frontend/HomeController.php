<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\Agent;
use App\Models\Article;
use App\Models\Award;
use App\Models\Banner;
use App\Models\Career;
use App\Models\Category;
use App\Models\Community;
use App\Models\Counter;
use App\Models\Developer;
use App\Models\Faq;
use App\Models\FloorPlan;
use App\Models\Language;
use App\Models\PageContent;
use App\Models\PageTag;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Property;
use App\Models\Service;
use App\Models\Stat;
use App\Models\SubFloorPlan;
use App\Models\TagCategory;
use App\Models\Testimonial;
use App\Models\{
    VideoGallery,
    DynamicPage
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();

        $testimonials = Testimonial::with('agent')->active()->orderBy('id', 'desc')->get();
        $services = Service::active()->mainService()->orderBy('id', 'desc')->take(6)->get();
        $agents = Agent::active()->where('is_display_home',1)->orderBy('id', 'desc')->take(6)->get();
        $articles = Article::active()->orderBy('id', 'desc')->take(5)->get();
        $propertyName = Project::mainProject()->pluck('title')->toArray();
        $communityName = Community::pluck('name')->toArray();
        $searchKey =  array_merge($propertyName, $communityName);
        $languages = Language::active()->get();
        $nationality = Agent::select('nationality')->active()->groupBy('nationality')->get();
        $serviceAll = Service::mainService()->active()->get();
        $communities = Community::active()->latest()->take(8)->get();
        $developers = Developer::active()->orderBy(DB::raw('orderBy IS NULL, orderBy'), 'asc')->take(4)->get();
        $offplan = Project::active()->where('is_display_home', 1)->get();
        $properties = Property::active()->where('is_display_home', 1)->get();
        $exclusives = Property::active()->where('exclusive', 1)->where('is_display_home', 1)->get();

        // $awards = Award::with('developer')->orderBy('id', 'desc')->take(5)->get();
        // $awards = Award::select('developer_id', DB::raw('count(*) as total'))
        //     ->groupBy('developer_id')
        //     ->get();
        $awards = Award::with('developer')->orderBy('year','asc')->get();
        $awardsAll = $awards->groupBy('developer_id');
        //  dd($awardsAll);
        $banner = Banner::active()->orderBy('id','desc')->get();
        $counters = Counter::active()->orderBy('id','asc')->get();
        $pageContent = PageContent::active()->where('page_name','home')->first();
        return view('frontend.home', compact('testimonials','pagemeta', 'services', 'agents', 'articles', 'searchKey', 'languages', 'nationality', 'serviceAll', 'communities', 'developers', 'offplan', 'properties', 'exclusives','awardsAll','banner','counters','pageContent'));
    }
    public function aboutUs()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $awards = Award::with('developer')->orderBy('year','asc')->get();
        $awardsAll = $awards->groupBy('developer_id');

        $agents = Agent::active()->orderBy('id', 'desc')->take(6)->get();
        $propertyName = Project::mainProject()->pluck('title')->toArray();
        $communityName = Community::pluck('name')->toArray();
        $searchKey =  array_merge($propertyName, $communityName);
        $languages = Language::active()->get();
        $nationality = Agent::select('nationality')->active()->groupBy('nationality')->get();
        $serviceAll = Service::mainService()->active()->get();
        $pageContent = PageContent::active()->where('page_name','about-us')->first();
        $ceoContent = PageContent::active()->where('page_name','ceo')->first();
        $partners = Partner::active()->orderBy('id','desc')->get();
        return view('frontend.aboutUs',compact('awardsAll', 'agents', 'searchKey', 'languages', 'nationality', 'serviceAll','pagemeta','pageContent','ceoContent','partners'));
    }
    public function agents(Request $request)
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $property = Project::mainProject()->pluck('title')->toArray();
        $community = Community::pluck('name')->toArray();
        $search =  array_merge($property, $community);
        $languages = Language::active()->get();
        $nationality = Agent::select('nationality')->active()->groupBy('nationality')->get();
        $services = Service::mainService()->active()->latest()->get();
        $collection = Agent::withCount('saleProperties', 'resaleProperties');
        if (($request->isMethod('post'))) {

            if (isset($request->keywords)) {

                $searchArray = $request->keywords;
                $projectIds = [];
                $communityIds = [];
                foreach($searchArray as $item){
                    $projectId = Project::where('title', $item)->first();
                    if($projectId != null){
                        $projectIds[] = $projectId->id;
                    }
                    $communityId = Community::where('name', $item)->first();
                    if($communityId != null){
                        $communityIds[] = $communityId->id;
                    }

                }

                if($projectIds != null || $communityIds != null){
                    $collection->WhereHas('projects', function ($q)  use ($projectIds) {
                         $q->whereIn('project_id', $projectIds);
                     })->orWhereHas('communities', function ($q)  use ($communityIds) {
                        $q->whereIn('community_id', $communityIds);
                    });;
                 }

                // $collection->WhereHas('projects', function ($q)  use ($searchArray) {
                //     $q->whereIn('title', $searchArray)->orWhereHas('communities', function ($q)  use ($searchArray) {
                //         $q->whereIn('name', $searchArray);
                //     });
                // });
            }
            if (isset($request->language)) {
                $langs = $request->language;

                $collection->WhereHas('languages', function ($q)  use ($langs) {
                    $q->whereIn('languages.id', $langs);
                });
            }
            if (isset($request->service)) {
                $serv = $request->service;

                $collection->WhereHas('services', function ($f)  use ($serv) {
                    $f->whereIn('services.id', $serv);
                });
            }
            if (isset($request->nationality)) {
                $national = $request->nationality;

                $collection->whereIn('nationality', $national);
            }
            $agents = $collection->active()->orderBy(DB::raw('orderBy IS NULL, orderBy'), 'asc')->get();
            $data = $request->all();
            return view('frontend.agents', compact('agents', 'search', 'languages', 'nationality', 'services', 'data','pagemeta'));
        }
        $agents = Agent::withCount('saleProperties', 'resaleProperties')->active()->orderBy(DB::raw('orderBy IS NULL, orderBy'), 'asc')->get();

        return view('frontend.agents', compact('agents', 'search', 'languages', 'nationality', 'services','pagemeta'));
    }
    public function rent(Request $request)
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $contents = PageContent::WherePageName(config('constants.rent.name'))->latest()->get();
        $faqs = Faq::WherePageName(config('constants.rent.name'))->latest()->get();

        $category = Category::active()->orderBy('id', 'desc')->get();
        $accom = Accommodation::active()->orderBy('id', 'desc')->get();
         // $propertyName = Property::pluck('name')->toArray();
        // $propertyNo = Property::pluck('reference_number')->toArray();
        $communityName = Community::pluck('id','name')->toArray();
        $searchKey =  $communityName;
        // dd($request->all());
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
            $properties = $collection->active()->paginate(8);
            // dd(count($propCount));
            $data = $request->all();

            $current_page = request()->filled('page') ? request()->page : 1;
            // dd($current_page);
            $html = view('frontend.ajaxProperties', compact('properties', 'data','pagemeta','propCount','contents', 'faqs'))->render();

            return response()->json(['success' => true, 'html' => $html, 'page' => $current_page, 'count' => $properties->count(), 'url' => '/rent?page=' . $current_page]);
        }else if (($request->isMethod('post'))) {
            $collection = Property::query();
            // if ($request->filled('status_id')) {
            if (isset($request->status)) {
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



            if (isset($request->keywords)) {

                $searchArray = $request->keywords;

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
            $properties = Property::active()->where('category_id', 1)->orderBy('id', 'desc')->paginate(8);
            $propCount = Property::active()->where('category_id', 1)->orderBy('id', 'desc')->get();
        return view('frontend.properties', compact('properties', 'searchKey', 'category', 'accom','pagemeta','propCount','contents', 'faqs'));
        }


    }
    public function resale(Request $request)
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $contents = PageContent::WherePageName(config('constants.resale.name'))->latest()->get();
        $faqs = Faq::WherePageName(config('constants.resale.name'))->latest()->get();

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
            $properties = $collection->active()->paginate(8);
            $data = $request->all();
            // dd($data["exclusive"]);
            $current_page = request()->filled('page') ? request()->page : 1;
            // dd($current_page);
            $html = view('frontend.ajaxProperties', compact('properties', 'data','pagemeta','propCount','contents', 'faqs'))->render();

            return response()->json(['success' => true, 'html' => $html, 'page' => $current_page, 'count' => $properties->count(), 'url' => '/resale?page=' . $current_page]);
        }else if (($request->isMethod('post'))) {
            $collection = Property::query();
            // if ($request->filled('status_id')) {
            if (isset($request->status)) {
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



            if (isset($request->keywords)) {

                $searchArray = $request->keywords;

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
            $properties = Property::active()->where('category_id', 2)->orderBy('id', 'desc')->paginate(8);
            $propCount = Property::active()->where('category_id', 2)->orderBy('id', 'desc')->get();
        return view('frontend.properties', compact('properties', 'searchKey', 'category', 'accom','pagemeta','propCount','contents', 'faqs'));
        }


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
    public function projects(Request $request)
    {
        $contents = PageContent::WherePageName(config('constants.offPlan.name'))->latest()->get();
        $faqs = Faq::WherePageName(config('constants.offPlan.name'))->latest()->get();
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $allCommunities = Community::active()->latest()->get();
        $developers = Developer::active()->orderBy('orderBy', 'asc')->latest()->get();
        $accomodation = Accommodation::active()->latest()->get();
        $projectName = Project::mainProject()->pluck('title')->toArray();
        $search =  $projectName;
        $tags = TagCategory::active()->where('type', 'Project')->latest()->get();
        if (($request->ajax() && $request->isMethod('post'))) {

            $collection = Project::mainProject();
            // if ($request->filled('status_id')) {
            if (isset($request->accomodation)) {
                $collection->whereHas('accommodations', function ($query) use ($request) {

                    $query->where('accommodations.id', $request->accomodation);
                });
            }


            if (isset($request->tag) &&  $request->tag != 'all') {
                $collection->WhereHas('tags', function ($q)  use ($request) {
                    $q->where('tags.tag_category_id', $request->tag);
                });
            }
            if (isset($request->developer)) {
                $collection->where('developer_id', $request->developer);
            }
            if (isset($request->community)) {
                $collection->where('community_id', $request->community);
            }

            if (isset($request->keywords)) {

                $searchkeywords = $request->keywords;

                $searchArray = explode(",", $searchkeywords);
                $collection->where(function($q) use($searchArray) {
                    foreach ($searchArray as $searchkeyword)
                       $q->orWhere('title', $searchkeyword);
            });
            }
            if (isset($request->exclusive) && $request->exclusive == 1) {
                $collection->where('is_new_launch', $request->exclusive);
            }

            if (isset($request->sort)) {
                if ($request->sort == "Newest") {
                    $collection->orderBy('id', 'desc');
                } elseif ($request->sort == "Lowest") {
                    $collection->orderBy('starting_price', 'asc');
                } elseif ($request->sort == "Highest") {
                    $collection->orderBy('starting_price', 'desc');
                } else {
                    $collection->orderBy('id', 'desc');
                }
            } else {
                $collection->orderBy('id', 'desc');
            }
            $projects = $collection->active()->paginate(8);

            $data = $request->all();

            $current_page = request()->filled('page') ? request()->page : 1;
            // dd($current_page);

            $html = view('frontend.ajaxProjects', compact('projects', 'data', 'tags','pagemeta','contents', 'faqs'))->render();

            return response()->json(['success' => true, 'html' => $html, 'page' => $current_page, 'count' => $projects->count(), 'url' => '/projects?page=' . $current_page]);
        } else if (($request->isMethod('post'))) {
            // dd($request->all());
            $collection = Project::mainProject();
            // if ($request->filled('status_id')) {
            // if (isset($request->status)) {
            //     $collection->where('category_id', $request->status);
            // }
            if (isset($request->accomodation)) {
                $collection->where('accommodation_id', $request->accomodation);
            }
            if (isset($request->developer)) {
                $collection->where('developer_id', $request->developer);
            }
            if (isset($request->community)) {
                $collection->where('community_id', $request->community);
            }

            if (isset($request->keywords)) {

                $searchArray = $request->keywords;
                $collection->where(function($q) use($searchArray) {
                    foreach ($searchArray as $searchkeyword)
                       $q->orWhere('title', $searchkeyword);
            });

            }

            $collection->orderBy('id', 'desc');
            $projects = $collection->active()->paginate(8);
            $data = $request->merge(['tag'=>'all']);
            return view('frontend.projects', compact('projects', 'allCommunities', 'developers', 'accomodation', 'search', 'tags','data','pagemeta','contents', 'faqs'));
        } else if (($request->isMethod('get'))) {
            $collection = Project::mainProject();
            // if (isset($request->status)) {
            //     $collection->where('category_id', $request->status);
            // }
            if (isset($request->community)) {
                $collection->where('community_id', $request->community);
            }
            if (isset($request->developer)) {
                $collection->where('developer_id', $request->developer);
            }
            $collection->orderBy('id', 'desc');
            $projects = $collection->active()->paginate(8);
            $data = $request->merge(['tag'=>'all']);
            return view('frontend.projects', compact('projects', 'allCommunities', 'developers', 'accomodation', 'search', 'tags', 'data','pagemeta','contents', 'faqs'));
        } else {
            $data = $request->merge(['tag'=>'all']);
            $projects = Project::mainProject()->active()->orderBy('id', 'desc')->paginate(8);

            return view('frontend.projects', compact('projects', 'allCommunities', 'developers', 'data','accomodation', 'search', 'tags','pagemeta','contents', 'faqs'));
        }
    }
    public function singleProject($slug)
    {
        $project = Project::with('amenities', 'stats', 'paymentPlans')->mainProject()->where('slug', $slug)->first();
        $agents = Agent::active()->whereHas('projects', function ($q)  use ($project) {
            $q->where('project_id', $project->id);
        })->orderBy('id', 'desc')->get();

        // $agents = Agent::active()->latest()->get();

        $propertyName = Project::mainProject()->pluck('title')->toArray();
        $communityName = Community::pluck('name')->toArray();
        $searchKey =  array_merge($propertyName, $communityName);
        $languages = Language::active()->get();
        $nationality = Agent::select('nationality')->active()->groupBy('nationality')->get();
        $serviceAll = Service::mainService()->active()->get();
        $similarProject = Project::whereHas('developer')->where('slug', '!=', $slug)->where(function ($query) use ($project) {
            $query->where('sub_title', $project->sub_title)->orWhere('sub_community_id', $project->sub_community_id)->orWhere('community_id', $project->community_id)->orWhere('bedrooms', $project->bedrooms);
        })->take(6)->get();
        // dd($similarProject);
        return view('frontend.singleProject', compact('project', 'agents', 'searchKey', 'languages', 'nationality', 'serviceAll', 'similarProject'));
    }
    public function communities(Request $request)
    {
        $contents = PageContent::WherePageName(config('constants.communities.name'))->latest()->get();
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $allCommunities = Community::active()->latest()->get();
        $developers = Developer::active()->orderBy('orderBy', 'asc')->get();
        $accomodation = Accommodation::active()->latest()->get();
        $categories = Category::active()->latest()->get();
        $propertyName = Property::pluck('name')->toArray();
        $projectName = Project::pluck('title')->toArray();
        $search =  array_merge($propertyName, $projectName);
        $tags = TagCategory::active()->where('type', 'Community')->latest()->get();

        if (($request->isMethod('post'))) {
            $collection = Community::query();
            if (isset($request->tags) && $request->tags != 'all') {
                $collection->WhereHas('tags', function ($q)  use ($request) {
                    $q->where('tags.tag_category_id', $request->tags);
                });
            }
            $communities = $collection->active()->latest()->paginate(9);
            $data = $request->all();
            return view('frontend.communities', compact('communities', 'tags', 'allCommunities', 'developers', 'accomodation', 'categories', 'search', 'data','pagemeta','contents'));
        } else if (($request->isMethod('get'))) {

            $collection = Community::query();
            if (isset($request->developer)) {
                $collection->WhereHas('communityDevelopers', function ($q)  use ($request) {
                    $q->where('community_developers.developer_id', $request->developer);
                });
            }

            $communities = $collection->active()->latest()->paginate(9);
            $data = $request->merge(['tags'=>'all']);
            return view('frontend.communities', compact('communities', 'tags', 'allCommunities', 'developers', 'accomodation', 'categories', 'search', 'data','pagemeta','contents'));
        } else {
            $data = $request->merge(['tags'=>'all']);
            $communities = Community::active()->latest()->paginate(9);

            return view('frontend.communities', compact('communities', 'tags', 'allCommunities', 'developers', 'accomodation', 'categories', 'search','data','pagemeta','contents'));
        }
    }
    public function developers(Request $request)
    {
        $contents = PageContent::WherePageName(config('constants.developers.name'))->get();
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        if (($request->isMethod('post'))) {
            $collection = Developer::with('projects', 'communityDevelopers','awards');
            if (isset($request->tags)) {
                $collection->WhereHas('tags', function ($q)  use ($request) {
                    $q->where('tags.tag_category_id', $request->tags);
                });
            }
            $developers = $collection->active()->orderBy(DB::raw('orderBy IS NULL, orderBy'), 'asc')->get();
            $data = $request->all();
            return view('frontend.developers', compact('developers', 'data','pagemeta','contents'));
        } else {
            $developers = Developer::with('projects', 'communityDevelopers')->active()
            ->orderBy(DB::raw('orderBy IS NULL, orderBy'), 'asc')->get();

            return view('frontend.developers', compact('developers','pagemeta','contents'));
        }
    }

    public function singleCommunity($slug)
    {
        ini_set('max_execution_time', 3000);
        $community = Community::with('stats', 'stats.values')->where('slug', $slug)->first();
        // dd($community);
        $projects = Project::active()->where('community_id', $community->id)->latest()->take(6)->get();
        $rent = Property::active()->where('community_id', $community->id)->where('category_id', 1)->latest()->take(6)->get();
        $resale = Property::active()->where('community_id', $community->id)->where('category_id', 2)->latest()->take(6)->get();
        $exclusive = Property::active()->where('community_id', $community->id)->where('exclusive', 1)->latest()->take(6)->get();

        $agents = Agent::active()->whereHas('communities', function ($q)  use ($community) {
            $q->where('community_id', $community->id);
        })->orderBy('id', 'desc')->take(6)->get();
        $propertyName = Project::mainProject()->pluck('title')->toArray();
        $communityName = Community::pluck('name')->toArray();
        $searchKey =  array_merge($propertyName, $communityName);
        $languages = Language::active()->get();
        $nationality = Agent::select('nationality')->active()->groupBy('nationality')->get();
        $serviceAll = Service::mainService()->active()->get();

        return view('frontend.singleCommunity', compact('community', 'projects', 'rent', 'resale', 'exclusive', 'agents', 'searchKey', 'languages', 'nationality', 'serviceAll'));
    }

    public function singleDeveloper($slug)
    {
        $developer = Developer::with('details','awards', 'tags', 'communityDevelopers', 'projects', 'projects.unhighlighted_amenities', 'projects.highlighted_amenities', 'projects.agent', 'projects.mainCommunity')->where('slug', $slug)->first();
        $latestProject = $developer->projects->where('is_new_launch', 1)->take(6);
        $latestProjects = $latestProject->all();

        $featured = $developer->projects->where('is_featured', 1)->take(6);
        $featuredProjects = $featured->all();
        $agents = Agent::active()->whereHas('developers', function ($q)  use ($developer) {
            $q->where('developer_id', $developer->id);
        })->orderBy('id', 'desc')->take(6)->get();
        $propertyName = Project::mainProject()->pluck('title')->toArray();
        $communityName = Community::pluck('name')->toArray();
        $searchKey =  array_merge($propertyName, $communityName);
        $languages = Language::active()->get();
        $nationality = Agent::select('nationality')->active()->groupBy('nationality')->get();
        $serviceAll = Service::mainService()->active()->get();
        $tags = TagCategory::active()->where('type', 'Developer')->latest()->get();
        return view('frontend.singleDeveloper', compact('developer', 'latestProjects', 'featuredProjects', 'agents', 'searchKey', 'languages', 'nationality', 'serviceAll', 'tags'));
    }

    public function singleProperty($slug)
    {
        $property = Property::with('amenities')->where('slug', $slug)->first();
        $similarProp = Property::with('amenities')->where('sub_title', $property->sub_title)->orWhere('subcommunity_id', $property->subcommunity_id)->orWhere('community_id', $property->community_id)->orWhere('bedrooms', $property->bedrooms)->take(6)->get();
        return view('frontend.singleProperty', compact('property', 'similarProp'));
    }

    public function singleAgent($slug, Request $request)
    {
        if (($request->isMethod('post'))) {
            $collection = Agent::with(['properties' => function ($q) use ($request) {
                if (isset($request->category)) {
                    $q->where('category_id', $request->category);
                }
                if (isset($request->sort)) {
                    if ($request->sort == "Exclusive") {
                        $q->where('exclusive', 1)->orderBy('id', 'desc');
                    } else if ($request->sort == "Newest") {
                        $q->orderBy('id', 'desc');
                    } elseif ($request->sort == "Lowest") {
                        $q->orderBy('price', 'asc');
                    } elseif ($request->sort == "Highest") {
                        $q->orderBy('price', 'desc');
                    } elseif ($request->sort == "Least") {
                        $q->orderBy('bedrooms', 'asc');
                    } elseif ($request->sort == "Most") {
                        $q->orderBy('bedrooms', 'desc');
                    } else {
                        $q->orderBy('id', 'desc');
                    }
                } else {
                    $q->orderBy('id', 'desc');
                }
            }]);
            $data = $request->all();
            $agent = $collection->where('slug', $slug)->first();

            $category = Category::active()->orderBy('id', 'desc')->get();
            return view('frontend.singleAgent', compact('agent', 'category', 'data'));
        }
        $agent = Agent::with('properties', 'projects')->where('slug', $slug)->first();
        $category = Category::active()->orderBy('id', 'desc')->get();
        return view('frontend.singleAgent', compact('agent', 'category'));
    }

    public function services()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $services = Service::mainService()->active()->get();
        return view('frontend.services', compact('services','pagemeta'));
    }


    public function singleService($slug)
    {
        $service = Service::where('slug', $slug)->first();
        $similarServices = Service::mainService()->where('slug', '!=', $slug)->active()->take(5)->get();
        return view('frontend.singleService', compact('service', 'similarServices'));
    }
    public function media($type = null)
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $data = $type;
        $news = Article::where('article_type', 'News')->active()->orderBy('id', 'desc')->paginate(8);
        $blogs = Article::where('article_type', 'Blog')->active()->orderBy('id', 'desc')->paginate(8);
        $videos = VideoGallery::active()->orderBy('id', 'desc')->paginate(9);
        return view('frontend.media', compact('news', 'blogs', 'videos', 'data','pagemeta'));
    }

    public function singleNews($slug)
    {
        $article = Article::where('slug', $slug)->where('article_type', 'News')->first();
        $similarArticle = Article::where('slug', '!=', $slug)->where('article_type', 'News')->take(5)->get();
        return view('frontend.singleMedia', compact('article', 'similarArticle'));
    }
    public function singleBlog($slug)
    {
        $article = Article::where('slug', $slug)->where('article_type', 'Blog')->first();
        $similarArticle = Article::where('slug', '!=', $slug)->where('article_type', 'Blog')->take(5)->get();
        return view('frontend.singleMedia', compact('article', 'similarArticle'));
    }
    public function contact()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.contact',compact('pagemeta'));
    }
    public function awards($developer = null)
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $data = $developer;

        if($data != ""){
            $dev = Developer::where('slug', $data)->first();
            $awards = Award::with('developer')->where('developer_id',$dev->id)->orderBy('year','desc')->get()
            ->groupBy('year');
            $awardCOunt = Award::with('developer')->orderBy('year','desc')->get();
        }else{
            $awards = Award::with('developer')->orderBy('year','desc')->get()
            ->groupBy('year');
            $awardCOunt = Award::with('developer')->orderBy('year','desc')->get();
        }

            $developers = Developer::withCount('awards')->orderBy('orderBy', 'asc')->get();
        //  dd($developers);
        return view('frontend.awards', compact('awards','developers','pagemeta','awardCOunt'));
    }
    public function careers()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $careers = Career::active()->orderBy('id', 'desc')->paginate(6);
        return view('frontend.careers', compact('careers','pagemeta'));
    }
    public function singleCareer($slug)
    {
        $career = Career::where('slug', $slug)->first();
        return view('frontend.singleCareer', compact('career'));
    }
    public function floorplans()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
         $floorplans = FloorPlan::with('community','subCommunity','subFloorPlans')->active()->get()->groupBy('community_id');
         $accomFloor = SubFloorPlan::with('floorplan','accommodation')->get()->groupBy('accommodation_id');

        return view('frontend.floorplans',compact('floorplans','pagemeta','accomFloor'));
    }

    public function floorplans1()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $floorplans = FloorPlan::with('community','subCommunity','subFloorPlans')->active()->get()->groupBy('community_id');
        $accomFloor = SubFloorPlan::with('floorplan','accommodation')->get()->groupBy('accommodation_id');

        $communities = Community::with('floorplans', 'subCommunities', 'subCommunities.floorplans')
                    ->has('floorplans')
                    ->active()
                    ->get();

        return view('frontend.floorplans1',compact('communities','floorplans','pagemeta','accomFloor'));
    }

    public function singleFloorplan($slug)
    {
        $floorplan = FloorPlan::where('slug', $slug)->first();
        $subFloorplans = SubFloorPlan::where('floor_plan_id',$floorplan->id)->get();
        return view('frontend.singleFloorplan',compact('subFloorplans','floorplan'));
    }
    public function faqs()
    {

        $faqs = Faq::WherePageName(config('constants.faqs.name'))->orderBy(DB::raw('orderBy IS NULL, orderBy'), 'asc')->get();
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.faq',compact('pagemeta','faqs'));
    }
    public function termsConditions()
    {
        $pageContent = PageContent::active()->where('page_name','termCondition')->get();
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.termsConditions',compact('pagemeta','pageContent'));
    }
    public function privacyPolicy()
    {
        // dd(Route::current()->getName());
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $pageContent = PageContent::active()->where('page_name','privacyPolicy')->get();
        return view('frontend.privacyPolicy',compact('pagemeta','pageContent'));
    }
    public function buyersGuide()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        $pageContent = PageContent::WherePageName(config('constants.buyerGuide.name'))->active()->first();
        return view('frontend.buyersGuide',compact('pagemeta','pageContent'));
    }
    public function sellersGuide()
    {
        $pageContent = PageContent::WherePageName(config('constants.sellerGuide.name'))->active()->first();
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.sellersGuide',compact('pagemeta','pageContent'));
    }
    public function commercialRealestate()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.commercialRealestate',compact('pagemeta'));
    }
    public function investDubai()
    {
        $pageContent = PageContent::WherePageName(config('constants.whyInvest.name'))->active()->first();
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.investDubai',compact('pagemeta','pageContent'));
    }
    public function aboutDubai()
    {
        $pageContent = PageContent::WherePageName(config('constants.aboutDubai.name'))->active()->first();
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.aboutDubai',compact('pagemeta','pageContent'));
    }
    public function propertyValuation()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.propertyValuation',compact('pagemeta'));
    }
    public function factsFigures()
    {
        $pageContent = PageContent::active()->WherePageName(config('constants.factFigure.name'))->first();
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.factsFigures',compact('pagemeta','pageContent'));
    }
    public function relocatingToDubai()
    {
        $pageContent = PageContent::active()->where('page_name','relocatingToDubai')->first();
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.relocatingToDubai',compact('pagemeta','pageContent'));
    }
    public function luxuryHomes()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.luxuryHomes',compact('pagemeta'));
    }
    public function sellYourProperty()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.sellYourProperty',compact('pagemeta'));
    }
    public function leaseYourProperty()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.leaseYourProperty',compact('pagemeta'));
    }
    public function rentProperty()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.rentProperty',compact('pagemeta'));
    }
    public function demo()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.demo',compact('pagemeta'));
    }
    public function thankYou()
    {
        $pagemeta =  PageTag::where('page_name',Route::current()->getName())->first();
        return view('frontend.thankYou',compact('pagemeta'));
    }
    public function dynamicPage($slug)
    {
        if(DynamicPage::active()->where('slug', $slug)->exists()){
            $page = DynamicPage::active()->where('slug', $slug)->first();
        }else{
            $page = null;
        }
        return view('frontend.dynamicPage',compact('page'));
    }
    public function assign()
    {
        $agents = Agent::latest()->get();
        $projects = Project::mainProject()->active()->pluck('id')->toArray();

        foreach($agents as $agent)
        {
            $agent->projects()->attach($projects);
        }
    }
}
