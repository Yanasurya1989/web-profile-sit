<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detil_sd', function (Blueprint $table) {
            $table->id();
            $table->string('judul');       // contoh: "Tentang Kami"
            $table->text('deskripsi');     // isi konten
            $table->string('gambar')->nullable(); // gambar pendukung (opsional)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detil_sd');
    }
};
