<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::latest()->paginate(10);
        return view('admin.alumni.index', compact('alumnis'));
    }

    public function create()
    {
        return view('admin.alumni.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'graduation_year' => 'nullable|digits:4',
            'photo' => 'nullable|image|max:2048',
            'quote' => 'required|string',
        ]);

        if ($request->hasFile('photo')) {
            $filename = time() . '-' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('alumni'), $filename);
            $data['photo'] = 'alumni/' . $filename;
        }

        Alumni::create($data);
        return redirect()->route('admin.alumni.index')->with('success', 'Quote alumni berhasil ditambahkan!');
    }

    public function edit(Alumni $alumni)
    {
        return view('admin.alumni.edit', compact('alumni'));
    }

    public function update(Request $request, Alumni $alumni)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'graduation_year' => 'nullable|digits:4',
            'photo' => 'nullable|image|max:2048',
            'quote' => 'required|string',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('alumni', 'public');
        }

        $alumni->update($data);
        return redirect()->route('admin.alumni.index')->with('success', 'Quote alumni berhasil diperbarui!');
    }

    public function destroy(Alumni $alumni)
    {
        $alumni->delete();
        return redirect()->route('admin.alumni.index')->with('success', 'Quote alumni berhasil dihapus!');
    }
}
