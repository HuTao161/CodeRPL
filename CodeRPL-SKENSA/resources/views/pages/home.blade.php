@extends('layouts.coderpl')

@section('title', 'Home - RICH')

@section('content')
<!-- HERO SECTION - Diperbarui dengan desain modern -->
<section class="gradient-hero min-h-screen flex items-center relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-10 w-72 h-72 bg-blue-400 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-blue-300 rounded-full filter blur-3xl"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 py-32 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Text Content -->
            <div class="animate-fade-in-up">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm rounded-full px-4 py-2 mb-6">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    <span class="text-blue-200 text-sm font-medium">SMKN 1 Denpasar - SKENSA</span>
                </div>
                
                <h1 class="font-playfair text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                    RPL Industry & Career Hub
                </h1>
                
                <p class="text-blue-100 text-lg md:text-xl leading-relaxed mb-8 max-w-xl">
                    Platform resmi untuk siswa RPL SMK Negeri 1 Denpasar dalam menemukan mitra industri 
                    dan inspirasi dari alumni sukses. Temukan pengalaman PKL terbaik untuk karir masa depan Anda.
                </p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('industri.index') }}" 
                       class="bg-white text-blue-900 px-8 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 card-hover">
                        <i class="fas fa-industry mr-2"></i>
                        Jelajahi Industri
                    </a>
                </div>
            </div>
            
            <!-- Visual Content -->
            <div class="hidden lg:block animate-fade-in-up delay-200">
                <div class="relative">
                    <div class="w-full h-96 bg-gradient-to-br from-blue-400/20 to-blue-600/20 rounded-3xl backdrop-blur-sm border border-white/10 p-8 flex items-center justify-center">
                        <i class="fas fa-laptop-code text-9xl text-white/80"></i>
                    </div>
                    
                    <!-- Stats Card 1 -->
                    <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl p-6 shadow-xl">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user-graduate text-2xl text-blue-600"></i>
                            </div>
                            <div>
                                <p class="text-3xl font-bold text-slate-800">{{ $totalAlumni ?? 150 }}+</p>
                                <p class="text-sm text-slate-500">Alumni Sukses</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Stats Card 2 -->
                    <div class="absolute -top-6 -right-6 bg-white rounded-2xl p-6 shadow-xl">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-industry text-2xl text-green-600"></i>
                            </div>
                            <div>
                                <p class="text-3xl font-bold text-slate-800">{{ $totalIndustri ?? 25 }}+</p>
                                <p class="text-sm text-slate-500">Mitra Industri</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<!-- STATISTICS SECTION - Diperbarui -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-blue-600 font-medium uppercase tracking-wider text-sm">Prestasi & Capaian</span>
            <h2 class="font-playfair text-3xl md:text-4xl font-bold text-slate-800 mt-3">Statistik Program PKL RPL</h2>
            <p class="text-slate-600 mt-4 max-w-2xl mx-auto">
                Beberapa angka yang menunjukkan perkembangan dan keberhasilan program PKL jurusan RPL
            </p>
        </div>
        
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Stat 1 -->
            <div class="text-center p-6 rounded-2xl bg-blue-50 card-hover">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-full mb-4 shadow-sm">
                    <i class="fas fa-building text-2xl text-blue-600"></i>
                </div>
                <p class="font-playfair text-4xl md:text-5xl font-bold text-blue-900">{{ $totalIndustri ?? 25 }}+</p>
                <p class="text-slate-600 mt-2 font-medium">Mitra Industri</p>
            </div>
            
            <!-- Stat 2 -->
            <div class="text-center p-6 rounded-2xl bg-green-50 card-hover">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-full mb-4 shadow-sm">
                    <i class="fas fa-user-graduate text-2xl text-green-600"></i>
                </div>
                <p class="font-playfair text-4xl md:text-5xl font-bold text-blue-900">{{ $totalAlumni ?? 150 }}+</p>
                <p class="text-slate-600 mt-2 font-medium">Alumni PKL</p>
            </div>
            
            <!-- Stat 3 -->
            <div class="text-center p-6 rounded-2xl bg-yellow-50 card-hover">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-full mb-4 shadow-sm">
                    <i class="fas fa-star text-2xl text-yellow-600"></i>
                </div>
                <p class="font-playfair text-4xl md:text-5xl font-bold text-blue-900">{{ $tingkatKepuasan ?? 98 }}%</p>
                <p class="text-slate-600 mt-2 font-medium">Tingkat Kepuasan</p>
            </div>
            
            <!-- Stat 4 -->
            <div class="text-center p-6 rounded-2xl bg-purple-50 card-hover">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-full mb-4 shadow-sm">
                    <i class="fas fa-calendar-alt text-2xl text-purple-600"></i>
                </div>
                <p class="font-playfair text-4xl md:text-5xl font-bold text-blue-900">{{ $tahunBerjalan ?? 5 }}+</p>
                <p class="text-slate-600 mt-2 font-medium">Tahun Berjalan</p>
            </div>
        </div>
    </div>
</section>

