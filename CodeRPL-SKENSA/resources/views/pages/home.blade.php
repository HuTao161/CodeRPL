@extends('layouts.coderpl')

@section('title', 'Home - CodeRPL')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                Code<span class="text-primary">RPL</span>
                <span class="hero-subtitle">Alumni & Industri PKL SMKN 1 Denpasar</span>
            </h1>
            <p class="hero-description">
                Platform informasi alumni dan daftar industri PKL untuk siswa Jurusan Rekayasa Perangkat Lunak (RPL) SMKN 1 Denpasar.
            </p>
            <div class="hero-buttons">
                <a href="{{ route('alumni.index') }}" class="btn btn-primary">
                    <i class="fas fa-user-graduate"></i> Lihat Alumni
                </a>
                <a href="{{ route('industri.index') }}" class="btn btn-secondary">
                    <i class="fas fa-industry"></i> Lihat Industri
                </a>
            </div>
        </div>
        <div class="hero-image">
            <div class="hero-placeholder">
                <i class="fas fa-laptop-code"></i>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="statistics">
    <div class="container">
        <div class="stat-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-number">{{ $totalAlumni ?? '5' }}+</h3>
                    <p class="stat-label">Alumni RPL</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-industry"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-number">{{ $totalIndustri ?? '4' }}+</h3>
                    <p class="stat-label">Industri PKL</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-number">{{ $industriTersedia ?? '3' }}+</h3>
                    <p class="stat-label">Kuota Tersedia</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection