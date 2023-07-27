<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Article,
    User,
    Property,
    Testimonial
};
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $activeUserCount = User::active()->where('role','!=', config('constants.super_admin'))->count();
        $activePropertyCount = Property::active()->count();
        $activeTestimonialCount = Testimonial::active()->count();
        $activeBlogCount = Article::active()->count();

        return view('dashboard.dashboard', compact([
            'activeUserCount',
            'activePropertyCount',
            'activeBlogCount',
            'activeTestimonialCount'
        ]));
    }
}
