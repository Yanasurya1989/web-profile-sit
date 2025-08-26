<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'subtitle',
        'title',
        'short_desc',
        'long_desc',
        'media_type',
        'media_path',
        'status',
    ];
}
