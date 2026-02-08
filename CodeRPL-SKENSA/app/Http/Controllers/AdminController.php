<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Industri;
use App\Models\User;
use App\Models\PengajuanPkl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    // ==================== DASHBOARD ====================
    public function dashboard()
    {
        $totalAlumni = Alumni::count();
        $totalIndustri = Industri::count();
        $industriTersedia = Industri::where('status', 'tersedia')->count();
        $totalUsers = User::count();
        $totalPengajuan = PengajuanPkl::count();
        
        // Recent data
        $recentAlumni = Alumni::latest()->take(5)->get();
        $recentIndustri = Industri::latest()->take(5)->get();
        $recentPengajuan = PengajuanPkl::with(['user', 'industri'])->latest()->take(5)->get();
        
        return view('admin.dashboard', compact(
            'totalAlumni', 
            'totalIndustri', 
            'industriTersedia',
            'totalUsers',
            'totalPengajuan',
            'recentAlumni',
            'recentIndustri',
            'recentPengajuan'
        ));
    }

    // ==================== ALUMNI CRUD ====================
    public function alumniIndex()
    {
        $alumnis = Alumni::orderBy('tahun_lulus', 'desc')->get();
        return view('admin.alumni.index', compact('alumnis'));
    }

    public function alumniCreate()
    {
        return view('admin.alumni.create');
    }

    public function alumniStore(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tahun_lulus' => 'required|integer|min:2000|max:' . date('Y'),
            'tempat_pkl' => 'required|string|max:255',
            'industri_bekerja' => 'nullable|string|max:255',
            'posisi' => 'nullable|string|max:255',
            'testimoni' => 'nullable|string',
            'status_pekerjaan' => 'nullable|in:bekerja,kuliah,wirausaha,lainnya',
            'jurusan_kuliah' => 'nullable|string|max:255',
            'universitas' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'telepon' => 'nullable|string|max:20'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('alumni', 'public');
        }

        Alumni::create($validated);
        return redirect()->route('admin.alumni.index')->with('success', 'Alumni berhasil ditambahkan!');
    }

    public function alumniShow($id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('admin.alumni.show', compact('alumni'));
    }

    public function alumniEdit($id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('admin.alumni.edit', compact('alumni'));
    }

    public function alumniUpdate(Request $request, $id)
    {
        $alumni = Alumni::findOrFail($id);
        
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tahun_lulus' => 'required|integer|min:2000|max:' . date('Y'),
            'tempat_pkl' => 'required|string|max:255',
            'industri_bekerja' => 'nullable|string|max:255',
            'posisi' => 'nullable|string|max:255',
            'testimoni' => 'nullable|string',
            'status_pekerjaan' => 'nullable|in:bekerja,kuliah,wirausaha,lainnya',
            'jurusan_kuliah' => 'nullable|string|max:255',
            'universitas' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'telepon' => 'nullable|string|max:20'
        ]);

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($alumni->foto && Storage::disk('public')->exists($alumni->foto)) {
                Storage::disk('public')->delete($alumni->foto);
            }
            $validated['foto'] = $request->file('foto')->store('alumni', 'public');
        } elseif ($request->has('remove_foto')) {
            if ($alumni->foto && Storage::disk('public')->exists($alumni->foto)) {
                Storage::disk('public')->delete($alumni->foto);
            }
            $validated['foto'] = null;
        }

        $alumni->update($validated);
        return redirect()->route('admin.alumni.index')->with('success', 'Alumni berhasil diperbarui!');
    }

    public function alumniDestroy($id)
    {
        $alumni = Alumni::findOrFail($id);
        
        // Delete photo if exists
        if ($alumni->foto && Storage::disk('public')->exists($alumni->foto)) {
            Storage::disk('public')->delete($alumni->foto);
        }
        
        $alumni->delete();
        return redirect()->route('admin.alumni.index')->with('success', 'Alumni berhasil dihapus!');
    }

    // ==================== INDUSTRI CRUD ====================
    public function industriIndex()
    {
        $industris = Industri::orderBy('nama_industri')->get();
        $totalIndustri = Industri::count();
        $industriTersedia = Industri::where('status', 'tersedia')->count();
        
        return view('admin.industri.index', compact('industris', 'totalIndustri', 'industriTersedia'));
    }

    public function industriAvailable()
    {
        $industris = Industri::where('status', 'tersedia')->orderBy('nama_industri')->get();
        $totalIndustri = Industri::count();
        $industriTersedia = $industris->count();
        
        return view('admin.industri.available', compact('industris', 'totalIndustri', 'industriTersedia'));
    }

    public function industriCreate()
    {
        return view('admin.industri.create');
    }

    public function industriStore(Request $request)
    {
        $validated = $request->validate([
            'nama_industri' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bidang' => 'required|string|max:100',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:100',
            'kuota_pkl' => 'required|integer|min:1',
            'deskripsi' => 'required|string',
            'status' => 'required|in:tersedia,penuh',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'telepon' => 'nullable|string|max:20',
            'kategori' => 'nullable|string|max:100',
            'rating' => 'nullable|numeric|min:0|max:5'
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('industri', 'public');
        }

        Industri::create($validated);
        return redirect()->route('admin.industri.index')->with('success', 'Industri berhasil ditambahkan!');
    }

    public function industriShow($id)
    {
        $industri = Industri::findOrFail($id);
        return view('admin.industri.show', compact('industri'));
    }

    public function industriEdit($id)
    {
        $industri = Industri::findOrFail($id);
        return view('admin.industri.edit', compact('industri'));
    }

    public function industriUpdate(Request $request, $id)
    {
        $industri = Industri::findOrFail($id);
        
        $validated = $request->validate([
            'nama_industri' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bidang' => 'required|string|max:100',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:100',
            'kuota_pkl' => 'required|integer|min:1',
            'deskripsi' => 'required|string',
            'status' => 'required|in:tersedia,penuh',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'telepon' => 'nullable|string|max:20',
            'kategori' => 'nullable|string|max:100',
            'rating' => 'nullable|numeric|min:0|max:5'
        ]);

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($industri->logo && Storage::disk('public')->exists($industri->logo)) {
                Storage::disk('public')->delete($industri->logo);
            }
            $validated['logo'] = $request->file('logo')->store('industri', 'public');
        } elseif ($request->has('remove_logo')) {
            if ($industri->logo && Storage::disk('public')->exists($industri->logo)) {
                Storage::disk('public')->delete($industri->logo);
            }
            $validated['logo'] = null;
        }

        $industri->update($validated);
        return redirect()->route('admin.industri.index')->with('success', 'Industri berhasil diperbarui!');
    }

    public function industriDestroy($id)
    {
        $industri = Industri::findOrFail($id);
        
        // Delete logo if exists
        if ($industri->logo && Storage::disk('public')->exists($industri->logo)) {
            Storage::disk('public')->delete($industri->logo);
        }
        
        $industri->delete();
        return redirect()->route('admin.industri.index')->with('success', 'Industri berhasil dihapus!');
    }

    // ==================== USER MANAGEMENT ====================
    public function userIndex()
    {
        $users = User::where('role', '!=', 'admin')->orderBy('name')->get();
        return view('admin.users.index', compact('users'));
    }

    public function userCreate()
    {
        return view('admin.users.create');
    }

    public function userStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|in:siswa,guru,industri',
            'password' => 'required|string|min:8|confirmed',
            'nis' => 'nullable|string|max:20|unique:users',
            'kelas' => 'nullable|string|max:10',
            'jurusan' => 'nullable|string|max:50',
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        
        User::create($validated);
        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function userEdit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:siswa,guru,industri',
            'password' => 'nullable|string|min:8|confirmed',
            'nis' => 'nullable|string|max:20|unique:users,nis,' . $user->id,
            'kelas' => 'nullable|string|max:10',
            'jurusan' => 'nullable|string|max:50',
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string'
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);
        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui!');
    }

    public function userDestroy($id)
    {
        $user = User::findOrFail($id);
        
        // Jangan hapus user admin
        if ($user->role === 'admin') {
            return redirect()->route('admin.users.index')->with('error', 'Tidak dapat menghapus user admin!');
        }
        
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus!');
    }

    // ==================== PENGAJUAN PKL MANAGEMENT ====================
    public function pengajuanIndex()
    {
        $pengajuans = PengajuanPkl::with(['user', 'industri'])->latest()->get();
        return view('admin.pengajuan.index', compact('pengajuans'));
    }

    public function pengajuanShow($id)
    {
        $pengajuan = PengajuanPkl::with(['user', 'industri'])->findOrFail($id);
        return view('admin.pengajuan.show', compact('pengajuan'));
    }

    public function pengajuanApprove($id)
    {
        $pengajuan = PengajuanPkl::findOrFail($id);
        $pengajuan->update(['status' => 'disetujui', 'tanggal_approval' => now()]);
        
        // Update kuota industri
        $industri = $pengajuan->industri;
        if ($industri) {
            $industri->decrement('kuota_pkl');
            if ($industri->kuota_pkl <= 0) {
                $industri->update(['status' => 'penuh']);
            }
        }
        
        return redirect()->route('admin.pengajuan.index')->with('success', 'Pengajuan PKL berhasil disetujui!');
    }

    public function pengajuanReject($id)
    {
        $pengajuan = PengajuanPkl::findOrFail($id);
        $pengajuan->update(['status' => 'ditolak', 'tanggal_approval' => now()]);
        return redirect()->route('admin.pengajuan.index')->with('success', 'Pengajuan PKL berhasil ditolak!');
    }

    public function pengajuanDestroy($id)
    {
        $pengajuan = PengajuanPkl::findOrFail($id);
        $pengajuan->delete();
        return redirect()->route('admin.pengajuan.index')->with('success', 'Pengajuan PKL berhasil dihapus!');
    }

    // ==================== SETTINGS ====================
    public function settings()
    {
        $settings = [
            'app_name' => config('app.name', 'RICH'),
            'app_description' => 'RPL Industry & Career Hub',
            'contact_email' => 'admin@rich.com',
            'contact_phone' => '+62 812 3456 7890',
            'max_file_size' => '2048', // KB
            'allowed_file_types' => 'jpg,jpeg,png,gif,pdf',
            'maintenance_mode' => false,
            'registration_open' => true,
            'pkl_period_start' => '2024-01-01',
            'pkl_period_end' => '2024-12-31'
        ];
        
        return view('admin.settings.index', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'app_name' => 'required|string|max:255',
            'app_description' => 'required|string|max:500',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:20',
            'max_file_size' => 'required|integer|min:100|max:5120',
            'maintenance_mode' => 'boolean',
            'registration_open' => 'boolean',
            'pkl_period_start' => 'required|date',
            'pkl_period_end' => 'required|date|after:pkl_period_start'
        ]);

        // Simpan settings ke database atau config
        // Implementasi sesuai kebutuhan
        
        return redirect()->route('admin.settings')->with('success', 'Pengaturan berhasil diperbarui!');
    }

    // ==================== REPORTS ====================
    public function reports()
    {
        $totalAlumni = Alumni::count();
        $totalIndustri = Industri::count();
        $industriTersedia = Industri::where('status', 'tersedia')->count();
        $totalUsers = User::count();
        $totalPengajuan = PengajuanPkl::count();
        $pengajuanDisetujui = PengajuanPkl::where('status', 'disetujui')->count();
        
        // Statistik per bulan
        $alumniPerMonth = Alumni::selectRaw('YEAR(created_at) year, MONTH(created_at) month, COUNT(*) count')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->take(6)
            ->get();
            
        // Statistik per tahun lulus
        $alumniPerYear = Alumni::selectRaw('tahun_lulus, COUNT(*) as total')
            ->groupBy('tahun_lulus')
            ->orderBy('tahun_lulus', 'desc')
            ->get();
            
        // Statistik bidang industri
        $industriPerBidang = Industri::selectRaw('bidang, COUNT(*) as total')
            ->groupBy('bidang')
            ->orderBy('total', 'desc')
            ->get();
        
        return view('admin.reports.index', compact(
            'totalAlumni', 
            'totalIndustri', 
            'industriTersedia',
            'totalUsers',
            'totalPengajuan',
            'pengajuanDisetujui',
            'alumniPerMonth',
            'alumniPerYear',
            'industriPerBidang'
        ));
    }

    public function exportAlumni()
    {
        // Implementasi export alumni
        return redirect()->route('admin.reports')->with('success', 'Export alumni berhasil!');
    }

    public function exportIndustri()
    {
        // Implementasi export industri
        return redirect()->route('admin.reports')->with('success', 'Export industri berhasil!');
    }

    public function exportPengajuan()
    {
        // Implementasi export pengajuan
        return redirect()->route('admin.reports')->with('success', 'Export pengajuan berhasil!');
    }

    // ==================== ADDITIONAL FEATURES ====================
    public function statistics()
    {
        // Statistik lengkap
        $today = now()->format('Y-m-d');
        
        $stats = [
            'total_alumni' => Alumni::count(),
            'total_industri' => Industri::count(),
            'industri_tersedia' => Industri::where('status', 'tersedia')->count(),
            'total_users' => User::count(),
            'total_pengajuan' => PengajuanPkl::count(),
            'pengajuan_baru' => PengajuanPkl::whereDate('created_at', $today)->count(),
            'pengajuan_disetujui' => PengajuanPkl::where('status', 'disetujui')->count(),
            'pengajuan_ditolak' => PengajuanPkl::where('status', 'ditolak')->count(),
            'users_today' => User::whereDate('created_at', $today)->count(),
            'active_users' => User::where('last_login_at', '>=', now()->subDays(7))->count()
        ];
        
        return view('admin.statistics.index', compact('stats'));
    }

    public function backup()
    {
        // List backup files
        $backupFiles = [];
        $backupPath = storage_path('app/backups');
        
        if (file_exists($backupPath)) {
            $files = scandir($backupPath);
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    $backupFiles[] = [
                        'name' => $file,
                        'size' => filesize($backupPath . '/' . $file),
                        'date' => date('Y-m-d H:i:s', filemtime($backupPath . '/' . $file))
                    ];
                }
            }
        }
        
        return view('admin.backup.index', compact('backupFiles'));
    }

    public function createBackup(Request $request)
    {
        // Implementasi backup database
        // Simpan ke storage/app/backups
        
        return redirect()->route('admin.backup')->with('success', 'Backup berhasil dibuat!');
    }

    public function showLogs()
    {
        // Tampilkan log files
        return view('admin.logs.index');
    }

    public function activityLog()
    {
        // Log aktivitas admin
        return view('admin.activity.index');
    }

    // ==================== IMPORT/EXPORT ====================
    public function showImport()
    {
        return view('admin.import.index');
    }

    public function importAlumni(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls'
        ]);
        
        // Implementasi import alumni dari file
        return redirect()->route('admin.alumni.index')->with('success', 'Import alumni berhasil!');
    }

    public function importIndustri(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls'
        ]);
        
        // Implementasi import industri dari file
        return redirect()->route('admin.industri.index')->with('success', 'Import industri berhasil!');
    }

    public function showExport()
    {
        return view('admin.export.index');
    }

    public function exportAlumniExcel()
    {
        // Implementasi export alumni ke Excel
        return response()->download(storage_path('app/exports/alumni.xlsx'));
    }

    public function exportIndustriExcel()
    {
        // Implementasi export industri ke Excel
        return response()->download(storage_path('app/exports/industri.xlsx'));
    }

    public function exportAlumniPdf()
    {
        // Implementasi export alumni ke PDF
        return response()->download(storage_path('app/exports/alumni.pdf'));
    }

    public function exportIndustriPdf()
    {
        // Implementasi export industri ke PDF
        return response()->download(storage_path('app/exports/industri.pdf'));
    }

    // ==================== API FOR CHARTS ====================
    public function getStatisticsData()
    {
        $data = [
            'alumni_per_year' => Alumni::selectRaw('tahun_lulus as year, COUNT(*) as count')
                ->groupBy('tahun_lulus')
                ->orderBy('tahun_lulus')
                ->get(),
            'industri_per_field' => Industri::selectRaw('bidang as field, COUNT(*) as count')
                ->groupBy('bidang')
                ->get(),
            'pengajuan_per_status' => PengajuanPkl::selectRaw('status, COUNT(*) as count')
                ->groupBy('status')
                ->get()
        ];
        
        return response()->json($data);
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $path = $request->file('image')->store('uploads', 'public');
        
        return response()->json([
            'success' => true,
            'url' => Storage::url($path)
        ]);
    }
}