<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Footer;

class FooterSeeder extends Seeder
{
    public function run(): void
    {
        Footer::create([
            'logo' => null, // bisa nanti upload manual
            'school_name' => 'SIT Qordova',
            'address' => "Jl. Rancaekek-Majalaya. 378a, Rancaekek,\nJl. Raya Majalaya - Rancaekek No.378-A, Rancaekek Wetan,\nKec. Rancaekek, Kabupaten Bandung,\nJawa Barat 40394",
            'phone' => '(021) 123-4567',
            'email' => 'info@qordova.sch.id',
            'navigation' => json_encode([
                'Beranda',
                'Program',
                'Tentang Kami',
                'Pengajar',
                'Kontak',
            ]),
            'map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!..."></iframe>',
            'is_active' => true, // default aktif
        ]);
    }
}
