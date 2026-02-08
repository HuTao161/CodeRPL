@extends('admin.dashboard')

@section('content')
<div class="page-header">
    <h1 class="font-playfair">Daftar Industri</h1>
    <p>Kelola data mitra industri untuk PKL jurusan RPL</p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
@endif

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
</div>

<div class="crud-section">
    <div class="section-header">
        <h2>Data Mitra Industri</h2>
        <a href="{{ route('admin.industri.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i>
            Tambah Industri
        </a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Logo</th>
                    <th>Nama Industri</th>
                    <th>Bidang</th>
                    <th>Kuota PKL</th>
                    <th>Status</th>
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
                        <small style="color: #64748b;">{{ $industri->alamat }}</small>
                    </td>
                    <td>
                        <span style="background: #f1f5f9; padding: 4px 8px; border-radius: 4px; font-size: 0.9rem;">
                            {{ $industri->bidang }}
                        </span>
                    </td>
                    <td>
                        <span style="font-weight: 600; color: #3b82f6;">
                            {{ $industri->kuota_pkl }} siswa
                        </span>
                    </td>
                    <td>
                        @if($industri->status == 'tersedia')
                            <span style="background: #d1fae5; color: #065f46; padding: 4px 12px; border-radius: 20px; font-size: 0.85rem;">
                                <i class="fas fa-check-circle"></i> Tersedia
                            </span>
                        @else
                            <span style="background: #fef3c7; color: #92400e; padding: 4px 12px; border-radius: 20px; font-size: 0.85rem;">
                                <i class="fas fa-clock"></i> Penuh
                            </span>
                        @endif
                    </td>
                    <td>
                        <small>{{ $industri->kontak }}</small>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.industri.edit', $industri->id) }}" 
                               class="action-btn edit-btn">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.industri.destroy', $industri->id) }}" 
                                  method="POST" 
                                  id="delete-industri-{{ $industri->id }}"
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        class="action-btn delete-btn"
                                        onclick="confirmDelete('delete-industri-{{ $industri->id }}', '{{ $industri->nama_industri }}')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        @if($industris->isEmpty())
        <div style="text-align: center; padding: 40px; color: #64748b;">
            <i class="fas fa-industry" style="font-size: 3rem; margin-bottom: 15px; color: #cbd5e1;"></i>
            <p>Tidak ada data industri</p>
        </div>
        @endif
    </div>
</div>
@endsection