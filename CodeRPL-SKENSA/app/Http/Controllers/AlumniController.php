<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $alumniData = [
            [
                'nama' => 'Wayan Sutawan',
                'tahun_lulus' => 2023,
                'foto' => 'https://randomuser.me/api/portraits/men/32.jpg',
                'tempat_pkl' => 'PT. Tech Innovasi Bali',
                'durasi_pkl' => '6 Bulan',
                'posisi_pkl' => 'Web Developer Intern',
                'pencapaian' => 'Membangun sistem informasi sekolah versi 2.0',
                'angkatan' => 2020
            ],
            [
                'nama' => 'Putu Ayu Sri',
                'tahun_lulus' => 2022,
                'foto' => 'https://randomuser.me/api/portraits/women/44.jpg',
                'tempat_pkl' => 'Bali Digital Valley',
                'durasi_pkl' => '5 Bulan',
                'posisi_pkl' => 'UI/UX Designer',
                'pencapaian' => 'Juara 1 Lomba UI/UX Tingkat Provinsi',
                'angkatan' => 2019
            ],
            [
                'nama' => 'Gede Ardana',
                'tahun_lulus' => 2023,
                'foto' => 'https://randomuser.me/api/portraits/men/65.jpg',
                'tempat_pkl' => 'Bank BRI Cabang Denpasar',
                'durasi_pkl' => '6 Bulan',
                'posisi_pkl' => 'IT Support & Database Admin',
                'pencapaian' => 'Mengembangkan sistem inventaris digital',
                'angkatan' => 2020
            ],
            [
                'nama' => 'Ni Made Sari',
                'tahun_lulus' => 2021,
                'foto' => 'https://randomuser.me/api/portraits/women/68.jpg',
                'tempat_pkl' => 'PT. Software House Indonesia',
                'durasi_pkl' => '4 Bulan',
                'posisi_pkl' => 'Frontend Developer',
                'pencapaian' => 'Membuat aplikasi e-commerce lokal',
                'angkatan' => 2018
            ],
            [
                'nama' => 'Ketut Wijaya',
                'tahun_lulus' => 2020,
                'foto' => 'https://randomuser.me/api/portraits/men/76.jpg',
                'tempat_pkl' => 'Startup Bali Tech',
                'durasi_pkl' => '3 Bulan',
                'posisi_pkl' => 'Mobile App Developer',
                'pencapaian' => 'App launch dengan 10k+ download',
                'angkatan' => 2017
            ],
            [
                'nama' => 'Komang Devi',
                'tahun_lulus' => 2022,
                'foto' => 'https://randomuser.me/api/portraits/women/32.jpg',
                'tempat_pkl' => 'PT. Data Analytics Bali',
                'durasi_pkl' => '6 Bulan',
                'posisi_pkl' => 'Data Analyst Intern',
                'pencapaian' => 'Analisis data meningkatkan efisiensi 30%',
                'angkatan' => 2019
            ]
        ];

        return view('alumni.index', compact('alumniData'));
    }
}
