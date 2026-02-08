<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Alumni;
use App\Models\Industri;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display dashboard for admin users
     */
    public function adminDashboard()
    {
        // Cek jika user bukan admin
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke dashboard admin.');
        }

        // Statistik untuk admin
        $totalAlumni = Alumni::count();
        $totalIndustri = Industri::count();
        $totalSiswa = User::where('role', 'siswa')->count();
        $industriTersedia = Industri::where('status', 'tersedia')->count();
        $industriPenuh = Industri::where('status', 'penuh')->count();

        // Data untuk chart alumni per tahun - SESUAI STRUKTUR DATABASE
        $alumniPerTahun = Alumni::selectRaw('YEAR(tahun_lulus) as tahun, COUNT(*) as jumlah')
            ->groupBy('tahun_lulus') // Gunakan nama kolom yang benar
            ->orderBy('tahun_lulus', 'desc')
            ->limit(5)
            ->get();

        // Data untuk chart industri per bidang
        $industriPerBidang = Industri::selectRaw('bidang, COUNT(*) as jumlah')
            ->groupBy('bidang')
            ->get();

        // Alumni terbaru
        $alumniTerbaru = Alumni::latest()->limit(5)->get();

        return view('admin.dashboard', compact(
            'totalAlumni',
            'totalIndustri',
            'totalSiswa',
            'industriTersedia',
            'industriPenuh',
            'alumniPerTahun',
            'industriPerBidang',
            'alumniTerbaru'
        ));
    }

    /**
     * Display dashboard for siswa users
     */
    public function siswaDashboard()
    {
        // Cek jika user bukan siswa
        if (Auth::user()->role !== 'siswa') {
            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke dashboard siswa.');
        }

        $user = Auth::user();
        
        // Data industri tersedia untuk siswa
        $industriTersedia = Industri::where('status', 'tersedia')
            ->orderBy('nama_industri')
            ->limit(5)
            ->get();

        // Alumni sukses untuk inspirasi
        $alumniSukses = Alumni::inRandomOrder()
            ->limit(3)
            ->get();

        // Kuota tersedia total
        $totalKuotaTersedia = Industri::sum('kuota_pkl') - Industri::sum('kuota_terisi');

        return view('siswa.dashboard', compact(
            'user',
            'industriTersedia',
            'alumniSukses',
            'totalKuotaTersedia'
        ));
    }

    /**
     * Display pengajuan PKL page for siswa
     */
    public function pengajuanPkl()
    {
        if (Auth::user()->role !== 'siswa') {
            return redirect()->route('home')->with('error', 'Akses ditolak.');
        }

        $user = Auth::user();

        // Daftar industri tersedia
        $industriTersedia = Industri::where('status', 'tersedia')
            ->orderBy('nama_industri')
            ->get();

        return view('siswa.pengajuan.index', compact(
            'user',
            'industriTersedia'
        ));
    }

    /**
     * Store pengajuan PKL
     */
    public function storePengajuanPkl(Request $request)
    {
        if (Auth::user()->role !== 'siswa') {
            return redirect()->route('home')->with('error', 'Akses ditolak.');
        }

        // Validasi
        $request->validate([
            'industri_id' => 'required|exists:industris,id',
            'surat_pengantar' => 'required|file|mimes:pdf|max:2048',
            'cv' => 'required|file|mimes:pdf|max:2048',
            'transkrip_nilai' => 'nullable|file|mimes:pdf|max:2048',
            'motivasi' => 'required|string|min:50|max:1000',
        ]);

        // Proses upload file
        $suratPengantarPath = $request->file('surat_pengantar')->store('pengajuan/surat-pengantar', 'public');
        $cvPath = $request->file('cv')->store('pengajuan/cv', 'public');
        
        $transkripPath = null;
        if ($request->hasFile('transkrip_nilai')) {
            $transkripPath = $request->file('transkrip_nilai')->store('pengajuan/transkrip', 'public');
        }

        // Catatan: Anda perlu membuat tabel untuk pengajuan PKL terlebih dahulu
        // Untuk saat ini, kita bisa simpan data ke session atau tampilkan pesan
        // Simpan data sementara ke session
        $pengajuanData = [
            'industri_id' => $request->industri_id,
            'surat_pengantar' => $suratPengantarPath,
            'cv' => $cvPath,
            'transkrip_nilai' => $transkripPath,
            'motivasi' => $request->motivasi,
            'tanggal_pengajuan' => now()->format('Y-m-d H:i:s'),
        ];

        session()->flash('pengajuan_success', true);
        session()->flash('pengajuan_data', $pengajuanData);

        return redirect()->route('siswa.pengajuan.index')
            ->with('success', 'Pengajuan PKL berhasil dikirim. Tunggu konfirmasi dari admin.');
    }

    /**
     * Display profile page for all users
     */
    public function showProfile()
    {
        $user = Auth::user();
        
        // Hitung statistik berdasarkan role
        $statistics = [];
        
        if ($user->role === 'admin') {
            $statistics = [
                'total_alumni' => Alumni::count(),
                'total_industri' => Industri::count(),
                'total_siswa' => User::where('role', 'siswa')->count(),
            ];
        }

        return view('profile.show', compact('user', 'statistics'));
    }

    /**
     * Edit profile page
     */
    public function editProfile()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update profile - HANYA UPDATE NAME DAN EMAIL (sesuai struktur database)
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        // Update user - hanya name dan email karena database tidak memiliki phone dan address
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile.show')
            ->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah.']);
        }

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password berhasil diperbarui.');
    }

    /**
     * Get dashboard statistics (API endpoint)
     */
    public function getStatistics(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $statistics = [];

        if ($user->role === 'admin') {
            $statistics = [
                'totalAlumni' => Alumni::count(),
                'totalIndustri' => Industri::count(),
                'industriTersedia' => Industri::where('status', 'tersedia')->count(),
                'industriPenuh' => Industri::where('status', 'penuh')->count(),
                'totalSiswa' => User::where('role', 'siswa')->count(),
            ];
        } elseif ($user->role === 'siswa') {
            $statistics = [
                'totalIndustriTersedia' => Industri::where('status', 'tersedia')->count(),
                'totalKuotaTersedia' => Industri::sum('kuota_pkl') - Industri::sum('kuota_terisi'),
            ];
        }

        return response()->json($statistics);
    }
}