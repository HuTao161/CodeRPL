<?php

namespace Database\Seeders;

use App\Models\Alumni;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AlumniSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama (opsional)
        DB::table('alumnis')->truncate();
        
        $data = [];
        
        // Data contoh 20 alumni
        for ($i = 1; $i <= 20; $i++) {
            $tahun_lulus = rand(2020, 2024);
            
            $data[] = [
                'nama' => $this->generateNamaBali($i),
                'nis' => '2020' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'email' => 'alumni' . $i . '@example.com',
                'kontak' => '08123456' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'foto' => 'https://i.pravatar.cc/300?img=' . $i,
                'tahun_lulus' => $tahun_lulus,
                'angkatan' => (string)($tahun_lulus - 3),
                'tanggal_lahir' => '200' . rand(0, 5) . '-' . rand(1, 12) . '-' . rand(1, 28),
                'tempat_kerja' => $this->getRandomCompany(),
                'jabatan' => $this->getRandomPosition(),
                'bidang_kerja' => 'IT & Technology',
                'tahun_mulai_kerja' => $tahun_lulus,
                'status_kerja' => 'Bekerja',
                'deskripsi_kerja' => 'Bekerja sebagai ' . $this->getRandomPosition() . ' di perusahaan teknologi.',
                'tempat_pkl' => $this->getRandomCompany(),
                'durasi_pkl' => '6 bulan',
                'bidang_pkl' => 'Software Development',
                'skills' => 'PHP, Laravel, JavaScript, MySQL, HTML, CSS',
                'linkedin' => 'https://linkedin.com/in/alumni' . $i,
                'testimoni' => 'SMKN 1 Denpasar memberikan dasar yang kuat untuk karir saya di bidang IT.',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        // Insert ke database
        DB::table('alumnis')->insert($data);
        
        $this->command->info('✅ ' . count($data) . ' data alumni berhasil dibuat!');
    }
    
    private function generateNamaBali($index)
    {
        $firstNames = ['I Gede', 'I Made', 'Ni Putu', 'Ni Luh', 'I Ketut', 'I Wayan'];
        $middleNames = ['Agus', 'Putu', 'Komang', 'Nyoman', 'Rai', 'Adi'];
        $lastNames = ['Wira', 'Surya', 'Darma', 'Wibawa', 'Manik', 'Arta'];
        
        return $firstNames[$index % 6] . ' ' . 
               $middleNames[$index % 6] . ' ' . 
               $lastNames[$index % 6];
    }
    
    private function getRandomCompany()
    {
        $companies = [
            'Gojek Indonesia', 'Tokopedia', 'Traveloka', 'Bukalapak',
            'Shopee Indonesia', 'Blibli.com', 'DANA Indonesia',
            'Wardhana Guna Sejahtera', 'Mekari', 'Jurnal.id',
            'Bhinneka.com', 'Tiket.com', 'Ruangguru', 'Zenius'
        ];
        
        return $companies[array_rand($companies)];
    }
    
    private function getRandomPosition()
    {
        $positions = [
            'Software Engineer', 'Frontend Developer', 'Backend Developer',
            'Fullstack Developer', 'Mobile Developer', 'UI/UX Designer',
            'DevOps Engineer', 'Data Analyst', 'Quality Assurance',
            'System Administrator', 'IT Support'
        ];
        
        return $positions[array_rand($positions)];
    }
}