<!-- FEATURED INDUSTRIES SECTION - Baru -->
<section class="py-20 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-blue-600 font-medium uppercase tracking-wider text-sm">Rekomendasi</span>
            <h2 class="font-playfair text-3xl md:text-4xl font-bold text-slate-800 mt-3">Industri Unggulan</h2>
            <p class="text-slate-600 mt-4 max-w-2xl mx-auto">
                Beberapa mitra industri terbaik yang memberikan pengalaman PKL berkualitas tinggi
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Featured Industry Card 1 -->
            <div class="industry-card bg-white rounded-2xl overflow-hidden card-hover animate-fade-in-up">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center text-3xl">
                            💻
                        </div>
                        <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-medium rounded-full">Software House</span>
                    </div>
                    <h3 class="font-playfair text-xl font-bold text-slate-800 mb-2">PT. Bali Digital Solution</h3>
                    <p class="text-slate-600 text-sm mb-4">Perusahaan software house terkemuka di Bali yang fokus pada pengembangan aplikasi web dan mobile.</p>
                    
                    <div class="space-y-2 mb-4">
                        <div class="flex items-center gap-2 text-sm text-slate-500">
                            <i class="fas fa-user-tie text-blue-500"></i>
                            <span>Manager: <span class="text-slate-700 font-medium">I Made Arya Widana</span></span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-slate-500">
                            <i class="fas fa-map-marker-alt text-blue-500"></i>
                            <span>Denpasar, Bali</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded-md">Laravel</span>
                        <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded-md">React</span>
                        <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded-md">Flutter</span>
                    </div>
                    
                    <a href="{{ route('industri.index') }}" class="block text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                        Lihat Detail
                    </a>
                </div>
            </div>
            
            <!-- Featured Industry Card 2 -->
            <div class="industry-card bg-white rounded-2xl overflow-hidden card-hover animate-fade-in-up delay-100">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-100 to-green-200 rounded-xl flex items-center justify-center text-3xl">
                            🚀
                        </div>
                        <span class="px-3 py-1 bg-green-50 text-green-700 text-xs font-medium rounded-full">Startup</span>
                    </div>
                    <h3 class="font-playfair text-xl font-bold text-slate-800 mb-2">Codewave Technology</h3>
                    <p class="text-slate-600 text-sm mb-4">Startup teknologi inovatif yang mengembangkan solusi digital untuk pariwisata dan UMKM Bali.</p>
                    
                    <div class="space-y-2 mb-4">
                        <div class="flex items-center gap-2 text-sm text-slate-500">
                            <i class="fas fa-user-tie text-green-500"></i>
                            <span>Manager: <span class="text-slate-700 font-medium">Ni Putu Ayu Sekar</span></span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-slate-500">
                            <i class="fas fa-map-marker-alt text-green-500"></i>
                            <span>Sanur, Bali</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded-md">Node.js</span>
                        <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded-md">Vue.js</span>
                        <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded-md">MongoDB</span>
                    </div>
                    
                    <a href="{{ route('industri.index') }}" class="block text-center bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition-colors text-sm font-medium">
                        Lihat Detail
                    </a>
                </div>
            </div>
            
            <!-- Featured Industry Card 3 -->
            <div class="industry-card bg-white rounded-2xl overflow-hidden card-hover animate-fade-in-up delay-200">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-100 to-purple-200 rounded-xl flex items-center justify-center text-3xl">
                            🎨
                        </div>
                        <span class="px-3 py-1 bg-purple-50 text-purple-700 text-xs font-medium rounded-full">Digital Agency</span>
                    </div>
                    <h3 class="font-playfair text-xl font-bold text-slate-800 mb-2">Dewata Creative Studio</h3>
                    <p class="text-slate-600 text-sm mb-4">Agensi kreatif yang menyediakan layanan desain UI/UX dan pengembangan website untuk industri pariwisata.</p>
                    
                    <div class="space-y-2 mb-4">
                        <div class="flex items-center gap-2 text-sm text-slate-500">
                            <i class="fas fa-user-tie text-purple-500"></i>
                            <span>Manager: <span class="text-slate-700 font-medium">I Gede Bagus Pratama</span></span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-slate-500">
                            <i class="fas fa-map-marker-alt text-purple-500"></i>
                            <span>Kuta, Bali</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded-md">Figma</span>
                        <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded-md">WordPress</span>
                        <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded-md">PHP</span>
                    </div>
                    
                    <a href="{{ route('industri.index') }}" class="block text-center bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('industri.index') }}" 
               class="bg-blue-900 text-white px-8 py-4 rounded-xl font-semibold hover:bg-blue-800 transition-all inline-flex items-center gap-2 card-hover">
                Lihat Semua Industri
                <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>
</section>

<!-- Tambahkan CSS tambahan untuk animasi -->
<style>
    .gradient-hero {
        background: linear-gradient(135deg, #0a1628 0%, #1e3a5f 50%, #2d5a87 100%);
    }
    
    .font-playfair {
        font-family: 'Playfair Display', serif;
    }
    
    .font-inter {
        font-family: 'Inter', sans-serif;
    }
    
    .card-hover {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px -12px rgba(30, 58, 95, 0.25);
    }
    
    .industry-card {
        border: 1px solid rgba(30, 58, 95, 0.1);
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
    }
    
    .delay-100 {
        animation-delay: 0.1s;
    }
    
    .delay-200 {
        animation-delay: 0.2s;
    }
    
    .delay-300 {
        animation-delay: 0.3s;
    }
</style>
@endsection