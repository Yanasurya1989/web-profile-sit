<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vacancy;

class VacancySeeder extends Seeder
{
    public function run(): void
    {
        Vacancy::create([
            'title' => "Software Engineer",
            'description' => "Bertanggung jawab mengembangkan aplikasi berbasis Laravel & React, termasuk perancangan, pengujian, dan deployment.",
            'status' => 'open',
            'icon' => 'bi-laptop', // 💻
        ]);

        Vacancy::create([
            'title' => "UI/UX Designer",
            'description' => "Membuat desain aplikasi yang user-friendly, responsif, serta mampu menerjemahkan kebutuhan user ke dalam wireframe dan prototype.",
            'status' => 'closed',
            'icon' => 'bi-palette', // 🎨
        ]);

        Vacancy::create([
            'title' => "Guru Qur'an",
            'description' => "Mengajar Al-Qur’an dengan tartil, tahsin, tahfidz, serta membimbing pembinaan akhlak siswa secara berkesinambungan.",
            'status' => 'open',
            'icon' => 'bi-mortarboard-fill', // 🎓
        ]);
    }
}
