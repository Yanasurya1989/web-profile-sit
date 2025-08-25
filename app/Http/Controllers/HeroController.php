<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::all();
        return view('admin.hero.index', compact('heroes'));
    }

    public function create()
    {
        return view('admin.hero.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|max:2048',
            'status' => 'required|boolean',
        ]);

        $path = $request->file('image')->store('hero', 'public');

        Hero::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.hero.index')->with('success', 'Hero berhasil ditambahkan');
    }

    public function edit(Hero $hero)
    {
        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request, Hero $hero)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->only(['title', 'description', 'status']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('hero', 'public');
            $data['image'] = $path;
        }

        $hero->update($data);

        return redirect()->route('admin.hero.index')->with('success', 'Hero berhasil diperbarui');
    }

    public function destroy(Hero $hero)
    {
        $hero->delete();
        return redirect()->route('admin.hero.index')->with('success', 'Hero berhasil dihapus');
    }
}
