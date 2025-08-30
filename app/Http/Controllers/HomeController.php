<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\News;
use App\Models\Stat;
use App\Models\About;
use App\Models\Footer;
use App\Models\Muwashofat;

class HomeController extends Controller
{
    public function index()
    {
        // $news = News::orderBy('published_at', 'desc')->take(3)->get();
        $news = News::where('status', 1)->latest()->get();
        $heroes = Hero::where('status', 1)->latest()->get();
        $abouts = About::where('status', 1)->latest()->get();
        $stats = Stat::all();
        $muwashofats = Muwashofat::where('status', 1)->get();

        $footer = Footer::where('is_active', 1)->first(); // hanya ambil yang aktif

        return view('home', compact('news', 'heroes', 'abouts', 'stats', 'muwashofats', 'footer'));
    }
}
