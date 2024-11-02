<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $videos = VideoGallery::where('status',1)->orderBy('order')->get();
        $galleries = Gallery::where('status',1)->orderBy('order')->get();
        return view('pages.portfolio', compact('videos', 'galleries'));
    }
}
