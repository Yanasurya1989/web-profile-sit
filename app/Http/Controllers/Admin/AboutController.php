<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::latest()->paginate(10);
        return view('admin.about.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subtitle'   => 'required|string|max:255',
            'title'      => 'required|string|max:255',
            'short_desc' => 'required|string',
            'long_desc'  => 'nullable|string',
            'media_type' => 'required|in:image,video',
            'media_path' => 'required|string',
            'status'     => 'boolean',
        ]);

        About::create($validated);

        return redirect()->route('admin.about.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $validated = $request->validate([
            'subtitle'   => 'required|string|max:255',
            'title'      => 'required|string|max:255',
            'short_desc' => 'required|string',
            'long_desc'  => 'nullable|string',
            'media_type' => 'required|in:image,video',
            'media_path' => 'required|string',
            'status'     => 'boolean',
        ]);

        $about->update($validated);

        return redirect()->route('admin.about.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(About $about)
    {
        $about->delete();
        return redirect()->route('admin.about.index')->with('success', 'Data berhasil dihapus.');
    }

    public function show(About $about)
    {
        return view('admin.about.show', compact('about'));
    }

    public function toggleStatus(Request $request, About $about)
    {
        $about->status = $request->status;
        $about->save();

        return response()->json(['success' => true]);
    }
}
