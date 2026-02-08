@extends('admin.dashboard')

@section('content')
<div class="page-header">
    <h1 class="font-playfair">Edit Data Alumni</h1>
    <p>Perbarui data alumni {{ $alumni->nama }}</p>
</div>

<div class="crud-section">
    <div class="form-container">
        <form action="{{ route('admin.alumni.update', $alumni->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="nama">Nama Lengkap *</label>
                    <input type="text" id="nama" name="nama" required 
                           value="{{ old('nama', $alumni->nama) }}"
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
                            <option value="{{ $year }}" {{ old('tahun_lulus', $alumni->tahun_lulus) == $year ? 'selected' : '' }}>
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
                       value="{{ old('tempat_pkl', $alumni->tempat_pkl) }}"
                       placeholder="Nama perusahaan tempat PKL">
                @error('tempat_pkl')
                    <small style="color: #ef4444;">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="industri_bekerja">Industri Tempat Bekerja</label>
                    <input type="text" id="industri_bekerja" name="industri_bekerja"
                           value="{{ old('industri_bekerja', $alumni->industri_bekerja) }}"
                           placeholder="Nama perusahaan saat ini">
                </div>
                
                <div class="form-group">
                    <label for="posisi">Posisi/Jabatan</label>
                    <input type="text" id="posisi" name="posisi"
                           value="{{ old('posisi', $alumni->posisi) }}"
                           placeholder="Posisi pekerjaan">
                </div>
            </div>
            
            <div class="form-group">
                <label for="foto">Foto Alumni</label>
                @if($alumni->foto)
                    <div style="margin-bottom: 10px;">
                        <img src="{{ asset('storage/' . $alumni->foto) }}" 
                             alt="Current Foto" 
                             style="width: 100px; height: 100px; border-radius: 8px; object-fit: cover;">
                        <br>
                        <label style="display: inline-flex; align-items: center; margin-top: 5px;">
                            <input type="checkbox" name="remove_foto" value="1">
                            <span style="margin-left: 5px; font-size: 0.9rem;">Hapus foto</span>
                        </label>
                    </div>
                @endif
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
                          placeholder="Testimoni dari alumni tentang pengalaman PKL atau karir">{{ old('testimoni', $alumni->testimoni) }}</textarea>
            </div>
            
            <div style="display: flex; gap: 15px; margin-top: 30px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Update Data
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