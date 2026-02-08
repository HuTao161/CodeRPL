@extends('admin.dashboard')

@section('content')
<div class="page-header">
    <h1 class="font-playfair">Industri Tersedia</h1>
    <p>Daftar mitra industri yang tersedia untuk PKL</p>
</div>

<!-- Stats Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon industri">
            <i class="fas fa-industry"></i>
        </div>
        <div class="stat-number">{{ $totalIndustri }}</div>
        <div class="stat-label">Total Industri</div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon tersedia">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-number">{{ $industriTersedia }}</div>
        <div class="stat-label">Industri Tersedia</div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon" style="background: linear-gradient(135deg, #ef4444, #dc2626); color: white;">
            <i class="fas fa-times-circle"></i>
        </div>
        <div class="stat-number">{{ $totalIndustri - $industriTersedia }}</div>
        <div class="stat-label">Industri Penuh</div>
    </div>
</div>

<div class="crud-section">
    <div class="section-header">
        <h2>Daftar Industri Tersedia</h2>
        <a href="{{ route('admin.industri.index') }}" class="btn" style="background: #e2e8f0; color: #475569;">
            <i class="fas fa-list"></i>
            Lihat Semua Industri
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Logo</th>
                    <th>Nama Industri</th>
                    <th>Bidang</th>
                    <th>Kuota PKL</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($industris as $industri)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($industri->logo)
                            <img src="{{ asset('storage/' . $industri->logo) }}" 
                                 alt="{{ $industri->nama_industri }}" 
                                 style="width: 50px; height: 50px; border-radius: 8px; object-fit: cover;">
                        @else
                            <div style="width: 50px; height: 50px; background: #e2e8f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-building text-gray-400"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $industri->nama_industri }}</strong><br>
                        <small style="color: #64748b;">
                            <i class="fas fa-envelope"></i> {{ $industri->email ?? '-' }}
                        </small>
                    </td>
                    <td>
                        <span style="background: #f1f5f9; padding: 4px 8px; border-radius: 4px; font-size: 0.9rem;">
                            {{ $industri->bidang }}
                        </span>
                    </td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 5px;">
                            <span style="font-weight: 600; color: #10b981;">
                                {{ $industri->kuota_pkl }}
                            </span>
                            <span style="color: #64748b; font-size: 0.9rem;">siswa</span>
                        </div>
                    </td>
                    <td>
                        <small>{{ Str::limit($industri->alamat, 50) }}</small>
                    </td>
                    <td>
                        <small>{{ $industri->kontak }}</small>
                        @if($industri->telepon)
                            <br><small><i class="fas fa-phone"></i> {{ $industri->telepon }}</small>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.industri.edit', $industri->id) }}" 
                               class="action-btn edit-btn">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('admin.industri.show', $industri->id) }}" 
                               class="action-btn" style="background: #dbeafe; color: #1e40af;">
                                <i class="fas fa-eye"></i> Lihat
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        @if($industris->isEmpty())
        <div style="text-align: center; padding: 40px; color: #64748b;">
            <i class="fas fa-industry" style="font-size: 3rem; margin-bottom: 15px; color: #cbd5e1;"></i>
            <p>Tidak ada industri tersedia saat ini</p>
            <a href="{{ route('admin.industri.create') }}" class="btn btn-success" style="margin-top: 15px;">
                <i class="fas fa-plus"></i>
                Tambah Industri
            </a>
        </div>
        @endif
    </div>
</div>

<!-- Deskripsi Singkat -->
<div class="crud-section" style="margin-top: 30px;">
    <div class="section-header">
        <h2>Informasi</h2>
    </div>
    <div style="background: #f8fafc; padding: 20px; border-radius: 8px;">
        <h3 style="color: #1e293b; margin-bottom: 10px;">Industri Tersedia</h3>
        <p style="color: #475569; line-height: 1.6;">
            Industri dengan status <strong>"Tersedia"</strong> berarti masih membuka kesempatan untuk menerima siswa PKL.
            Kuota PKL menunjukkan jumlah siswa yang masih dapat diterima. 
            Jika kuota sudah habis, status akan berubah menjadi <strong>"Penuh"</strong>.
        </p>
        <div style="display: flex; gap: 20px; margin-top: 15px;">
            <div style="display: flex; align-items: center; gap: 8px;">
                <div style="width: 12px; height: 12px; background: #10b981; border-radius: 50%;"></div>
                <span style="color: #475569; font-size: 0.9rem;">Tersedia - Masih menerima siswa PKL</span>
            </div>
            <div style="display: flex; align-items: center; gap: 8px;">
                <div style="width: 12px; height: 12px; background: #f59e0b; border-radius: 50%;"></div>
                <span style="color: #475569; font-size: 0.9rem;">Penuh - Kuota PKL sudah terpenuhi</span>
            </div>
        </div>
    </div>
</div>
@endsection