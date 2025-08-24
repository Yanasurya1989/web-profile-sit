<?php

namespace App\Http\Controllers;

use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        // ambil 3 berita terbaru
        $news = News::orderBy('published_at', 'desc')->take(3)->get();

        // kirim ke view home.blade.php
        return view('home', compact('news'));
    }
}
