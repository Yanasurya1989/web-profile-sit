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
            'btn_primary_text' => 'nullable|string|max:255',
            'btn_primary_link' => 'nullable|url',
            'btn_secondary_text' => 'nullable|string|max:255',
            'btn_secondary_link' => 'nullable|url',
        ]);

        $path = $request->file('image')->store('hero', 'public');

        Hero::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'storage/' . $path,
            'status' => $request->status,
            'btn_primary_text' => $request->btn_primary_text,
            'btn_primary_link' => $request->btn_primary_link,
            'btn_secondary_text' => $request->btn_secondary_text,
            'btn_secondary_link' => $request->btn_secondary_link,
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
            'btn_primary_text' => 'nullable|string|max:255',
            'btn_primary_link' => 'nullable|url',
            'btn_secondary_text' => 'nullable|string|max:255',
            'btn_secondary_link' => 'nullable|url',
        ]);

        $data = $request->only([
            'title',
            'description',
            'status',
            'btn_primary_text',
            'btn_primary_link',
            'btn_secondary_text',
            'btn_secondary_link',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('hero', 'public');
            $data['image'] = 'storage/' . $path;
        }

        $hero->update($data);

        return redirect()->route('admin.hero.index')->with('success', 'Hero berhasil diperbarui');
    }

    public function destroy(Hero $hero)
    {
        $hero->delete();
        return redirect()->route('admin.hero.index')->with('success', 'Hero berhasil dihapus');
    }

    public function toggleStatus($id)
    {
        $hero = Hero::findOrFail($id);
        $hero->status = !$hero->status; // toggle 1 <-> 0
        $hero->save();

        return back()->with('success', 'Status hero berhasil diubah!');
    }
}
