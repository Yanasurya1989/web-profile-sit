<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\News;
use App\Models\About;

class HomeController extends Controller
{
    public function index()
    {
        // $news = News::orderBy('published_at', 'desc')->take(3)->get();
        $news = News::where('status', 1)->latest()->get();
        $heroes = Hero::where('status', 1)->latest()->get();
        $abouts = About::where('status', 1)->latest()->get();

        return view('home', compact('news', 'heroes', 'abouts'));
    }
}
