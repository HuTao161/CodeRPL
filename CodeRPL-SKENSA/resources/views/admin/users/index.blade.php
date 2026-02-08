@extends('admin.dashboard')

@section('content')
<div class="page-header">
    <h1 class="font-playfair">Manajemen Pengguna</h1>
    <p>Kelola data pengguna sistem RICH</p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-error">
        <i class="fas fa-exclamation-circle"></i>
        {{ session('error') }}
    </div>
@endif

<div class="crud-section">
    <div class="section-header">
        <h2>Daftar Pengguna</h2>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Pengguna
        </a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Avatar</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>NIS</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div class="user-avatar" style="width: 40px; height: 40px;">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                    </td>
                    <td>
                        <strong>{{ $user->name }}</strong>
                        @if($user->kelas)
                            <br><small style="color: var(--gray-500);">Kelas: {{ $user->kelas }}</small>
                        @endif
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->role == 'admin')
                            <span style="background: rgba(59, 130, 246, 0.1); color: var(--primary); padding: 4px 8px; border-radius: var(--radius-sm); font-size: 0.75rem;">
                                Admin
                            </span>
                        @elseif($user->role == 'siswa')
                            <span style="background: rgba(16, 185, 129, 0.1); color: var(--secondary); padding: 4px 8px; border-radius: var(--radius-sm); font-size: 0.75rem;">
                                Siswa
                            </span>
                        @elseif($user->role == 'guru')
                            <span style="background: rgba(245, 158, 11, 0.1); color: #d97706; padding: 4px 8px; border-radius: var(--radius-sm); font-size: 0.75rem;">
                                Guru
                            </span>
                        @elseif($user->role == 'industri')
                            <span style="background: rgba(139, 92, 246, 0.1); color: #7c3aed; padding: 4px 8px; border-radius: var(--radius-sm); font-size: 0.75rem;">
                                Industri
                            </span>
                        @endif
                    </td>
                    <td>{{ $user->nis ?? '-' }}</td>
                    <td>
                        @if($user->email_verified_at)
                            <span style="background: rgba(16, 185, 129, 0.1); color: var(--secondary); padding: 4px 8px; border-radius: var(--radius-sm); font-size: 0.75rem;">
                                <i class="fas fa-check-circle"></i> Terverifikasi
                            </span>
                        @else
                            <span style="background: rgba(245, 158, 11, 0.1); color: #d97706; padding: 4px 8px; border-radius: var(--radius-sm); font-size: 0.75rem;">
                                <i class="fas fa-clock"></i> Belum Verifikasi
                            </span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.users.edit', $user->id) }}" 
                               class="action-btn edit-btn">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            @if($user->role !== 'admin')
                            <form action="{{ route('admin.users.destroy', $user->id) }}" 
                                  method="POST" 
                                  id="delete-user-{{ $user->id }}"
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        class="action-btn delete-btn"
                                        onclick="confirmDelete('delete-user-{{ $user->id }}', '{{ $user->name }}')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        @if($users->isEmpty())
        <div style="text-align: center; padding: 40px; color: var(--gray-500);">
            <i class="fas fa-users" style="font-size: 3rem; margin-bottom: 15px; color: var(--gray-300);"></i>
            <p>Tidak ada data pengguna</p>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary" style="margin-top: 15px;">
                <i class="fas fa-plus"></i>
                Tambah Pengguna Pertama
            </a>
        </div>
        @endif
    </div>
</div>

<!-- User Statistics -->
<div class="crud-section">
    <div class="section-header">
        <h2>Statistik Pengguna</h2>
    </div>
    
    <div class="stats-grid" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(59, 130, 246, 0.1); color: var(--primary);">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-content">
                <div>
                    <div class="stat-number">{{ $users->count() }}</div>
                    <div class="stat-label">Total Pengguna</div>
                </div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(16, 185, 129, 0.1); color: var(--secondary);">
                <i class="fas fa-user-graduate"></i>
            </div>
            <div class="stat-content">
                <div>
                    <div class="stat-number">{{ $users->where('role', 'siswa')->count() }}</div>
                    <div class="stat-label">Siswa</div>
                </div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(245, 158, 11, 0.1); color: #d97706;">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="stat-content">
                <div>
                    <div class="stat-number">{{ $users->where('role', 'guru')->count() }}</div>
                    <div class="stat-label">Guru</div>
                </div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(139, 92, 246, 0.1); color: #7c3aed;">
                <i class="fas fa-industry"></i>
            </div>
            <div class="stat-content">
                <div>
                    <div class="stat-number">{{ $users->where('role', 'industri')->count() }}</div>
                    <div class="stat-label">Industri</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection