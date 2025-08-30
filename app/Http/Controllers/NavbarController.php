<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Navbar;

class NavbarController extends Controller
{
    // Tampilkan navbar (untuk admin)
    public function edit()
    {
        $navbar = Navbar::first(); // kita simpan hanya 1 row
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
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = $path;
        }

        if (!$navbar) {
            Navbar::create($validated);
        } else {
            $navbar->update($validated);
        }

        return redirect()->back()->with('success', 'Navbar berhasil diupdate!');
    }
}
