<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumnis';

    protected $fillable = [
        'nama',
        'nis',
        'email',
        'kontak',
        'foto',
        'tanggal_lahir',
        'tahun_lulus',
        'angkatan',

        'tempat_kerja',
        'jabatan',
        'deskripsi_kerja',
        'bidang_kerja',
        'tahun_mulai_kerja',
        'status_kerja',

        'tempat_pkl',
        'bidang_pkl',
        'durasi_pkl',

        'skills',
        'testimoni',
        'linkedin',
    ];

    protected $casts = [
        'tanggal_lahir'      => 'date',
        'tahun_lulus'        => 'integer',
        'tahun_mulai_kerja'  => 'integer',
    ];

    /* ==========================
     | ACCESSORS
     ========================== */

    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            if (filter_var($this->foto, FILTER_VALIDATE_URL)) {
                return $this->foto;
            }

            if (Storage::disk('public')->exists('alumni/' . $this->foto)) {
                return Storage::url('alumni/' . $this->foto);
            }
        }

        return asset('images/default-avatar.png');
    }

    public function getStatusKerjaWarnaAttribute()
    {
        return match ($this->status_kerja) {
            'Bekerja'     => 'primary',
            'Kuliah'      => 'success',
            'Wirausaha'   => 'warning',
            default       => 'secondary',
        };
    }

    public function getStatusBadgeAttribute()
    {
        return [
            'text'  => $this->status_kerja ?? 'Tidak diketahui',
            'icon'  => match ($this->status_kerja) {
                'Bekerja'   => 'fas fa-briefcase',
                'Kuliah'    => 'fas fa-graduation-cap',
                'Wirausaha' => 'fas fa-store',
                default     => 'fas fa-user',
            },
            'color' => $this->status_kerja_warna,
        ];
    }

    public function getUsiaAttribute()
    {
        return $this->tanggal_lahir?->age;
    }

    public function getPengalamanKerjaAttribute()
    {
        return $this->tahun_mulai_kerja
            ? now()->year - $this->tahun_mulai_kerja
            : null;
    }

    public function getSkillsArrayAttribute()
    {
        return $this->skills
            ? array_map('trim', explode(',', $this->skills))
            : [];
    }

    public function getKontakFormattedAttribute()
    {
        if (!$this->kontak) return null;

        $phone = preg_replace('/[^0-9]/', '', $this->kontak);
        return strlen($phone) >= 10 ? '+62 ' . substr($phone, -10) : $this->kontak;
    }

    public function getTahunDisplayAttribute()
    {
        return collect([
            $this->tahun_lulus ? "Lulus {$this->tahun_lulus}" : null,
            $this->angkatan ? "Angkatan {$this->angkatan}" : null,
        ])->filter()->implode(' | ') ?: 'Tahun tidak diketahui';
    }

    /* ==========================
     | SCOPES (AMAN UNTUK CONTROLLER)
     ========================== */

    public function scopeBekerja($query)
    {
        return $query->where('status_kerja', 'Bekerja')
                     ->whereNotNull('tempat_kerja');
    }

    public function scopeKuliah($query)
    {
        return $query->where('status_kerja', 'Kuliah');
    }

    public function scopeAngkatan($query, $angkatan)
    {
        return $query->where(function ($q) use ($angkatan) {
            $q->where('angkatan', $angkatan)
              ->orWhere('tahun_lulus', $angkatan);
        });
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where(function ($q) use ($keyword) {
            $q->where('nama', 'like', "%{$keyword}%")
              ->orWhere('nis', 'like', "%{$keyword}%")
              ->orWhere('email', 'like', "%{$keyword}%")
              ->orWhere('tempat_kerja', 'like', "%{$keyword}%")
              ->orWhere('jabatan', 'like', "%{$keyword}%")
              ->orWhere('tempat_pkl', 'like', "%{$keyword}%")
              ->orWhere('skills', 'like', "%{$keyword}%")
              ->orWhere('bidang_pkl', 'like', "%{$keyword}%")
              ->orWhere('bidang_kerja', 'like', "%{$keyword}%")
              ->orWhere('angkatan', 'like', "%{$keyword}%");
        });
    }
}
