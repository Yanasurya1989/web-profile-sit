<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Navbar;

class NavbarController extends Controller
{
    // Tampilkan navbar (untuk admin)
    public function edit()
    {
        $navbar = Navbar::first();
        return view('admin.navbar.edit', compact('navbar'));
    }

    // Update navbar
    public function update(Request $request)
    {
        $validated = $request->validate([
            'logo'         => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
            'menus'        => 'required|array',
            'menus.*.title' => 'required|string|max:50',
            'menus.*.link' => 'required|string|max:255',
            'button_label' => 'nullable|string|max:50',
            'button_link'  => 'nullable|string|max:255',
        ]);

        $navbar = Navbar::first();

        // Upload logo jika ada
        // if ($request->hasFile('logo')) {
        //     $path = $request->file('logo')->store('logos', 'public');
        //     $validated['logo'] = $path;
        // }

        if ($request->hasFile('logo')) {
            // Hapus logo lama kalau ada
            if ($navbar && $navbar->logo && file_exists(public_path('navbar/' . $navbar->logo))) {
                unlink(public_path('navbar/' . $navbar->logo));
            }

            // Upload baru
            $file = $request->file('logo');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('navbar'), $filename);
            $validated['logo'] = $filename;
        }



        if (!$navbar) {
            Navbar::create($validated);
        } else {
            $navbar->update($validated);
        }

        return redirect()->back()->with('success', 'Navbar berhasil diupdate!');
    }
}
