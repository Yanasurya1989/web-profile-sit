<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::latest()->get(); // ambil semua data, urutkan terbaru
        return view('admin.register.index', compact('registrations'));
    }

    public function store(Request $request)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'parent_name' => 'required|string|max:255',
            'wa_number'   => 'required|string|max:20',
            'child_name'  => 'required|string|max:255',
            'level'       => 'required|in:SD,SMP,SMA',
        ]);

        // 2. Simpan ke database
        $registration = Registration::create($validated);

        // 3. Redirect ke halaman detail jenjang
        return redirect()->route('register.detail', [
            'level' => strtolower($registration->level)
        ])->with('success', 'Data pendaftaran berhasil disimpan!');
    }

    public function detail($level)
    {
        $level = strtolower($level);

        if (!in_array($level, ['sd', 'smp', 'sma'])) {
            return redirect()->route('home')->with('error', 'Jenjang tidak ditemukan');
        }

        $detils = \App\Models\DetilJenjang::where('level', strtoupper($level))
            ->where('status', 1) // gunakan 1 (boolean) bukan 'active'
            ->get();

        return view('jenjang.' . $level, compact('detils'));
    }
}
