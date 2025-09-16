<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstagramEmbed;
use Illuminate\Http\Request;

class InstagramEmbedController extends Controller
{
    public function index()
    {
        $embeds = InstagramEmbed::latest()->get();
        return view('admin.instagram.index', compact('embeds'));
    }

    public function create()
    {
        return view('admin.instagram.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'embed_code' => 'required',
        ]);

        InstagramEmbed::create($request->only('title', 'description', 'embed_code') + ['is_active' => $request->has('is_active')]);

        return redirect()->route('admin.instagram.index')->with('success', 'Embed berhasil ditambahkan.');
    }

    public function edit(InstagramEmbed $instagram)
    {
        return view('admin.instagram.edit', compact('instagram'));
    }

    public function update(Request $request, InstagramEmbed $instagram)
    {
        $request->validate([
            'embed_code' => 'required',
        ]);

        $instagram->update($request->only('title', 'description', 'embed_code') + [
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.instagram.index')->with('success', 'Embed berhasil diperbarui.');
    }

    public function destroy(InstagramEmbed $instagram)
    {
        $instagram->delete();
        return redirect()->route('admin.instagram.index')->with('success', 'Embed berhasil dihapus.');
    }
}
