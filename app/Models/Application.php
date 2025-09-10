<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'vacancy_id',
        'nama_pelamar',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'nomor_wa',
        'jurusan',
        'sekolah_universitas',
        'nilai_ipk',
        'jumlah_lembar_tilawah',
        'hafalan_bersanad',
        'riwayat_penyakit',
        'surat_lamaran',
        'cv',
        'transkrip_nilai',
        'foto',
    ];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}
