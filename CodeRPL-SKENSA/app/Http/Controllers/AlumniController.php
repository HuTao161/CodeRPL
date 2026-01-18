<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index(Request $request)
    {
        $query = Alumni::query();
        
        // Search
        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }
        
        // Filter tahun lulus
        if ($request->has('tahun_lulus')) {
            $query->where('tahun_lulus', $request->tahun_lulus);
        }
        
        // Filter industri bekerja
        if ($request->has('industri_bekerja')) {
            $query->where('industri_bekerja', 'like', '%' . $request->industri_bekerja . '%');
        }
        
        $alumnis = $query->orderBy('tahun_lulus', 'desc')->paginate(12);
        $tahunList = Alumni::select('tahun_lulus')->distinct()->orderBy('tahun_lulus', 'desc')->get();
        
        return view('pages.alumni', compact('alumnis', 'tahunList'));
    }
}