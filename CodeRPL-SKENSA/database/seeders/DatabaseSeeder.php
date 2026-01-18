<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Alumni;
use App\Models\Industri;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create Admin User
        User::create([
            'name' => 'Admin CodeRPL',
            'email' => 'admin@coderpl.sch.id',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        // Create Sample Student User
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@email.com',
            'password' => Hash::make('password123'),
            'role' => 'siswa'
        ]);

        // Create Alumni Data
        $alumnis = [
            [
                'nama' => 'Ari Wibawa',
                'tahun_lulus' => 2023,
                'tempat_pkl' => 'PT. Teknologi Indonesia',
                'industri_bekerja' => 'Google Indonesia',
                'posisi' => 'Software Engineer',
                'testimoni' => 'SMKN 1 Denpasar memberikan dasar yang kuat untuk karir di bidang IT.'
            ],
            [
                'nama' => 'Sari Dewi',
                'tahun_lulus' => 2022,
                'tempat_pkl' => 'Startup Bali Tech',
                'industri_bekerja' => 'Tokopedia',
                'posisi' => 'Frontend Developer',
                'testimoni' => 'Pengalaman PKL sangat membantu dalam memahami dunia kerja.'
            ],
            [
                'nama' => 'Putu Adi',
                'tahun_lulus' => 2021,
                'tempat_pkl' => 'Bali Digital Studio',
                'industri_bekerja' => 'Traveloka',
                'posisi' => 'Backend Developer',
                'testimoni' => 'Jurusan RPL memberikan skill yang dibutuhkan industri.'
            ],
            [
                'nama' => 'Made Wijaya',
                'tahun_lulus' => 2020,
                'tempat_pkl' => 'PT. Solusi Digital',
                'industri_bekerja' => 'Bukalapak',
                'posisi' => 'Full Stack Developer',
                'testimoni' => 'Dasar-dasar pemrograman dari sekolah sangat bermanfaat.'
            ],
            [
                'nama' => 'Ketut Surya',
                'tahun_lulus' => 2019,
                'tempat_pkl' => 'Multimedia Bali',
                'industri_bekerja' => 'Shopee',
                'posisi' => 'Mobile Developer',
                'testimoni' => 'Terima kasih kepada guru-guru RPL yang telah membimbing.'
            ]
        ];

        foreach ($alumnis as $alumni) {
            Alumni::create($alumni);
        }

        // Create Industri Data
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
            Industri::create($industri);
        }
    }
}