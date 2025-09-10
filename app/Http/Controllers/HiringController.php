<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HiringController extends Controller
{
    public function hiring()
    {
        // menampilkan halaman utama hiring
        return view('hiring.hiring');
    }

    public function notifyPage()
    {
        // menampilkan halaman form notifikasi
        return view('hiring.notify');
    }

    public function notify(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        // contoh simpan ke tabel career_notifications
        // DB::table('career_notifications')->insert([
        //     'email' => $request->email,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        return back()->with('status', 'Terima kasih! Kami akan mengabari saat ada lowongan.');
    }
}
