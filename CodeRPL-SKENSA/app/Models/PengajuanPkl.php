<?php

// app/Models/PengajuanPkl.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanPkl extends Model
{
    protected $fillable = [
        'user_id',
        'industri_id',
        'surat_pengantar',
        'cv',
        'transkrip_nilai',
        'motivasi',
        'status',
        'catatan_admin',
        'tanggal_pengajuan',
        'tanggal_verifikasi',
        'tanggal_dibatalkan',
    ];

    protected $casts = [
        'tanggal_pengajuan' => 'date',
        'tanggal_verifikasi' => 'date',
        'tanggal_dibatalkan' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function industri(): BelongsTo
    {
        return $this->belongsTo(Industri::class);
    }
}
