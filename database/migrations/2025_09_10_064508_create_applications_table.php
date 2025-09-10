<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vacancy_id')->constrained()->onDelete('cascade');
            $table->string('nama_pelamar');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('nomor_wa');
            $table->string('jurusan')->nullable();
            $table->string('sekolah_universitas');
            $table->string('nilai_ipk')->nullable();
            $table->integer('jumlah_lembar_tilawah')->nullable();
            $table->boolean('hafalan_bersanad')->default(false);
            $table->text('riwayat_penyakit')->nullable();
            $table->string('surat_lamaran')->nullable();
            $table->string('cv')->nullable();
            $table->string('transkrip_nilai')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
