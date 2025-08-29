<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_name' => 'required|string|max:255',
            'wa_number'   => 'required|string|max:20',
            'child_name'  => 'required|string|max:255',
            'level'       => 'required|in:SD,SMP,SMA',
        ]);

        // simpan data
        $registration = Registration::create($validated);

        // redirect ke halaman sesuai jenjang
        if ($registration->level == 'SD') {
            return redirect()->route('jenjang.sd')->with('success', 'Pendaftaran berhasil untuk SD!');
        } elseif ($registration->level == 'SMP') {
            return redirect()->route('jenjang.smp')->with('success', 'Pendaftaran berhasil untuk SMP!');
        } elseif ($registration->level == 'SMA') {
            return redirect()->route('jenjang.sma')->with('success', 'Pendaftaran berhasil untuk SMA!');
        }

        return back()->with('error', 'Jenjang tidak valid.');
    }


    public function detail($level)
    {
        // Ambil semua pendaftar sesuai jenjang
        $registrations = Registration::where('level', $level)->get();

        return view('frontend.register.detail', compact('registrations', 'level'));
    }
}
