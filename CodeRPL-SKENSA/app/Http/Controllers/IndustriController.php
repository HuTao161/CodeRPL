<?php

namespace App\Http\Controllers;

use App\Models\Industri;
use Illuminate\Http\Request;

class IndustriController extends Controller
{
    public function index(Request $request)
    {
        $query = Industri::query();
        
        // Search
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('nama_industri', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
            });
        }
        
        // Filter bidang
        if ($request->has('bidang') && $request->input('bidang') != '') {
            $query->where('bidang', $request->input('bidang'));
        }
        
        // Filter status
        if ($request->has('status') && $request->input('status') != '') {
            $query->where('status', $request->input('status'));
        }
        
        // Order by
        $query->orderBy('status', 'asc')->orderBy('nama_industri', 'asc');
        
        $industris = $query->paginate(9);
        
        // Statistics - PERBAIKAN DI SINI
        $totalIndustri = Industri::count();
        $kuotaTersedia = Industri::sum('kuota_pkl') - Industri::sum('kuota_terisi');
        $industriTersedia = Industri::where('status', 'tersedia')->count();
        
        return view('pages.industri', compact(
            'industris', 
            'totalIndustri', 
            'kuotaTersedia', 
            'industriTersedia'
        ));
    }
    
    public function show($id)
    {
        $industri = Industri::findOrFail($id);
        return view('pages.industri-detail', compact('industri'));
    }
}