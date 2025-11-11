<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'judul',
        'durasi',
        'deskripsi',
        'dokumentasi',
        'tech_stack',
        'status',
    ];

    protected $casts = [
        'tech_stack' => 'array',
    ];
}
