<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('detil_jenjang', function (Blueprint $table) {
            $table->dropColumn(['judul', 'deskripsi']);
        });
    }

    public function down()
    {
        Schema::table('detil_jenjang', function (Blueprint $table) {
            $table->string('judul')->nullable();
            $table->text('deskripsi')->nullable();
        });
    }
};
