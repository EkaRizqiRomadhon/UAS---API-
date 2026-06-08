<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Destination;
use App\Models\Tour;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = Destination::latest()->take(5)->get();
        $tours        = Tour::where('is_active', true)->take(3)->get();
        $blogs        = Blog::where('is_published', true)->latest('published_at')->take(3)->get();

        return view('index', compact('destinations', 'tours', 'blogs'));
    }
}
