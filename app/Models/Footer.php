<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'logo',
        'school_name',
        'address',
        'phone',
        'email',
        'navigation',
        'map_embed',
        'is_active'
    ];

    protected $casts = [
        'navigation' => 'array',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
