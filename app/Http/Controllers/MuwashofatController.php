<?php

namespace App\Http\Controllers;

use App\Models\Muwashofat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MuwashofatController extends Controller
{
    public function index()
    {
        $muwashofats = Muwashofat::latest()->paginate(10);
        return view('admin.muwashofat.index', compact('muwashofats'));
    }

    public function create()
    {
        return view('admin.muwashofat.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title'       => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
            ]);

            $imagePath = $request->file('image')->store('muwashofat', 'public');

            Muwashofat::create([
                'title'       => $request->title,
                'description' => $request->description,
                'image'       => $imagePath,
                'status'      => $request->status ?? 1,
            ]);

            return redirect()->route('admin.muwashofat.index')
                ->with('success', 'Muwashofat berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }


    public function edit(Muwashofat $muwashofat)
    {
        return view('admin.muwashofat.edit', compact('muwashofat'));
    }

    public function update(Request $request, Muwashofat $muwashofat)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'status']);

        if ($request->hasFile('image')) {
            if ($muwashofat->image && Storage::disk('public')->exists($muwashofat->image)) {
                Storage::disk('public')->delete($muwashofat->image);
            }
            $data['image'] = $request->file('image')->store('muwashofat', 'public');
        }

        $muwashofat->update($data);

        return redirect()->route('admin.muwashofat.index')->with('success', 'Muwashofat berhasil diperbarui');
    }

    public function destroy(Muwashofat $muwashofat)
    {
        if ($muwashofat->image && Storage::disk('public')->exists($muwashofat->image)) {
            Storage::disk('public')->delete($muwashofat->image);
        }
        $muwashofat->delete();

        return redirect()->route('admin.muwashofat.index')->with('success', 'Muwashofat berhasil dihapus');
    }

    public function show($id)
    {
        $m = Muwashofat::findOrFail($id);
        return view('admin.muwashofat.show', compact('m'));
    }
}
