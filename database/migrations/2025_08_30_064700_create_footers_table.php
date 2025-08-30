<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();           // path logo
            $table->string('school_name');                // nama SIT Qordova
            $table->text('address');                      // alamat lengkap
            $table->string('phone')->nullable();          // nomor telp
            $table->string('email')->nullable();          // email
            $table->json('navigation')->nullable();       // menu navigasi (disimpan JSON)
            $table->text('map_embed')->nullable();        // iframe Google Maps
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
