<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        News::create([
            'title' => 'Kebersamaan dalam Balutan Persaudaraan untuk Meraih Ketaqwaan',
            'content' => 'Dalam rangka mempererat kembali tali silaturahim...',
            'image' => 'assets/images/news/berita_satu.jpeg',
            'published_at' => '2024-03-28',
        ]);

        News::create([
            'title' => 'QORDOVA FAIR 2024 “The Magic of Creativity”',
            'content' => 'Prestasi membanggakan kembali diraih siswa Qordova...',
            'image' => 'assets/images/news/berita_dua.png',
            'published_at' => '2025-08-15',
        ]);

        News::create([
            'title' => 'NATIVE SPEAKER ARABIC "Dialog bersama penutur asli Bahasa Arab"',
            'content' => 'SIT Qordova memprogramkan pembelajaran Bahasa Arab...',
            'image' => 'assets/images/news/berita_tiga.jpg',
            'published_at' => '2025-08-10',
        ]);
    }
}
