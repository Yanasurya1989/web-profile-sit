<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetilJenjang;
use Illuminate\Http\Request;

class DetilJenjangController extends Controller
{
    public function index()
    {
        $detils = DetilJenjang::all();
        return view('admin.detil_jenjang.index', compact('detils'));
    }

    public function create()
    {
        return view('admin.detil_jenjang.create');
    }

    public function storeJaga2(Request $request)
    {
        $validated = $request->validate([
            'level'  => 'required|in:SD,SMP,SMA',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('detil_jenjang', 'public');
        }

        // default status = aktif (1)
        $validated['status'] = 1;

        DetilJenjang::create($validated);

        return redirect()->route('admin.detil-jenjang.index')
            ->with('success', 'Detil jenjang berhasil ditambahkan.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'level'            => 'required|in:SD,SMP,SMA',
            'gambar'           => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'link_pendaftaran' => 'nullable|url',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('detil_jenjang', 'public');
        }

        $validated['status'] = 1;

        DetilJenjang::create($validated);

        return redirect()->route('admin.detil-jenjang.index')->with('success', 'Detil jenjang berhasil ditambahkan.');
    }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'level'            => 'required|in:SD,SMP,SMA',
    //         'gambar'           => 'required|image|mimes:jpg,jpeg,png|max:2048',
    //         'link_pendaftaran' => 'nullable|url',
    //     ]);

    //     if ($request->hasFile('gambar')) {
    //         $validated['gambar'] = $request->file('gambar')->store('detil_jenjang', 'public');
    //     }

    //     $validated['status'] = 1;

    //     // Cek apakah level sudah ada
    //     $existing = DetilJenjang::where('level', $validated['level'])->first();

    //     if ($existing) {
    //         // Update yang lama
    //         $existing->update($validated);
    //     } else {
    //         // Buat baru
    //         DetilJenjang::create($validated);
    //     }

    //     return redirect()->route('admin.detil-jenjang.index')->with('success', 'Detil jenjang berhasil disimpan.');
    // }

    public function update(Request $request, DetilJenjang $detilJenjang)
    {
        $validated = $request->validate([
            'level'            => 'required|in:SD,SMP,SMA',
            'gambar'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link_pendaftaran' => 'nullable|url',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('detil_jenjang', 'public');
        }

        $detilJenjang->update($validated);

        return redirect()->route('admin.detil-jenjang.index')->with('success', 'Detil jenjang berhasil diperbarui.');
    }

    public function edit(DetilJenjang $detilJenjang)
    {
        return view('admin.detil_jenjang.edit', compact('detilJenjang'));
    }

    public function updateJaga2(Request $request, DetilJenjang $detilJenjang)
    {
        $validated = $request->validate([
            'level'  => 'required|in:SD,SMP,SMA',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('detil_jenjang', 'public');
        }

        $detilJenjang->update($validated);

        return redirect()->route('admin.detil-jenjang.index')
            ->with('success', 'Detil jenjang berhasil diperbarui.');
    }

    public function destroy(DetilJenjang $detilJenjang)
    {
        $detilJenjang->delete();
        return redirect()->route('admin.detil-jenjang.index')
            ->with('success', 'Detil jenjang berhasil dihapus.');
    }

    public function toggle(DetilJenjang $detil)
    {
        $detil->status = !$detil->status;
        $detil->save();

        return back()->with('success', 'Status berhasil diperbarui');
    }
}
