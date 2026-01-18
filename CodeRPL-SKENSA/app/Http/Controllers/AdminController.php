<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Industri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalAlumni = Alumni::count();
        $totalIndustri = Industri::count();
        $industriTersedia = Industri::where('status', 'tersedia')->count();
        
        return view('admin.dashboard', compact('totalAlumni', 'totalIndustri', 'industriTersedia'));
    }

    // CRUD Alumni
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tahun_lulus' => 'required|integer|min:2000|max:' . date('Y'),
            'tempat_pkl' => 'required|string|max:255',
            'industri_bekerja' => 'nullable|string|max:255',
            'posisi' => 'nullable|string|max:255',
            'testimoni' => 'nullable|string'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('alumni', 'public');
        }

        Alumni::create($validated);
        return redirect()->route('admin.alumni.index')->with('success', 'Alumni berhasil ditambahkan!');
    }

    // CRUD Industri
    public function industriIndex()
    {
        $industris = Industri::orderBy('nama_industri')->get();
        return view('admin.industri.index', compact('industris'));
    }

    public function industriStore(Request $request)
    {
        $validated = $request->validate([
            'nama_industri' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bidang' => 'required|string',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:100',
            'kuota_pkl' => 'required|integer|min:1',
            'deskripsi' => 'required|string'
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('industri', 'public');
        }

        Industri::create($validated);
        return redirect()->route('admin.industri.index')->with('success', 'Industri berhasil ditambahkan!');
    }
}