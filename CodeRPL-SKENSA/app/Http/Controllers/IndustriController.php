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
            $query->where('nama_industri', 'like', '%' . $request->search . '%');
        }
        
        // Filter bidang
        if ($request->has('bidang') && $request->bidang != 'semua') {
            $query->where('bidang', $request->bidang);
        }
        
        // Filter status
        if ($request->has('status') && $request->status != 'semua') {
            $query->where('status', $request->status);
        }
        
        $industris = $query->orderBy('nama_industri')->paginate(12);
        $bidangList = Industri::select('bidang')->distinct()->get();
        
        return view('pages.industri', compact('industris', 'bidangList'));
    }
}