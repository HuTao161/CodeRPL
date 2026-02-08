@extends('admin.dashboard')

@section('content')
<div class="page-header">
    <h1 class="font-playfair">Tambah Alumni Baru</h1>
    <p>Tambahkan data alumni jurusan RPL</p>
</div>

<div class="crud-section">
    <div class="form-container">
        <form action="{{ route('admin.alumni.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="nama">Nama Lengkap *</label>
                    <input type="text" id="nama" name="nama" required 
                           value="{{ old('nama') }}"
                           placeholder="Nama alumni">
                    @error('nama')
                        <small style="color: #ef4444;">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="tahun_lulus">Tahun Lulus *</label>
                    <select id="tahun_lulus" name="tahun_lulus" required>
                        <option value="">Pilih Tahun</option>
                        @for($year = date('Y'); $year >= 2000; $year--)
                            <option value="{{ $year }}" {{ old('tahun_lulus') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endfor
                    </select>
                    @error('tahun_lulus')
                        <small style="color: #ef4444;">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
            <div class="form-group">
                <label for="tempat_pkl">Tempat PKL *</label>
                <input type="text" id="tempat_pkl" name="tempat_pkl" required
                       value="{{ old('tempat_pkl') }}"
                       placeholder="Nama perusahaan tempat PKL">
                @error('tempat_pkl')
                    <small style="color: #ef4444;">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="industri_bekerja">Industri Tempat Bekerja</label>
                    <input type="text" id="industri_bekerja" name="industri_bekerja"
                           value="{{ old('industri_bekerja') }}"
                           placeholder="Nama perusahaan saat ini">
                </div>
                
                <div class="form-group">
                    <label for="posisi">Posisi/Jabatan</label>
                    <input type="text" id="posisi" name="posisi"
                           value="{{ old('posisi') }}"
                           placeholder="Posisi pekerjaan">
                </div>
            </div>
            
            <div class="form-group">
                <label for="foto">Foto Alumni</label>
                <input type="file" id="foto" name="foto" 
                       accept="image/*"
                       onchange="previewImage(this, 'foto-preview')">
                @error('foto')
                    <small style="color: #ef4444;">{{ $message }}</small>
                @enderror
                <img id="foto-preview" class="image-preview" 
                     src="" alt="Preview" style="display: none;">
            </div>
            
            <div class="form-group">
                <label for="testimoni">Testimoni</label>
                <textarea id="testimoni" name="testimoni" rows="4"
                          placeholder="Testimoni dari alumni tentang pengalaman PKL atau karir">{{ old('testimoni') }}</textarea>
            </div>
            
            <div style="display: flex; gap: 15px; margin-top: 30px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Simpan Data
                </button>
                <a href="{{ route('admin.alumni.index') }}" class="btn" 
                   style="background: #e2e8f0; color: #475569;">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection