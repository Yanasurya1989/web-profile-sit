<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hero;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        Hero::truncate(); // kosongkan dulu biar ga dobel

        Hero::create([
            'title' => "Sekolah Tahfidz Al-Qur'an",
            'description' => "Menjadi generasi penghafal Al-Qur’an yang berakhlak mulia.",
            'image' => 'assets/images/hero/sd.jpg',
            'status' => 1,
            'btn_primary_text' => "Lihat Program",
            'btn_primary_link' => "#programs",
            'btn_secondary_text' => "Daftar Sekarang",
            'btn_secondary_link' => "https://wa.me/6289601353957",
        ]);

        Hero::create([
            'title' => "Pendidikan Karakter",
            'description' => "Membentuk pribadi berakhlak, disiplin, dan bertanggung jawab melalui pembiasaan positif.",
            'image' => 'assets/images/hero/inggris.jpg',
            'status' => 1,
            'btn_primary_text' => "Tentang Kami",
            'btn_primary_link' => "#about",
            'btn_secondary_text' => "Daftar Sekarang",
            'btn_secondary_link' => "https://wa.me/6289601353957",
        ]);

        Hero::create([
            'title' => "Sekolah Bilingual",
            'description' => "Menguasai dua bahasa (Indonesia & Inggris) untuk menghadapi dunia global dengan percaya diri.",
            'image' => 'assets/images/hero/p.karakter.jpg',
            'status' => 1,
            'btn_primary_text' => "Hubungi Kami",
            'btn_primary_link' => "#contact",
            'btn_secondary_text' => "Daftar Sekarang",
            'btn_secondary_link' => "https://wa.me/6289601353957",
        ]);
    }
}
