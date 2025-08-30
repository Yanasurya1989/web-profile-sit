<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('detil_jenjang', function (Blueprint $table) {
            $table->id();
            $table->enum('level', ['SD', 'SMP', 'SMA']); // jenjang
            $table->string('judul');                     // judul detil
            $table->text('deskripsi')->nullable();       // deskripsi opsional
            $table->string('gambar')->nullable();        // path gambar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detil_jenjang');
    }
};
