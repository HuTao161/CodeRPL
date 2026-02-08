@extends('admin.dashboard')

@section('content')
<div class="page-header">
    <h1 class="font-playfair">Daftar Alumni</h1>
    <p>Kelola data alumni jurusan RPL SMKN 1 Denpasar</p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
@endif

<div class="crud-section">
    <div class="section-header">
        <h2>Data Alumni</h2>
        <a href="{{ route('admin.alumni.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Alumni
        </a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Tahun Lulus</th>
                    <th>Tempat PKL</th>
                    <th>Pekerjaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnis as $key => $alumni)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($alumni->foto)
                            <img src="{{ asset('storage/' . $alumni->foto) }}" 
                                 alt="{{ $alumni->nama }}" 
                                 style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                        @else
                            <div style="width: 50px; height: 50px; background: #e2e8f0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $alumni->nama }}</strong>
                        @if($alumni->testimoni)
                            <br><small class="text-blue-600">✓ Ada testimoni</small>
                        @endif
                    </td>
                    <td>{{ $alumni->tahun_lulus }}</td>
                    <td>{{ $alumni->tempat_pkl }}</td>
                    <td>
                        @if($alumni->industri_bekerja)
                            {{ $alumni->industri_bekerja }}
                            @if($alumni->posisi)
                                <br><small>{{ $alumni->posisi }}</small>
                            @endif
                        @else
                            <span style="color: #94a3b8;">-</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.alumni.edit', $alumni->id) }}" 
                               class="action-btn edit-btn">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.alumni.destroy', $alumni->id) }}" 
                                  method="POST" 
                                  id="delete-form-{{ $alumni->id }}"
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        class="action-btn delete-btn"
                                        onclick="confirmDelete('delete-form-{{ $alumni->id }}', '{{ $alumni->nama }}')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        @if($alumnis->isEmpty())
        <div style="text-align: center; padding: 40px; color: #64748b;">
            <i class="fas fa-user-graduate" style="font-size: 3rem; margin-bottom: 15px; color: #cbd5e1;"></i>
            <p>Tidak ada data alumni</p>
        </div>
        @endif
    </div>
</div>
@endsection