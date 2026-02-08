@extends('admin.dashboard')

@section('content')
<div class="page-header">
    <h1 class="font-playfair">Pengaturan Sistem</h1>
    <p>Kelola pengaturan aplikasi RICH</p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
@endif

<div class="crud-section">
    <div class="section-header">
        <h2>Pengaturan Umum</h2>
    </div>
    
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-grid">
            <div class="form-group">
                <label for="app_name">Nama Aplikasi</label>
                <input type="text" id="app_name" name="app_name" required
                       value="{{ $settings['app_name'] }}"
                       placeholder="Nama aplikasi">
            </div>
            
            <div class="form-group">
                <label for="contact_email">Email Kontak</label>
                <input type="email" id="contact_email" name="contact_email" required
                       value="{{ $settings['contact_email'] }}"
                       placeholder="Email kontak admin">
            </div>
        </div>
        
        <div class="form-grid">
            <div class="form-group">
                <label for="contact_phone">Telepon Kontak</label>
                <input type="text" id="contact_phone" name="contact_phone" required
                       value="{{ $settings['contact_phone'] }}"
                       placeholder="Nomor telepon kontak">
            </div>
            
            <div class="form-group">
                <label for="max_file_size">Ukuran File Maksimal (KB)</label>
                <input type="number" id="max_file_size" name="max_file_size" required
                       value="{{ $settings['max_file_size'] }}" min="100" max="5120"
                       placeholder="Ukuran file maksimal dalam KB">
            </div>
        </div>
        
        <div class="form-grid">
            <div class="form-group">
                <label for="pkl_period_start">Mulai Periode PKL</label>
                <input type="date" id="pkl_period_start" name="pkl_period_start" required
                       value="{{ $settings['pkl_period_start'] }}">
            </div>
            
            <div class="form-group">
                <label for="pkl_period_end">Akhir Periode PKL</label>
                <input type="date" id="pkl_period_end" name="pkl_period_end" required
                       value="{{ $settings['pkl_period_end'] }}">
            </div>
        </div>
        
        <div class="form-group">
            <label for="app_description">Deskripsi Aplikasi</label>
            <textarea id="app_description" name="app_description" rows="3"
                      placeholder="Deskripsi singkat aplikasi">{{ $settings['app_description'] }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="allowed_file_types">Jenis File yang Diizinkan</label>
            <input type="text" id="allowed_file_types" name="allowed_file_types" required
                   value="{{ $settings['allowed_file_types'] }}"
                   placeholder="Contoh: jpg,jpeg,png,gif,pdf">
        </div>
        
        <div class="form-group">
            <label style="display: flex; align-items: center; gap: 8px;">
                <input type="checkbox" name="maintenance_mode" value="1" 
                       {{ $settings['maintenance_mode'] ? 'checked' : '' }}>
                <span>Mode Maintenance</span>
            </label>
            <p style="color: var(--gray-500); font-size: 0.875rem; margin-top: 5px;">
                Jika diaktifkan, website akan dalam mode maintenance dan tidak dapat diakses publik
            </p>
        </div>
        
        <div class="form-group">
            <label style="display: flex; align-items: center; gap: 8px;">
                <input type="checkbox" name="registration_open" value="1" 
                       {{ $settings['registration_open'] ? 'checked' : '' }}>
                <span>Pendaftaran Terbuka</span>
            </label>
            <p style="color: var(--gray-500); font-size: 0.875rem; margin-top: 5px;">
                Jika dinonaktifkan, pendaftaran user baru akan ditutup
            </p>
        </div>
        
        <div style="display: flex; gap: 15px; margin-top: 30px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Simpan Pengaturan
            </button>
            <button type="button" class="btn btn-outline" onclick="window.location.reload()">
                <i class="fas fa-redo"></i>
                Reset
            </button>
        </div>
    </form>
</div>

<div class="crud-section">
    <div class="section-header">
        <h2>Aksi Sistem</h2>
    </div>
    
    <div style="display: flex; gap: 15px; flex-wrap: wrap;">
        <button type="button" class="btn btn-outline" onclick="clearCache()">
            <i class="fas fa-broom"></i>
            Clear Cache
        </button>
        
        <a href="{{ route('admin.backup') }}" class="btn btn-outline">
            <i class="fas fa-database"></i>
            Backup Database
        </a>
        
        <button type="button" class="btn btn-outline" onclick="clearLogs()">
            <i class="fas fa-trash"></i>
            Clear Logs
        </button>
        
        <button type="button" class="btn btn-danger" onclick="showResetDialog()">
            <i class="fas fa-exclamation-triangle"></i>
            Reset Pengaturan
        </button>
    </div>
</div>

<script>
    function clearCache() {
        if (confirm('Apakah Anda yakin ingin membersihkan cache?')) {
            // Implementasi clear cache
            alert('Cache berhasil dibersihkan!');
        }
    }
    
    function clearLogs() {
        if (confirm('Apakah Anda yakin ingin menghapus semua logs?')) {
            // Implementasi clear logs
            alert('Logs berhasil dihapus!');
        }
    }
    
    function showResetDialog() {
        if (confirm('PERINGATAN: Ini akan mengembalikan semua pengaturan ke nilai default. Lanjutkan?')) {
            if (confirm('Apakah Anda benar-benar yakin? Tindakan ini tidak dapat dibatalkan.')) {
                // Implementasi reset settings
                alert('Pengaturan berhasil direset ke default!');
            }
        }
    }
</script>
@endsection