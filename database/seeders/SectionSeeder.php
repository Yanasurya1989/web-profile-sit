<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            ['name' => 'Hero', 'key' => 'hero', 'order' => 0, 'is_active' => true],
            ['name' => 'Card', 'key' => 'card', 'order' => 1, 'is_active' => true],
            ['name' => 'About', 'key' => 'about', 'order' => 2, 'is_active' => true],
            ['name' => 'Muwashofat', 'key' => 'muwashofat', 'order' => 3, 'is_active' => true],
            ['name' => 'News', 'key' => 'news', 'order' => 4, 'is_active' => true],
            ['name' => 'Register', 'key' => 'register', 'order' => 5, 'is_active' => true],
            ['name' => 'Footer', 'key' => 'footer', 'order' => 6, 'is_active' => true],
        ];

        foreach ($sections as $section) {
            Section::updateOrCreate(
                ['key' => $section['key']],
                $section
            );
        }
    }
}
