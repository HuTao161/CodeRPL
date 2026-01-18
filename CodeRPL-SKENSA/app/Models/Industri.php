<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industri extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_industri',
        'logo',
        'bidang',
        'alamat',
        'kontak',
        'kuota_pkl',
        'kuota_terisi',
        'deskripsi',
        'status'
    ];

    public function getKuotaTersisaAttribute()
    {
        return $this->kuota_pkl - $this->kuota_terisi;
    }

    public function updateStatus()
    {
        $this->status = ($this->kuota_terisi >= $this->kuota_pkl) ? 'penuh' : 'tersedia';
        $this->save();
    }
}