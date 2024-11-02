<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->where('status', 1)->get();
        return view('pages.services', compact('services'));
    }

    public function service($slug)
    {
        $service = Service::where('slug', 'like', "%$slug%")->first();
        return view('pages.service', compact('service'));
    }
}
