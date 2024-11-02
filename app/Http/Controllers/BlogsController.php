<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Nova\BlogCategory;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index(Request $request)
    {
        $searchItem = $request->search;
        $categorySlug = $request->category;

        $query = Blog::where('status', 1);

        if ($categorySlug) {
            $category = \App\Models\BlogCategory::where('title', 'like', "%$categorySlug%")->first()->id;
            $query->where('blog_category_id', $category);
        }

        if ($searchItem) {
            $query->where(function ($q) use ($searchItem) {
                $q->where('title', 'like', "%$searchItem%")
                    ->orWhere('tags', 'like', "%$searchItem%");
            });
        }

        $blogs = $query->inRandomOrder()->paginate(9);

        return view('pages.blogs', compact('blogs'));
    }


    public function blog($slug)
    {
        $cats = \App\Models\BlogCategory::where('status', 1)->orderBy('order')->get();
        $blog = Blog::where('slug', 'like', "%$slug%")->first();

        $recentBlogs = Blog::where('id', '!=', $blog->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view("pages.blog", compact('blog', 'cats', 'recentBlogs'));
    }


}
