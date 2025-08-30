<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetilJenjang extends Model
{
    use HasFactory;

    protected $table = 'detil_jenjang';

    protected $fillable = [
        'level',
        'gambar',
        'status',
        'link_pendaftaran',
    ];
}
