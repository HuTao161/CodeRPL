@extends('admin.dashboard')

@section('content')
<div class="page-header">
    <h1 class="font-playfair">Edit Data Industri</h1>
    <p>Perbarui data {{ $industri->nama_industri }}</p>
</div>

<div class="crud-section">
    <div class="form-container">
        <form action="{{ route('admin.industri.update', $industri->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="nama_industri">Nama Industri *</label>
                    <input type="text" id="nama_industri" name="nama_industri" required 
                           value="{{ old('nama_industri', $industri->nama_industri) }}"
                           placeholder="Nama perusahaan/industri">
                    @error('nama_industri')
                        <small style="color: #ef4444;">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="bidang">Bidang Industri *</label>
                    <select id="bidang" name="bidang" required>
                        <option value="">Pilih Bidang</option>
                        <option value="Software House" {{ old('bidang', $industri->bidang) == 'Software House' ? 'selected' : '' }}>Software House</option>
                        <option value="Startup" {{ old('bidang', $industri->bidang) == 'Startup' ? 'selected' : '' }}>Startup</option>
                        <option value="Digital Agency" {{ old('bidang', $industri->bidang) == 'Digital Agency' ? 'selected' : '' }}>Digital Agency</option>
                        <option value="E-commerce" {{ old('bidang', $industri->bidang) == 'E-commerce' ? 'selected' : '' }}>E-commerce</option>
                        <option value="IT Consultant" {{ old('bidang', $industri->bidang) == 'IT Consultant' ? 'selected' : '' }}>IT Consultant</option>
                        <option value="Game Development" {{ old('bidang', $industri->bidang) == 'Game Development' ? 'selected' : '' }}>Game Development</option>
                    </select>
                    @error('bidang')
                        <small style="color: #ef4444;">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat Lengkap *</label>
                <textarea id="alamat" name="alamat" rows="3" required
                          placeholder="Alamat perusahaan">{{ old('alamat', $industri->alamat) }}</textarea>
                @error('alamat')
                    <small style="color: #ef4444;">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="kontak">Kontak *</label>
                    <input type="text" id="kontak" name="kontak" required
                           value="{{ old('kontak', $industri->kontak) }}"
                           placeholder="Email/Telepon">
                    @error('kontak')
                        <small style="color: #ef4444;">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="kuota_pkl">Kuota PKL *</label>
                    <input type="number" id="kuota_pkl" name="kuota_pkl" required
                           value="{{ old('kuota_pkl', $industri->kuota_pkl) }}" min="1"
                           placeholder="Jumlah siswa yang dapat diterima">
                    @error('kuota_pkl')
                        <small style="color: #ef4444;">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
            <div class="form-group">
                <label for="logo">Logo Industri</label>
                @if($industri->logo)
                    <div style="margin-bottom: 10px;">
                        <img src="{{ asset('storage/' . $industri->logo) }}" 
                             alt="Current Logo" 
                             style="width: 100px; height: 100px; border-radius: 8px; object-fit: cover;">
                        <br>
                        <label style="display: inline-flex; align-items: center; margin-top: 5px;">
                            <input type="checkbox" name="remove_logo" value="1">
                            <span style="margin-left: 5px; font-size: 0.9rem;">Hapus logo</span>
                        </label>
                    </div>
                @endif
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
                          placeholder="Deskripsi tentang industri, bidang pekerjaan, dan kegiatan PKL yang ditawarkan">{{ old('deskripsi', $industri->deskripsi) }}</textarea>
                @error('deskripsi')
                    <small style="color: #ef4444;">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="tersedia" {{ old('status', $industri->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="penuh" {{ old('status', $industri->status) == 'penuh' ? 'selected' : '' }}>Penuh</option>
                </select>
            </div>
            
            <div style="display: flex; gap: 15px; margin-top: 30px;">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i>
                    Update Industri
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