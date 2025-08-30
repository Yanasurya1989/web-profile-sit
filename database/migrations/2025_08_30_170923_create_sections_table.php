<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nama section, misal Hero, About, Footer, dll
            $table->string('key')->unique(); // key unik, misal hero_section, about_section
            $table->integer('order')->default(0); // urutan tampil
            $table->boolean('is_active')->default(true); // aktif/nonaktif
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
