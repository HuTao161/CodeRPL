@extends('layouts.app')

@section('title', 'Daftar Alumni RPL SMKN 1 Denpasar')

@section('content')
<div class="container py-4">

    <!-- HEADER -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="fw-bold mb-2">
                <i class="fas fa-user-graduate text-primary"></i> Daftar Alumni RPL
            </h1>
            <p class="text-muted">Alumni Jurusan Rekayasa Perangkat Lunak SMKN 1 Denpasar</p>
        </div>
    </div>

    <!-- SEARCH -->
    <div class="row mb-4">
        <div class="col-12">
            <form action="{{ route('alumni.search') }}" method="GET" class="input-group input-group-lg shadow-sm">
                <input type="text" name="search" class="form-control" 
                       placeholder="Cari nama alumni..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Cari
                </button>
            </form>
        </div>
    </div>

    <!-- CLEAR FILTER -->
    @if(request('angkatan') || request('search'))
    <div class="mb-3">
        <a href="{{ route('alumni.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-times"></i> Reset Filter
        </a>
    </div>
    @endif

    <!-- FILTER ANGKATAN -->
    @if($alumniByAngkatan->count() > 0 && !request('search'))
    <div class="mb-4">
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('alumni.index') }}" 
               class="btn btn-outline-primary {{ !request('angkatan') ? 'active' : '' }}">
                Semua
            </a>

            @foreach($alumniByAngkatan->keys() as $tahun)
                <a href="{{ route('alumni.by-angkatan', $tahun) }}" 
                   class="btn btn-outline-primary {{ request('angkatan') == $tahun ? 'active' : '' }}">
                    {{ $tahun }}
                </a>
            @endforeach
        </div>
    </div>
    @endif

    <!-- INFO SEARCH -->
    @if(request('search'))
    <div class="alert alert-info">
        <i class="fas fa-search me-1"></i>
        Hasil pencarian: <strong>{{ request('search') }}</strong> 
        ({{ $alumni->count() }} data)
    </div>
    @endif

    <!-- DATA ALUMNI -->
    @if($alumni->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-user-graduate fa-3x text-muted mb-3"></i>
            <h4>Data alumni belum tersedia</h4>
        </div>
    @else

        {{-- FILTER ANGKATAN --}}
        @if(request('angkatan') && !request('search'))
            @php
                $angkatan = request('angkatan');
                $alumniList = $alumniByAngkatan[$angkatan] ?? collect();
            @endphp

            <h3 class="mb-3">Angkatan {{ $angkatan }}</h3>
            <p class="text-muted">{{ $alumniList->count() }} alumni</p>

            <div class="row">
                @foreach($alumniList as $a)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="fw-bold">
                                {{ $a->nama }}
                                <span class="badge bg-info float-end">{{ $a->tahun_lulus }}</span>
                            </h5>

                            @if($a->tempat_kerja)
                                <p class="mb-1"><i class="fas fa-briefcase text-primary"></i> {{ $a->tempat_kerja }}</p>
                            @endif

                            @if($a->jabatan)
                                <p class="mb-1"><i class="fas fa-user-tie text-success"></i> {{ $a->jabatan }}</p>
                            @endif

                            @if($a->tempat_pkl)
                                <p class="mb-2"><i class="fas fa-map-marker-alt text-warning"></i> PKL: {{ $a->tempat_pkl }}</p>
                            @endif

                            <a href="{{ route('alumni.show', $a->id) }}" class="btn btn-outline-primary w-100 btn-sm">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        {{-- SEMUA ANGKATAN --}}
        @else
            @foreach($alumniByAngkatan as $angkatan => $alumniList)
            <div class="mb-5">
                <h3 class="mb-3">
                    <i class="fas fa-users text-primary"></i>
                    Angkatan {{ $angkatan }}
                    <span class="badge bg-primary">{{ $alumniList->count() }}</span>
                </h3>

                <div class="row">
                    @foreach($alumniList as $a)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="fw-bold">{{ $a->nama }}</h5>

                                @if($a->tempat_kerja)
                                    <p class="mb-1"><i class="fas fa-briefcase text-primary"></i> {{ $a->tempat_kerja }}</p>
                                @endif

                                @if($a->jabatan)
                                    <p class="mb-2"><i class="fas fa-user-tie text-success"></i> {{ $a->jabatan }}</p>
                                @endif

                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="fas fa-graduation-cap"></i> {{ $angkatan }}
                                    </small>

                                    <a href="{{ route('alumni.show', $a->id) }}" class="btn btn-primary btn-sm">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        @endif
    @endif

    <!-- FOOTER INFO -->
    <div class="text-center mt-5 text-muted">
        <i class="fas fa-info-circle"></i>
        Total Alumni: <strong>{{ $alumni->count() }}</strong>
    </div>

</div>
@endsection
