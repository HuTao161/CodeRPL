<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Industri - RPL Industry & Career Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .font-playfair {
            font-family: 'Playfair Display', serif;
        }
        .gradient-hero {
            background: linear-gradient(135deg, #0a1628 0%, #1e3a5f 50%, #2d5a87 100%);
        }
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(30, 58, 95, 0.25);
        }
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #60a5fa, #93c5fd);
            transition: width 0.3s ease;
        }
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
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
        }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="font-playfair text-xl font-bold text-white">RICH</h1>
                        <p class="text-xs text-blue-200">RPL Industry & Career Hub</p>
                    </div>
                </div>
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ url('/') }}" class="nav-link text-white font-medium" data-page="home">Beranda</a>
                    <a href="{{ route('industri.index') }}" class="nav-link text-white font-medium active" data-page="industry">Industri</a>
                    <a href="{{ route('alumni.index') }}" class="nav-link text-white font-medium" data-page="alumni">Alumni</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="gradient-hero pt-32 pb-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center">
                <span class="text-blue-300 font-medium uppercase tracking-wider text-sm">Daftar Industri</span>
                <h1 class="font-playfair text-4xl md:text-5xl font-bold text-white mt-3">Mitra Industri PKL</h1>
                <p class="text-blue-100 mt-4 max-w-2xl mx-auto">Temukan industri yang sesuai dengan minat dan passion Anda untuk pengalaman PKL terbaik</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Search & Filter -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-12 -mt-16 relative z-10">
                <form action="{{ route('industri.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1 relative">
                        <svg class="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input 
                            type="text" 
                            name="search" 
                            placeholder="Cari industri..." 
                            class="w-full pl-12 pr-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            value="{{ request('search') }}"
                        >
                    </div>
                    
                    <select name="bidang" class="px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" onchange="this.form.submit()">
                        <option value="">Semua Bidang</option>
                        @foreach(['IT', 'Software House', 'Multimedia', 'Telekomunikasi', 'Startup', 'Lainnya'] as $bidang)
                            <option value="{{ $bidang }}" {{ request('bidang') == $bidang ? 'selected' : '' }}>{{ $bidang }}</option>
                        @endforeach
                    </select>
                    
                    <select name="status" class="px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="tersedia" {{ request('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="penuh" {{ request('status') == 'penuh' ? 'selected' : '' }}>Penuh</option>
                    </select>
                    
                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition-all">
                        Cari
                    </button>
                    
                    @if(request()->hasAny(['search', 'bidang', 'status']))
                        <a href="{{ route('industri.index') }}" class="px-4 py-3 border border-slate-300 text-slate-700 rounded-xl font-medium hover:bg-slate-50 transition-all">
                            Reset
                        </a>
                    @endif
                </form>
            </div>

            <!-- Stats Summary -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-slate-800">{{ $totalIndustri }}</p>
                            <p class="text-sm text-slate-500">Total Industri</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-slate-800">{{ $kuotaTersedia }}</p>
                            <p class="text-sm text-slate-500">Kuota Tersedia</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-slate-800">{{ $industriTersedia }}</p>
                            <p class="text-sm text-slate-500">Industri Tersedia</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Industry Grid -->
            @if($industris->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($industris as $index => $industri)
                        <div class="industry-card bg-white rounded-2xl overflow-hidden card-hover animate-fade-in-up delay-{{ ($index % 4 + 1) * 100 }}">
                            <div class="p-6">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center text-3xl">
                                        @if($industri->logo)
                                            <img src="{{ asset('storage/' . $industri->logo) }}" alt="{{ $industri->nama_industri }}" class="w-12 h-12 object-contain">
                                        @else
                                            @switch($industri->bidang)
                                                @case('Software House')
                                                    💻
                                                    @break
                                                @case('Startup')
                                                    🚀
                                                    @break
                                                @case('Multimedia')
                                                    🎨
                                                    @break
                                                @case('IT')
                                                    🏢
                                                    @break
                                                @case('Telekomunikasi')
                                                    📡
                                                    @break
                                                @default
                                                    🏭
                                            @endswitch
                                        @endif
                                    </div>
                                    <div class="flex flex-col items-end gap-2">
                                        <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-medium rounded-full">
                                            {{ $industri->bidang }}
                                        </span>
                                        @if($industri->status == 'tersedia')
                                            <span class="px-3 py-1 bg-green-50 text-green-700 text-xs font-medium rounded-full">
                                                Tersedia
                                            </span>
                                        @else
                                            <span class="px-3 py-1 bg-red-50 text-red-700 text-xs font-medium rounded-full">
                                                Penuh
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <h3 class="font-playfair text-xl font-bold text-slate-800 mb-2">{{ $industri->nama_industri }}</h3>
                                
                                <p class="text-slate-600 text-sm mb-4 line-clamp-3">{{ $industri->deskripsi }}</p>
                                
                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center gap-2 text-sm text-slate-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        </svg>
                                        <span class="line-clamp-1">{{ $industri->alamat }}</span>
                                    </div>
                                    
                                    <div class="flex items-center gap-2 text-sm text-slate-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                        <span>{{ $industri->kontak }}</span>
                                    </div>
                                    
                                    <div class="flex items-center justify-between text-sm">
                                        <div class="flex items-center gap-2 text-slate-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span>Kuota: {{ $industri->kuota_terisi }}/{{ $industri->kuota_pkl }}</span>
                                        </div>
                                        
                                        <div class="relative">
                                            @php
                                                $percentage = $industri->kuota_pkl > 0 ? ($industri->kuota_terisi / $industri->kuota_pkl) * 100 : 0;
                                            @endphp
                                            <div class="w-16 h-2 bg-slate-200 rounded-full overflow-hidden">
                                                <div 
                                                    class="h-full rounded-full {{ $percentage >= 80 ? 'bg-red-500' : ($percentage >= 50 ? 'bg-yellow-500' : 'bg-green-500') }}"
                                                    style="width: {{ $percentage }}%"
                                                ></div>
                                            </div>
                                            <span class="text-xs text-slate-500">{{ round($percentage) }}%</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="pt-4 border-t border-slate-100">
                                    @if($industri->status == 'tersedia')
                                        <a href="#" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-xl text-center block transition-all">
                                            Ajukan PKL
                                        </a>
                                    @else
                                        <button class="w-full bg-slate-200 text-slate-500 font-medium py-3 px-4 rounded-xl text-center cursor-not-allowed" disabled>
                                            Kuota Penuh
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-12">
                    {{ $industris->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="w-24 h-24 mx-auto mb-6 bg-slate-100 rounded-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-playfair text-2xl font-bold text-slate-800 mb-2">Industri tidak ditemukan</h3>
                    <p class="text-slate-600 mb-6">Tidak ada industri yang sesuai dengan kriteria pencarian Anda.</p>
                    <a href="{{ route('industri.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-xl font-medium hover:bg-blue-700 transition-all">
                        Reset Pencarian
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-playfair text-xl font-bold">RICH</h3>
                            <p class="text-slate-400 text-sm">RPL Industry & Career Hub</p>
                        </div>
                    </div>
                    <p class="text-slate-400 max-w-md">Platform resmi untuk siswa RPL SMK Negeri 1 Denpasar dalam menemukan mitra industri dan inspirasi dari alumni sukses.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Navigasi</h4>
                    <ul class="space-y-3 text-slate-400">
                        <li><a href="{{ url('/') }}" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="{{ route('industri.index') }}" class="hover:text-white transition-colors">Industri</a></li>
                        <li><a href="{{ route('alumni.index') }}" class="hover:text-white transition-colors">Alumni</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-3 text-slate-400">
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Denpasar, Bali
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            rpl@smkn1denpasar.sch.id
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-800 mt-12 pt-8 text-center text-slate-500">
                <p>© {{ date('Y') }} RICH - RPL Industry & Career Hub. SMK Negeri 1 Denpasar.</p>
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('nav');
            const navLinks = document.querySelectorAll('.nav-link');
            const navTitle = document.querySelector('.font-playfair');
            const navSubtitle = document.querySelector('.text-blue-200');
            
            if (window.scrollY > 50) {
                navbar.classList.add('glass-effect', 'shadow-lg');
                navbar.classList.remove('bg-transparent');
                navLinks.forEach(link => {
                    link.classList.remove('text-white');
                    link.classList.add('text-slate-800');
                });
                navTitle.classList.remove('text-white');
                navTitle.classList.add('text-slate-800');
                navSubtitle.classList.remove('text-blue-200');
                navSubtitle.classList.add('text-slate-500');
            } else {
                navbar.classList.remove('glass-effect', 'shadow-lg');
                navbar.classList.add('bg-transparent');
                navLinks.forEach(link => {
                    link.classList.add('text-white');
                    link.classList.remove('text-slate-800');
                });
                navTitle.classList.add('text-white');
                navTitle.classList.remove('text-slate-800');
                navSubtitle.classList.add('text-blue-200');
                navSubtitle.classList.remove('text-slate-500');
            }
        });
    </script>
</body>
</html>