<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('abouts')->insert([
            [
                'subtitle'   => 'Profil',
                'title'      => 'SIT Qordova',
                'short_desc' => 'Pendirian SMPIT Qordova (2006)',
                'long_desc'  => 'Langkah pertama yang diambil Yayasan Amal Insan Rabbani dalam dunia pendidikan adalah mendirikan Sekolah Menengah Pertama Islam Terpadu (SMPIT) Qordova pada tahun 2006. Sekolah ini didirikan dengan tujuan untuk menyediakan pendidikan berbasis nilai-nilai Islami yang berkualitas, sehingga dapat membentuk siswa yang cerdas, berakhlak, dan berdaya saing.',
                'media_type' => 'video',
                'media_path' => 'assets/videos/video-sit.mp4',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'subtitle'   => 'Yayasan',
                'title'      => 'Amal Insan Rabbany',
                'short_desc' => 'Perkembangan SIT Qordova',
                'long_desc'  => 'Setelah berdirinya SMPIT Qordova, Yayasan terus melanjutkan kiprahnya dalam pendidikan dengan mendirikan SDIT pada tahun 2007 dan SMAIT pada tahun 2018. Kehadiran sekolah-sekolah ini semakin memperkokoh peran SIT Qordova dalam memberikan pendidikan berkualitas yang Islami, modern, dan membekali siswa dengan kecakapan hidup yang bermanfaat.',
                'media_type' => 'image',
                'media_path' => 'assets/images/pengurus/about_us.png',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
