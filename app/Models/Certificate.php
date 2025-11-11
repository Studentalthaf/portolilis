<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'judul',
        'tanggal_perolehan',
        'penerbit',
        'bukti_sertifikat',
        'certificate_id',
    ];

    protected $casts = [
        'tanggal_perolehan' => 'date',
    ];
}
