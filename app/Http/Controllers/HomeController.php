<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\News;
use App\Models\Stat;
use App\Models\About;
use App\Models\Footer;
use App\Models\Navbar;
use App\Models\Muwashofat;
use App\Models\Section;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua section aktif dan urut berdasarkan 'order'
        $sections = Section::where('is_active', true)
            ->orderBy('order')
            ->get();

        // Ambil data yang dibutuhkan partial
        $news = News::where('status', 1)->latest()->get();
        $heroes = Hero::where('status', 1)->latest()->get();
        $abouts = About::where('status', 1)->latest()->get();
        $stats = Stat::all();
        $muwashofats = Muwashofat::where('status', 1)->get();
        $footer = Footer::where('is_active', 1)->first();
        $navbar = Navbar::first();

        return view('home', compact(
            'sections',
            'news',
            'heroes',
            'abouts',
            'stats',
            'muwashofats',
            'footer',
            'navbar'
        ));
    }
}
