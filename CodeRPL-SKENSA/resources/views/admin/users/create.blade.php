@extends('admin.dashboard')

@section('content')
<div class="page-header">
    <h1 class="font-playfair">Tambah Pengguna Baru</h1>
    <p>Tambahkan pengguna baru ke sistem RICH</p>
</div>

<div class="crud-section">
    <div class="form-container">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Nama Lengkap *</label>
                    <input type="text" id="name" name="name" required 
                           value="{{ old('name') }}"
                           placeholder="Nama lengkap pengguna">
                    @error('name')
                        <small style="color: var(--danger); display: block; margin-top: 5px;">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required
                           value="{{ old('email') }}"
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
                        <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                        <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                        <option value="industri" {{ old('role') == 'industri' ? 'selected' : '' }}>Industri</option>
                    </select>
                    @error('role')
                        <small style="color: var(--danger); display: block; margin-top: 5px;">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="nis">NIS/NIP</label>
                    <input type="text" id="nis" name="nis"
                           value="{{ old('nis') }}"
                           placeholder="NIS untuk siswa atau NIP untuk guru">
                    @error('nis')
                        <small style="color: var(--danger); display: block; margin-top: 5px;">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
            <!-- Siswa Fields -->
            <div id="siswa-fields" style="display: {{ old('role') == 'siswa' ? 'grid' : 'none' }};" class="form-grid">
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" id="kelas" name="kelas"
                           value="{{ old('kelas') }}"
                           placeholder="Kelas siswa (contoh: XII RPL 1)">
                </div>
                
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan"
                           value="{{ old('jurusan') }}"
                           placeholder="Jurusan siswa">
                </div>
            </div>
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="password">Password *</label>
                    <input type="password" id="password" name="password" required
                           placeholder="Password minimal 8 karakter">
                    @error('password')
                        <small style="color: var(--danger); display: block; margin-top: 5px;">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password *</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                           placeholder="Ulangi password">
                </div>
            </div>
            
            <div class="form-group">
                <label for="telepon">Nomor Telepon</label>
                <input type="text" id="telepon" name="telepon"
                       value="{{ old('telepon') }}"
                       placeholder="Nomor telepon aktif">
                @error('telepon')
                    <small style="color: var(--danger); display: block; margin-top: 5px;">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" rows="3"
                          placeholder="Alamat lengkap">{{ old('alamat') }}</textarea>
            </div>
            
            <div class="form-group">
                <label>
                    <input type="checkbox" name="email_verified" value="1" {{ old('email_verified') ? 'checked' : '' }}>
                    <span style="margin-left: 8px;">Verifikasi email secara otomatis</span>
                </label>
                <p style="color: var(--gray-500); font-size: 0.875rem; margin-top: 5px;">
                    Jika dicentang, pengguna dapat langsung login tanpa perlu verifikasi email
                </p>
            </div>
            
            <div style="display: flex; gap: 15px; margin-top: 30px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Simpan Pengguna
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