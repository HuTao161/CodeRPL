@extends('admin.dashboard')

@section('content')
<div class="page-header">
    <h1 class="font-playfair">Edit Pengguna</h1>
    <p>Perbarui data pengguna {{ $user->name }}</p>
</div>

<div class="crud-section">
    <div class="form-container">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Nama Lengkap *</label>
                    <input type="text" id="name" name="name" required 
                           value="{{ old('name', $user->name) }}"
                           placeholder="Nama lengkap pengguna">
                    @error('name')
                        <small style="color: var(--danger); display: block; margin-top: 5px;">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required
                           value="{{ old('email', $user->email) }}"
                           placeholder="Email pengguna">
                    @error('email')
                        <small style="color: var(--danger); display: block; margin-top: 5px;">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="role">Role *</label>
                    <select id="role" name="role" required onchange="toggleRoleFields()">
                        <option value="">Pilih Role</option>
                        <option value="siswa" {{ old('role', $user->role) == 'siswa' ? 'selected' : '' }}>Siswa</option>
                        <option value="guru" {{ old('role', $user->role) == 'guru' ? 'selected' : '' }}>Guru</option>
                        <option value="industri" {{ old('role', $user->role) == 'industri' ? 'selected' : '' }}>Industri</option>
                        @if($user->role == 'admin')
                            <option value="admin" selected>Admin</option>
                        @endif
                    </select>
                    @error('role')
                        <small style="color: var(--danger); display: block; margin-top: 5px;">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="nis">NIS/NIP</label>
                    <input type="text" id="nis" name="nis"
                           value="{{ old('nis', $user->nis) }}"
                           placeholder="NIS untuk siswa atau NIP untuk guru">
                    @error('nis')
                        <small style="color: var(--danger); display: block; margin-top: 5px;">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
            <!-- Siswa Fields -->
            <div id="siswa-fields" style="display: {{ old('role', $user->role) == 'siswa' ? 'grid' : 'none' }};" class="form-grid">
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" id="kelas" name="kelas"
                           value="{{ old('kelas', $user->kelas) }}"
                           placeholder="Kelas siswa (contoh: XII RPL 1)">
                </div>
                
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan"
                           value="{{ old('jurusan', $user->jurusan) }}"
                           placeholder="Jurusan siswa">
                </div>
            </div>
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"
                           placeholder="Kosongkan jika tidak ingin mengubah">
                    @error('password')
                        <small style="color: var(--danger); display: block; margin-top: 5px;">{{ $message }}</small>
                    @enderror
                    <p style="color: var(--gray-500); font-size: 0.875rem; margin-top: 5px;">
                        Kosongkan jika tidak ingin mengubah password
                    </p>
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           placeholder="Ulangi password baru">
                </div>
            </div>
            
            <div class="form-group">
                <label for="telepon">Nomor Telepon</label>
                <input type="text" id="telepon" name="telepon"
                       value="{{ old('telepon', $user->telepon) }}"
                       placeholder="Nomor telepon aktif">
                @error('telepon')
                    <small style="color: var(--danger); display: block; margin-top: 5px;">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" rows="3"
                          placeholder="Alamat lengkap">{{ old('alamat', $user->alamat) }}</textarea>
            </div>
            
            <div class="form-group">
                <label>
                    <input type="checkbox" name="email_verified" value="1" {{ $user->email_verified_at ? 'checked' : '' }}>
                    <span style="margin-left: 8px;">Email terverifikasi</span>
                </label>
            </div>
            
            <div style="display: flex; gap: 15px; margin-top: 30px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Update Pengguna
                </button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // Tampilkan/sembunyikan field siswa berdasarkan role
    function toggleRoleFields() {
        const role = document.getElementById('role').value;
        const siswaFields = document.getElementById('siswa-fields');
        
        if (role === 'siswa') {
            siswaFields.style.display = 'grid';
        } else {
            siswaFields.style.display = 'none';
        }
    }
    
    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        toggleRoleFields();
    });
</script>
@endsection