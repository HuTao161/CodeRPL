<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'foto',
        'tahun_lulus',
        'tempat_pkl',
        'industri_bekerja',
        'posisi',
        'testimoni'
    ];

    protected $casts = [
        'tahun_lulus' => 'integer',
    ];
}