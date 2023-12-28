<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_usaha',
        'alamat_usaha',
        'pemilik_usaha',
        'logo',
        'umk',
        'ttd',
        'status',
        'keterangan',
        'user_id'
    ];
}
