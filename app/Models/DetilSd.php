<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetilSd extends Model
{
    use HasFactory;

    protected $table = 'detil_sd';

    protected $fillable = [
        'gambar',
    ];
}
