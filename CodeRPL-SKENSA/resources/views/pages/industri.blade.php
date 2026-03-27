{{-- resources/views/industri.blade.php --}}
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Mitra Industri PKL - RPL Industry & Career Hub</title>
    <meta name="description" content="Temukan mitra industri terbaik untuk PKL RPL SMK Negeri 1 Denpasar. Daftar perusahaan teknologi, startup, dan agensi digital dengan kuota tersedia.">
    
    {{-- Tailwind CSS + Fonts --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    {{-- Font Awesome 6 (Free) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    {{-- Custom Styles --}}
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .font-display {
            font-family: 'Playfair Display', serif;
        }

        /* Custom animations */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }

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
        .fade-up {
            animation: fadeInUp 0.8s cubic-bezier(0.2, 0.9, 0.4, 1.1) forwards;
        }

        /* Glass morphism */
        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .dark .glass {
            background: rgba(15, 25, 35, 0.6);
            border-color: rgba(255, 255, 255, 0.05);
        }

        /* Scroll reveal */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }
        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        /* Card hover premium */
        .premium-card {
            transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }
        .premium-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.2);
        }

        /* Progress bar gradient */
        .progress-bar {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
        }

        /* Dark mode styles */
        .dark {
            color-scheme: dark;
        }
        .dark .bg-white { background-color: #1e293b; }
        .dark .bg-slate-50 { background-color: #0f172a; }
        .dark .bg-slate-100 { background-color: #1e293b; }
        .dark .text-slate-800 { color: #f1f5f9; }
        .dark .text-slate-600 { color: #cbd5e1; }
        .dark .text-slate-500 { color: #94a3b8; }
        .dark .border-slate-200 { border-color: #334155; }
        .dark .industry-card { border-color: #334155; }
        .dark .bg-gradient-hero { background: linear-gradient(135deg, #0a0f2a 0%, #0f2b3f 100%); }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #3b82f6;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #2563eb;
        }
    </style>
</head>
<body class="bg-white text-slate-800 dark:bg-slate-900 dark:text-white transition-colors duration-300">
    {{-- ====================== NAVIGATION ====================== --}}
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent">
        <div class="container mx-auto px-6 py-5">
            <div class="flex items-center justify-between">
                {{-- Logo & Brand --}}
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg">
                        <i class="fas fa-laptop-code text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="font-display text-xl font-bold text-white dark:text-white transition-colors">RICH</h1>
                        <p class="text-xs text-blue-200 dark:text-blue-300">RPL Industry & Career Hub</p>
                    </div>
                </div>
                
                {{-- Desktop Menu --}}
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ url('/') }}" class="nav-link text-white/90 dark:text-white/90 hover:text-white font-medium transition-all duration-300 relative group">
                        Beranda
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="{{ route('industri.index') }}" class="nav-link text-white font-medium transition-all duration-300 relative group">
                        Industri
                        <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-white"></span>
                    </a>
                </div>
                
                {{-- Dark Mode Toggle + Mobile Menu Button --}}
                <div class="flex items-center gap-4">
                    <button id="darkModeToggle" class="text-white text-xl hover:scale-110 transition-transform">
                        <i class="fas fa-moon"></i>
                    </button>
                    <button id="mobileMenuBtn" class="md:hidden text-white text-2xl">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
        
        {{-- Mobile Menu (hidden by default) --}}
        <div id="mobileMenu" class="hidden md:hidden bg-white/95 dark:bg-slate-800/95 backdrop-blur-md shadow-xl mt-2 py-4">
            <div class="flex flex-col items-center gap-4">
                <a href="{{ url('/') }}" class="text-slate-800 dark:text-white font-medium py-2">Beranda</a>
                <a href="{{ route('industri.index') }}" class="text-slate-800 dark:text-white font-medium py-2">Industri</a>
            </div>
        </div>
    </nav>

    {{-- ====================== HERO SECTION (Premium) ====================== --}}
    <section class="relative min-h-[85vh] flex items-center overflow-hidden bg-gradient-hero">
        {{-- Animated Blobs Background --}}
        <div class="absolute inset-0 opacity-40">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
            <div class="absolute top-40 right-10 w-80 h-80 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-20 left-1/3 w-80 h-80 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10 py-20">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                {{-- Left Text Content --}}
                <div class="lg:w-1/2 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md rounded-full px-5 py-2 mb-6 border border-white/20">
                        <span class="relative flex h-3 w-3">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                        </span>
                        <span class="text-white/90 text-sm font-medium tracking-wide">SMKN 1 Denpasar – SKENSA</span>
                    </div>
                    
                    <h1 class="font-display text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight mb-6">
                        Mitra Industri 
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-blue-400">PKL RPL</span>
                    </h1>
                    
                    <p class="text-blue-100 text-lg md:text-xl leading-relaxed max-w-xl mx-auto lg:mx-0 mb-8">
                        Temukan perusahaan teknologi terkemuka yang siap menjadi tempat pengembangan karirmu. 
                        Dari software house hingga startup digital, semua ada di sini.
                    </p>
                    
                    <div class="flex flex-wrap justify-center lg:justify-start gap-4">
                        <a href="#industri-list" class="group inline-flex items-center gap-2 px-8 py-4 bg-white text-blue-900 font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <i class="fas fa-building"></i>
                            Jelajahi Industri
                            <i class="fas fa-arrow-right ml-1 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="#stats" class="inline-flex items-center gap-2 px-8 py-4 bg-white/10 backdrop-blur-sm border border-white/20 text-white font-semibold rounded-xl hover:bg-white/20 transition-all duration-300">
                            <i class="fas fa-chart-line"></i>
                            Lihat Statistik
                        </a>
                    </div>
                </div>
                
                {{-- Right Visual with Floating Stats --}}
                <div class="lg:w-1/2 relative">
                    <div class="relative w-full h-[400px] md:h-[500px]">
                        {{-- Main glass card --}}
                        <div class="absolute inset-0 glass rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden">
                            <i class="fas fa-handshake text-8xl text-white/70"></i>
                        </div>
                        {{-- Floating Card 1 --}}
                        <div class="absolute -top-8 -left-8 md:-top-12 md:-left-12 bg-white/90 dark:bg-slate-800/90 backdrop-blur-md rounded-2xl p-5 shadow-xl animate-float">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/50 rounded-full flex items-center justify-center">
                                    <i class="fas fa-industry text-blue-600 dark:text-blue-400 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-2xl font-bold text-slate-800 dark:text-white">{{ $totalIndustri ?? 45 }}+</p>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">Mitra Aktif</p>
                                </div>
                            </div>
                        </div>
                        {{-- Floating Card 2 --}}
                        <div class="absolute -bottom-8 -right-8 md:-bottom-12 md:-right-12 bg-white/90 dark:bg-slate-800/90 backdrop-blur-md rounded-2xl p-5 shadow-xl animate-float animation-delay-2000">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/50 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user-check text-emerald-600 dark:text-emerald-400 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-2xl font-bold text-slate-800 dark:text-white">{{ $kuotaTersedia ?? 150 }}+</p>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">Kuota Tersedia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Scroll Indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce cursor-pointer" onclick="document.getElementById('stats').scrollIntoView({behavior: 'smooth'})">
            <i class="fas fa-chevron-down text-white/60 text-2xl"></i>
        </div>
    </section>

    {{-- ====================== BREADCRUMB ====================== --}}
    <div class="bg-slate-50 dark:bg-slate-800/50 py-4 border-b border-slate-200 dark:border-slate-700">
        <div class="container mx-auto px-6">
            <div class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                <a href="{{ url('/') }}" class="hover:text-blue-600 transition"><i class="fas fa-home mr-1"></i> Beranda</a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-slate-800 dark:text-white font-medium">Daftar Industri</span>
            </div>
        </div>
    </div>

    {{-- ====================== STATISTICS SECTION (Upgraded) ====================== --}}
    <section id="stats" class="py-16 bg-white dark:bg-slate-900 scroll-reveal">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Stat 1 --}}
                <div class="group relative bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-950/30 dark:to-indigo-950/30 rounded-2xl p-8 text-center transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-indigo-500/10 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="w-16 h-16 bg-white dark:bg-slate-800 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-md">
                        <i class="fas fa-building text-3xl text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <p class="text-4xl font-bold text-slate-800 dark:text-white mb-2">{{ $totalIndustri ?? 0 }}</p>
                    <p class="text-slate-600 dark:text-slate-300 font-medium">Total Industri Mitra</p>
                </div>
                
                {{-- Stat 2 --}}
                <div class="group relative bg-gradient-to-br from-emerald-50 to-teal-50 dark:from-emerald-950/30 dark:to-teal-950/30 rounded-2xl p-8 text-center transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div class="w-16 h-16 bg-white dark:bg-slate-800 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-md">
                        <i class="fas fa-ticket-alt text-3xl text-emerald-600 dark:text-emerald-400"></i>
                    </div>
                    <p class="text-4xl font-bold text-slate-800 dark:text-white mb-2">{{ $kuotaTersedia ?? 0 }}</p>
                    <p class="text-slate-600 dark:text-slate-300 font-medium">Kuota PKL Tersedia</p>
                </div>
                
                {{-- Stat 3 --}}
                <div class="group relative bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-950/30 dark:to-pink-950/30 rounded-2xl p-8 text-center transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div class="w-16 h-16 bg-white dark:bg-slate-800 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-md">
                        <i class="fas fa-check-circle text-3xl text-purple-600 dark:text-purple-400"></i>
                    </div>
                    <p class="text-4xl font-bold text-slate-800 dark:text-white mb-2">{{ $industriTersedia ?? 0 }}</p>
                    <p class="text-slate-600 dark:text-slate-300 font-medium">Industri Aktif Menerima</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ====================== SEARCH & FILTER SECTION (Premium) ====================== --}}
    <section class="py-8 bg-slate-50 dark:bg-slate-800/30">
        <div class="container mx-auto px-6">
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl p-6 md:p-8 -mt-12 relative z-20 scroll-reveal">
                <form action="{{ route('industri.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1 relative">
                        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="text" name="search" placeholder="Cari industri berdasarkan nama, bidang, atau lokasi..." 
                               value="{{ request('search') }}"
                               class="w-full pl-12 pr-4 py-4 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-slate-900 dark:text-white">
                    </div>
                    
                    <select name="bidang" class="px-4 py-4 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-blue-500 bg-white dark:bg-slate-900 dark:text-white" onchange="this.form.submit()">
                        <option value="">Semua Bidang</option>
                        @foreach(['IT', 'Software House', 'Multimedia', 'Telekomunikasi', 'Startup', 'Lainnya'] as $bidang)
                            <option value="{{ $bidang }}" {{ request('bidang') == $bidang ? 'selected' : '' }}>{{ $bidang }}</option>
                        @endforeach
                    </select>
                    
                    <select name="status" class="px-4 py-4 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-blue-500 bg-white dark:bg-slate-900 dark:text-white" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="tersedia" {{ request('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="penuh" {{ request('status') == 'penuh' ? 'selected' : '' }}>Penuh</option>
                    </select>
                    
                    <button type="submit" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-xl font-semibold hover:shadow-lg transition-all hover:-translate-y-0.5">
                        <i class="fas fa-filter mr-2"></i> Cari
                    </button>
                    
                    @if(request()->hasAny(['search', 'bidang', 'status']))
                        <a href="{{ route('industri.index') }}" class="px-6 py-4 border border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-300 rounded-xl font-medium hover:bg-slate-50 dark:hover:bg-slate-700 transition-all text-center">
                            Reset
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </section>

    {{-- ====================== INDUSTRY GRID (Premium Cards) ====================== --}}
    <section id="industri-list" class="py-20 bg-white dark:bg-slate-900">
        <div class="container mx-auto px-6">
            @if($industris->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($industris as $index => $industri)
                        <div class="group bg-white dark:bg-slate-800 rounded-2xl overflow-hidden premium-card border border-slate-100 dark:border-slate-700 scroll-reveal" style="transition-delay: {{ $index * 0.05 }}s">
                            <div class="p-6">
                                {{-- Header with logo and badges --}}
                                <div class="flex items-start justify-between mb-4">
                                    <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-indigo-100 dark:from-blue-900/30 dark:to-indigo-900/30 rounded-xl flex items-center justify-center text-3xl shadow-sm">
                                        @if($industri->logo)
                                            <img src="{{ asset('storage/' . $industri->logo) }}" alt="{{ $industri->nama_industri }}" class="w-12 h-12 object-contain">
                                        @else
                                            @switch($industri->bidang)
                                                @case('Software House') 💻 @break
                                                @case('Startup') 🚀 @break
                                                @case('Multimedia') 🎨 @break
                                                @case('IT') 🏢 @break
                                                @case('Telekomunikasi') 📡 @break
                                                @default 🏭
                                            @endswitch
                                        @endif
                                    </div>
                                    <div class="flex flex-col items-end gap-2">
                                        <span class="px-3 py-1 bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-xs font-medium rounded-full">
                                            {{ $industri->bidang }}
                                        </span>
                                        @if($industri->status == 'tersedia')
                                            <span class="px-3 py-1 bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-xs font-medium rounded-full">
                                                <i class="fas fa-circle text-[8px] mr-1 text-green-500"></i> Tersedia
                                            </span>
                                        @else
                                            <span class="px-3 py-1 bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-300 text-xs font-medium rounded-full">
                                                <i class="fas fa-circle text-[8px] mr-1 text-red-500"></i> Penuh
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <h3 class="font-display text-xl font-bold text-slate-800 dark:text-white mb-2 group-hover:text-blue-600 transition-colors">
                                    {{ $industri->nama_industri }}
                                </h3>
                                <p class="text-slate-600 dark:text-slate-300 text-sm mb-4 line-clamp-3">{{ $industri->deskripsi }}</p>
                                
                                {{-- Details --}}
                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
                                        <i class="fas fa-map-marker-alt w-4"></i>
                                        <span class="line-clamp-1">{{ $industri->alamat }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
                                        <i class="fas fa-phone-alt w-4"></i>
                                        <span>{{ $industri->kontak }}</span>
                                    </div>
                                </div>
                                
                                {{-- Kuota Progress --}}
                                <div class="mb-4">
                                    <div class="flex justify-between text-xs text-slate-600 dark:text-slate-400 mb-1">
                                        <span>Kuota PKL</span>
                                        <span>{{ $industri->kuota_terisi }}/{{ $industri->kuota_pkl }}</span>
                                    </div>
                                    @php $percent = $industri->kuota_pkl > 0 ? ($industri->kuota_terisi / $industri->kuota_pkl) * 100 : 0; @endphp
                                    <div class="w-full h-2 bg-slate-200 dark:bg-slate-700 rounded-full overflow-hidden">
                                        <div class="progress-bar h-full rounded-full" style="width: {{ $percent }}%"></div>
                                    </div>
                                </div>
                                
                                {{-- CTA Button --}}
                                <div class="pt-4">
                                    @if($industri->status == 'tersedia')
                                        <a href="#" class="block w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-3 px-4 rounded-xl text-center transition-all duration-300 transform hover:-translate-y-0.5">
                                            Ajukan PKL <i class="fas fa-arrow-right ml-1"></i>
                                        </a>
                                    @else
                                        <button class="w-full bg-slate-200 dark:bg-slate-700 text-slate-500 dark:text-slate-400 font-medium py-3 px-4 rounded-xl cursor-not-allowed" disabled>
                                            Kuota Penuh
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                {{-- Pagination with Tailwind Styling --}}
                <div class="mt-12">
                    {{ $industris->links() }}
                </div>
            @else
                {{-- Empty State Enhanced --}}
                <div class="text-center py-20">
                    <div class="w-28 h-28 mx-auto mb-6 bg-slate-100 dark:bg-slate-800 rounded-full flex items-center justify-center">
                        <i class="fas fa-building text-5xl text-slate-400"></i>
                    </div>
                    <h3 class="font-display text-2xl font-bold text-slate-800 dark:text-white mb-2">Belum Ada Industri</h3>
                    <p class="text-slate-600 dark:text-slate-300 mb-6 max-w-md mx-auto">Belum ada industri yang sesuai dengan kriteria pencarian Anda. Coba filter lain atau reset pencarian.</p>
                    <a href="{{ route('industri.index') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-medium transition">
                        <i class="fas fa-sync-alt"></i> Reset Pencarian
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- ====================== FOOTER (Premium & Informative) ====================== --}}
    <footer class="bg-slate-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                {{-- Brand Column --}}
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center">
                            <i class="fas fa-laptop-code text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-display text-xl font-bold">RICH</h3>
                            <p class="text-slate-400 text-sm">RPL Industry & Career Hub</p>
                        </div>
                    </div>
                    <p class="text-slate-400 mb-6">Membangun jembatan antara siswa RPL SMK Negeri 1 Denpasar dengan industri teknologi terbaik.</p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 hover:bg-blue-600 flex items-center justify-center transition-colors"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 hover:bg-blue-600 flex items-center justify-center transition-colors"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 hover:bg-blue-600 flex items-center justify-center transition-colors"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                {{-- Quick Links --}}
                <div>
                    <h4 class="font-semibold text-lg mb-4">Navigasi</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ url('/') }}" class="text-slate-400 hover:text-white transition"><i class="fas fa-chevron-right text-xs mr-2"></i> Beranda</a></li>
                        <li><a href="{{ route('industri.index') }}" class="text-slate-400 hover:text-white transition"><i class="fas fa-chevron-right text-xs mr-2"></i> Industri</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition"><i class="fas fa-chevron-right text-xs mr-2"></i> Tentang Kami</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition"><i class="fas fa-chevron-right text-xs mr-2"></i> Hubungi Kami</a></li>
                    </ul>
                </div>
                
                {{-- Program --}}
                <div>
                    <h4 class="font-semibold text-lg mb-4">Program</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-slate-400 hover:text-white transition"><i class="fas fa-chevron-right text-xs mr-2"></i> PKL Industri</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition"><i class="fas fa-chevron-right text-xs mr-2"></i> Mentorship</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition"><i class="fas fa-chevron-right text-xs mr-2"></i> Sertifikasi</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition"><i class="fas fa-chevron-right text-xs mr-2"></i> Workshop</a></li>
                    </ul>
                </div>
                
                {{-- Kontak & Newsletter --}}
                <div>
                    <h4 class="font-semibold text-lg mb-4">Kontak</h4>
                    <ul class="space-y-3 text-slate-400">
                        <li class="flex items-center gap-2"><i class="fas fa-map-marker-alt w-5"></i> Denpasar, Bali</li>
                        <li class="flex items-center gap-2"><i class="fas fa-envelope w-5"></i> rpl@smkn1denpasar.sch.id</li>
                        <li class="flex items-center gap-2"><i class="fas fa-phone-alt w-5"></i> +62 361 123456</li>
                    </ul>
                    <div class="mt-6">
                        <h5 class="font-medium mb-2">Newsletter</h5>
                        <form class="flex" action="#" method="POST">
                            <input type="email" placeholder="Email kamu" class="flex-1 px-4 py-2 rounded-l-lg bg-slate-800 border border-slate-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <button type="submit" class="bg-blue-600 px-4 rounded-r-lg hover:bg-blue-700 transition"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-slate-800 mt-12 pt-8 text-center text-slate-500 text-sm">
                <p>&copy; {{ date('Y') }} RICH - RPL Industry & Career Hub. SMK Negeri 1 Denpasar. All rights reserved.</p>
            </div>
        </div>
    </footer>

    {{-- ====================== SCRIPTS ====================== --}}
    <script>
        // Dark Mode Toggle
        const darkModeToggle = document.getElementById('darkModeToggle');
        const htmlElement = document.documentElement;
        
        // Check for saved theme or system preference
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            htmlElement.classList.add('dark');
            darkModeToggle.innerHTML = '<i class="fas fa-sun"></i>';
        } else {
            htmlElement.classList.remove('dark');
            darkModeToggle.innerHTML = '<i class="fas fa-moon"></i>';
        }
        
        darkModeToggle.addEventListener('click', () => {
            if (htmlElement.classList.contains('dark')) {
                htmlElement.classList.remove('dark');
                localStorage.theme = 'light';
                darkModeToggle.innerHTML = '<i class="fas fa-moon"></i>';
            } else {
                htmlElement.classList.add('dark');
                localStorage.theme = 'dark';
                darkModeToggle.innerHTML = '<i class="fas fa-sun"></i>';
            }
        });
        
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white/80', 'dark:bg-slate-900/80', 'backdrop-blur-md', 'shadow-lg');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('bg-white/80', 'dark:bg-slate-900/80', 'backdrop-blur-md', 'shadow-lg');
                navbar.classList.add('bg-transparent');
            }
        });
        
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
        
        // Scroll Reveal using Intersection Observer
        const revealElements = document.querySelectorAll('.scroll-reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
        
        revealElements.forEach(el => observer.observe(el));
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
        
        // Add a simple loading animation (remove if needed)
        document.body.style.opacity = '0';
        document.body.style.transition = 'opacity 0.5s ease';
        window.addEventListener('load', () => {
            document.body.style.opacity = '1';
        });
    </script>
    
    {{-- Additional styling for pagination (Tailwind compatible) --}}
    <style>
        /* Pagination styling */
        .pagination {
            @apply flex justify-center gap-2;
        }
        .pagination .page-item {
            @apply list-none;
        }
        .pagination .page-link {
            @apply px-4 py-2 rounded-lg bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-700 hover:bg-blue-50 dark:hover:bg-slate-700 transition;
        }
        .pagination .active .page-link {
            @apply bg-blue-600 text-white border-blue-600;
        }
        .pagination .disabled .page-link {
            @apply opacity-50 cursor-not-allowed;
        }
    </style>
</body>
</html>