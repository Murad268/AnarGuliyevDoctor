<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Nova\AboutWhyUs;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $who = \App\Models\WhyUsHomePage::first();
        $services = Service::orderBy('order')->where('status', 1)->paginate(3);
        $aboutWho = \App\Models\AboutWhyUs::first();
        return view('pages.about', compact('who', 'services', 'aboutWho'));
    }
}
