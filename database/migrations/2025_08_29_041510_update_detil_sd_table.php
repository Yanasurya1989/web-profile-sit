<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('detil_sd', function (Blueprint $table) {
            $table->dropColumn(['judul', 'deskripsi']);
        });
    }

    public function down(): void
    {
        Schema::table('detil_sd', function (Blueprint $table) {
            $table->string('judul')->after('id');
            $table->text('deskripsi')->after('judul');
        });
    }
};
