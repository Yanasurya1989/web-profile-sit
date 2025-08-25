<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;



class NewsController extends Controller
{
    public function index()
    {
        // ambil 3 berita terbaru
        $news = News::orderBy('published_at', 'desc')->take(3)->get();
        return view('partials.news', compact('news'));
    }

    public function all()
    {
        // semua berita
        $news = News::orderBy('published_at', 'desc')->paginate(6);
        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }

    // 📌 List berita untuk admin
    public function adminIndex()
    {
        $news = News::orderBy('published_at', 'desc')->paginate(10);
        return view('news.backend.index', compact('news'));
    }

    // 📌 Form create
    public function create()
    {
        return view('news.backend.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'published_at' => 'required|date',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            // simpan file asli ke storage
            $file = $request->file('image');
            $path = $file->store('news', 'public');

            // resize (misal max width 800px)
            $fullPath = storage_path('app/public/' . $path);
            $img = Image::make($fullPath)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save($fullPath, 80); // kualitas 80%

            $imagePath = 'storage/' . $path;
        }

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    // 📌 Form edit
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.backend.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'published_at' => 'required|date',
        ]);

        $imagePath = $news->image;

        if ($request->hasFile('image')) {
            // hapus file lama kalau ada
            if ($news->image && Storage::exists(str_replace('storage/', 'public/', $news->image))) {
                Storage::delete(str_replace('storage/', 'public/', $news->image));
            }

            $file = $request->file('image');
            $path = $file->store('news', 'public');

            // resize
            $fullPath = storage_path('app/public/' . $path);
            $img = \Intervention\Image\Facades\Image::make($fullPath)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save($fullPath, 80);

            $imagePath = 'storage/' . $path;
        }

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('news.backend.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        // hapus file gambar kalau ada
        if ($news->image && Storage::exists(str_replace('storage/', 'public/', $news->image))) {
            Storage::delete(str_replace('storage/', 'public/', $news->image));
        }

        $news->delete();

        return redirect()->route('news.backend.index')->with('success', 'Berita berhasil dihapus!');
    }

    public function toggleStatus($id)
    {
        $news = News::findOrFail($id);
        $news->status = !$news->status; // toggle 1 <-> 0
        $news->save();

        return back()->with('success', 'Status berita berhasil diubah!');
    }
}
