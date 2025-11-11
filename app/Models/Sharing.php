<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sharing extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
        'kategori',
    ];
}
