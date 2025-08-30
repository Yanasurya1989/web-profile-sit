<?php

namespace App\Http\Controllers;

use App\Models\DetilSd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DetilSdController extends Controller
{
    public function index()
    {
        $items = DetilSd::latest()->get();
        return view('admin.detil_sd.index', compact('items'));
    }

    public function create()
    {
        return view('admin.detil_sd.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('gambar')->store('detil_sd', 'public');

        DetilSd::create([
            'gambar' => $path,
        ]);

        return redirect()->route('admin.detil-sd.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(DetilSd $detil_sd)
    {
        return view('admin.detil_sd.edit', compact('detil_sd'));
    }

    public function update(Request $request, DetilSd $detil_sd)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($detil_sd->gambar) {
                Storage::disk('public')->delete($detil_sd->gambar);
            }
            $path = $request->file('gambar')->store('detil_sd', 'public');
            $detil_sd->gambar = $path;
        }

        $detil_sd->save();

        return redirect()->route('admin.detil-sd.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(DetilSd $detil_sd)
    {
        if ($detil_sd->gambar) {
            Storage::disk('public')->delete($detil_sd->gambar);
        }

        $detil_sd->delete();

        return redirect()->route('admin.detil-sd.index')->with('success', 'Data berhasil dihapus!');
    }

    public function show()
    {
        $detil_sd = DetilSd::all();
        return view('frontend.detil_sd', compact('detil_sd'));
    }
}
