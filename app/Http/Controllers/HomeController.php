<?php

namespace App\Http\Controllers;



use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Testimonial;
use App\Nova\HeaderSection;
use App\Nova\ServiceCategory;
use App\Nova\WhyUsHomePage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct( )
    {

    }


    public function index() {
        $hero = \App\Models\HeaderSection::first();
        $who = \App\Models\WhyUsHomePage::first();
        $services = Service::orderBy('order')->where('status', 1)->paginate(5);
        $testimonials = Testimonial::orderBy('order')->where('status', 1)->paginate(5);
        $galleries = Gallery::where('status',1)->orderBy('order')->where('see_on_home_page', 1)->get();
        $blogs = Blog::where('status', 1)->inRandomOrder()->paginate(3);
        return view('pages.home', compact('hero', 'who', 'services', 'testimonials', 'galleries', 'blogs'));
    }
}
