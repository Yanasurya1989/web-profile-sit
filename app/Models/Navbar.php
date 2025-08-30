<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    protected $fillable = ['logo', 'menus', 'button_label', 'button_link'];

    protected $casts = [
        'menus' => 'array',
    ];
}
