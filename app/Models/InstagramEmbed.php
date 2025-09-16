<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstagramEmbed extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'embed_code',
        'is_active',
    ];
}
