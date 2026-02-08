@extends('admin.dashboard')

@section('content')
<div class="page-header">
    <h1 class="font-playfair">Tambah Industri Baru</h1>
    <p>Tambahkan mitra industri baru untuk PKL jurusan RPL</p>
</div>

<div class="crud-section">
    <div class="form-container">
        <form action="{{ route('admin.industri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="nama_industri">Nama Industri *</label>
                    <input type="text" id="nama_industri" name="nama_industri" required 
                           value="{{ old('nama_industri') }}"
                           placeholder="Nama perusahaan/industri">
                    @error('nama_industri')
                        <small style="color: #ef4444;">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="bidang">Bidang Industri *</label>
                    <select id="bidang" name="bidang" required>
                        <option value="">Pilih Bidang</option>
                        <option value="Software House" {{ old('bidang') == 'Software House' ? 'selected' : '' }}>Software House</option>
                        <option value="Startup" {{ old('bidang') == 'Startup' ? 'selected' : '' }}>Startup</option>
                        <option value="Digital Agency" {{ old('bidang') == 'Digital Agency' ? 'selected' : '' }}>Digital Agency</option>
                        <option value="E-commerce" {{ old('bidang') == 'E-commerce' ? 'selected' : '' }}>E-commerce</option>
                        <option value="IT Consultant" {{ old('bidang') == 'IT Consultant' ? 'selected' : '' }}>IT Consultant</option>
                        <option value="Game Development" {{ old('bidang') == 'Game Development' ? 'selected' : '' }}>Game Development</option>
                    </select>
                    @error('bidang')
                        <small style="color: #ef4444;">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat Lengkap *</label>
                <textarea id="alamat" name="alamat" rows="3" required
                          placeholder="Alamat perusahaan">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <small style="color: #ef4444;">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="kontak">Kontak *</label>
                    <input type="text" id="kontak" name="kontak" required
                           value="{{ old('kontak') }}"
                           placeholder="Email/Telepon">
                    @error('kontak')
                        <small style="color: #ef4444;">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="kuota_pkl">Kuota PKL *</label>
                    <input type="number" id="kuota_pkl" name="kuota_pkl" required
                           value="{{ old('kuota_pkl', 5) }}" min="1"
                           placeholder="Jumlah siswa yang dapat diterima">
                    @error('kuota_pkl')
                        <small style="color: #ef4444;">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
            <div class="form-group">
                <label for="logo">Logo Industri</label>
                <input type="file" id="logo" name="logo" 
                       accept="image/*"
                       onchange="previewImage(this, 'logo-preview')">
                @error('logo')
                    <small style="color: #ef4444;">{{ $message }}</small>
                @enderror
                <img id="logo-preview" class="image-preview" 
                     src="" alt="Preview" style="display: none;">
            </div>
            
            <div class="form-group">
                <label for="deskripsi">Deskripsi *</label>
                <textarea id="deskripsi" name="deskripsi" rows="5" required
                          placeholder="Deskripsi tentang industri, bidang pekerjaan, dan kegiatan PKL yang ditawarkan">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <small style="color: #ef4444;">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="tersedia" {{ old('status', 'tersedia') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="penuh" {{ old('status') == 'penuh' ? 'selected' : '' }}>Penuh</option>
                </select>
            </div>
            
            <div style="display: flex; gap: 15px; margin-top: 30px;">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i>
                    Simpan Industri
                </button>
                <a href="{{ route('admin.industri.index') }}" class="btn" 
                   style="background: #e2e8f0; color: #475569;">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection