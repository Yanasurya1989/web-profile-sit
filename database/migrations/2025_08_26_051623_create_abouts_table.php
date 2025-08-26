<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle'); // Profil, Yayasan, dsb
            $table->string('title');    // SIT Qordova, Amal Insan Rabbany, dst
            $table->text('short_desc'); // yang tampil di section about (singkat)
            $table->longText('long_desc')->nullable(); // buat modal Selengkapnya
            $table->string('media_type')->default('image'); // video / image
            $table->string('media_path'); // path file video / image
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
