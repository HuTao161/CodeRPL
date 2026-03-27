<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Industri;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create Admin User - menggunakan firstOrCreate agar tidak duplikat
        User::firstOrCreate(
            ['email' => 'admin@coderpl.sch.id'],
            [
                'name' => 'Admin CodeRPL',
                'password' => Hash::make('admin123'),
                'role' => 'admin'
            ]
        );

        // Create Sample Student User
        User::firstOrCreate(
            ['email' => 'budi@email.com'],
            [
                'name' => 'Budi Santoso',
                'password' => Hash::make('password123'),
                'role' => 'siswa'
            ]
        );

        // Data Industri - menggunakan firstOrCreate berdasarkan nama_industri
        $industris = [
            [
                'nama_industri' => 'PT. Teknologi Indonesia',
                'bidang' => 'Software House',
                'alamat' => 'Jl. Raya Puputan No. 123, Denpasar',
                'kontak' => '(0361) 123456',
                'kuota_pkl' => 10,
                'kuota_terisi' => 8,
                'deskripsi' => 'Perusahaan pengembangan software terkemuka di Bali.',
                'status' => 'tersedia'
            ],
            [
                'nama_industri' => 'Bali Digital Studio',
                'bidang' => 'Multimedia',
                'alamat' => 'Jl. Teuku Umar No. 45, Denpasar',
                'kontak' => 'bali@digitalstudio.com',
                'kuota_pkl' => 8,
                'kuota_terisi' => 8,
                'deskripsi' => 'Studio kreatif khusus multimedia dan animasi.',
                'status' => 'penuh'
            ],
            [
                'nama_industri' => 'Startup Bali Tech',
                'bidang' => 'Startup',
                'alamat' => 'Jl. Hayam Wuruk No. 67, Denpasar',
                'kontak' => 'info@balitech.com',
                'kuota_pkl' => 6,
                'kuota_terisi' => 4,
                'deskripsi' => 'Startup teknologi fokus pada solusi digital untuk pariwisata.',
                'status' => 'tersedia'
            ],
            [
                'nama_industri' => 'PT. Solusi Digital',
                'bidang' => 'IT',
                'alamat' => 'Jl. Gatot Subroto No. 89, Denpasar',
                'kontak' => '(0361) 987654',
                'kuota_pkl' => 12,
                'kuota_terisi' => 10,
                'deskripsi' => 'Provider solusi IT dan jaringan untuk perusahaan.',
                'status' => 'tersedia'
            ],
            [
                'nama_industri' => 'Multimedia Bali',
                'bidang' => 'Multimedia',
                'alamat' => 'Jl. Sudirman No. 101, Denpasar',
                'kontak' => 'contact@multimediabali.com',
                'kuota_pkl' => 5,
                'kuota_terisi' => 3,
                'deskripsi' => 'Spesialis produksi konten multimedia dan video.',
                'status' => 'tersedia'
            ]
        ];

        foreach ($industris as $industri) {
            // Gunakan firstOrCreate untuk menghindari duplikasi data industri
            // Asumsi nama_industri adalah unik (bisa ditambahkan constraint unique di migrasi)
            Industri::firstOrCreate(
                ['nama_industri' => $industri['nama_industri']],
                $industri
            );
        }
    }
}