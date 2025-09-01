<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $footer = Footer::active()->first() ?? Footer::first();
        return view('admin.footer.index', compact('footer'));
    }

    public function create()
    {
        return view('admin.footer.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'school_name' => 'required|string|max:255',
            'address'     => 'required|string',
            'phone'       => 'required|string|max:20',
            'email'       => 'required|email',
            'navigation'  => 'nullable|string',
            'map_embed'   => 'nullable|string',
            'logo'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // proses logo upload
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('footer', 'public');
        }

        // ubah navigation string jadi array
        if (!empty($data['navigation'])) {
            $data['navigation'] = array_map('trim', explode(',', $data['navigation']));
        }

        Footer::create($data);

        return redirect()->route('admin.footer.index')->with('success', 'Footer berhasil ditambahkan.');
    }


    public function edit(Footer $footer)
    {
        return view('admin.footer.edit', compact('footer'));
    }

    public function update(Request $request, Footer $footer)
    {
        $data = $request->validate([
            'school_name' => 'required|string|max:255',
            'address'     => 'required|string',
            'phone'       => 'required|string|max:20',
            'email'       => 'required|email',
            'navigation'  => 'nullable|string',
            'map_embed'   => 'nullable|string',
            'logo'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            // hapus logo lama kalau ada
            if ($footer->logo && Storage::disk('public')->exists($footer->logo)) {
                \Storage::disk('public')->delete($footer->logo);
            }
            $data['logo'] = $request->file('logo')->store('footer', 'public');
        }

        if (!empty($data['navigation'])) {
            $data['navigation'] = array_map('trim', explode(',', $data['navigation']));
        }

        $footer->update($data);

        return redirect()->route('admin.footer.index')->with('success', 'Footer berhasil diperbarui.');
    }


    public function destroy(Footer $footer)
    {
        $footer->delete();
        return redirect()->route('admin.footer.index')->with('success', 'Footer berhasil dihapus');
    }

    public function setActive($id)
    {
        // Nonaktifkan semua footer
        Footer::where('is_active', true)->update(['is_active' => false]);

        // Aktifkan footer yang dipilih
        $footer = Footer::findOrFail($id);
        $footer->update(['is_active' => true]);

        return redirect()->route('admin.footer.index')->with('success', 'Footer berhasil diaktifkan');
    }
}
