<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('navbars', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable(); // path/logo URL
            $table->json('menus')->nullable();  // array menu: [{"title":"Beranda","link":"#hero-carousel"}, ...]
            $table->string('button_label')->nullable(); // tombol daftar
            $table->string('button_link')->nullable();  // link tombol daftar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('navbars');
    }
};
