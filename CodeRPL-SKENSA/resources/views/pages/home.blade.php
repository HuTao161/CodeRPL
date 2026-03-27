{{-- home.blade.php --}}
@extends('layouts.coderpl')

@section('title', 'Home - RICH: RPL Industry & Career Hub')

@section('content')
{{-- ============================================ --}}
{{-- Floating Dark Mode & Scroll Top Buttons      --}}
{{-- ============================================ --}}
<button id="darkModeToggle" class="fixed bottom-6 right-6 z-50 w-12 h-12 rounded-full bg-white dark:bg-slate-800 shadow-lg flex items-center justify-center text-slate-800 dark:text-white hover:scale-110 transition-transform duration-300" aria-label="Dark mode toggle">
    <i class="fas fa-moon dark:hidden"></i>
    <i class="fas fa-sun hidden dark:inline-block"></i>
</button>

<button id="scrollTopBtn" class="fixed bottom-6 right-20 z-50 w-12 h-12 rounded-full bg-blue-600 shadow-lg flex items-center justify-center text-white hover:bg-blue-700 transition-all duration-300 opacity-0 invisible" aria-label="Scroll to top">
    <i class="fas fa-arrow-up"></i>
</button>

{{-- ============================================ --}}
{{-- 1. HERO SECTION – IMPACTFUL & DYNAMIC        --}}
{{-- ============================================ --}}
<section class="relative min-h-screen flex items-center overflow-hidden bg-gradient-hero" id="hero">
    {{-- Animated background particles / blurs --}}
    <div class="absolute inset-0 opacity-40">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
        <div class="absolute top-1/3 right-1/4 w-96 h-96 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-1/4 left-1/3 w-96 h-96 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-16">
            {{-- Left content --}}
            <div class="lg:w-1/2 text-center lg:text-left">
                <div class="inline-flex items-center gap-3 bg-white/10 backdrop-blur-md rounded-full px-5 py-2 mb-8 border border-white/20">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                    </span>
                    <span class="text-white/90 text-sm font-medium tracking-wide">SMKN 1 Denpasar – SKENSA</span>
                </div>

                <h1 class="font-display text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight mb-6">
                    RPL Industry & 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-blue-400">Career Hub</span>
                </h1>
                
                <p class="text-blue-100 text-lg md:text-xl leading-relaxed max-w-xl mx-auto lg:mx-0 mb-8">
                    Jembatan antara siswa RPL SMK Negeri 1 Denpasar dengan industri teknologi terbaik. 
                    Temukan pengalaman PKL yang membangun karir masa depan.
                </p>

                <div class="flex flex-wrap justify-center lg:justify-start gap-4">
                    <a href="{{ route('industri.index') }}" 
                       class="group relative inline-flex items-center gap-2 px-8 py-4 bg-white text-blue-900 font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <i class="fas fa-industry"></i>
                        Jelajahi Industri
                        <i class="fas fa-arrow-right ml-1 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <a href="#testimonials" 
                       class="inline-flex items-center gap-2 px-8 py-4 bg-white/10 backdrop-blur-sm border border-white/20 text-white font-semibold rounded-xl hover:bg-white/20 transition-all duration-300">
                        <i class="fas fa-users"></i>
                        Cerita Alumni
                    </a>
                </div>
            </div>

            {{-- Right visual with floating stats cards --}}
            <div class="lg:w-1/2 relative">
                <div class="relative w-full h-[400px] md:h-[500px]">
                    {{-- Main visual card --}}
                    <div class="absolute inset-0 bg-white/5 backdrop-blur-xl rounded-3xl border border-white/20 shadow-2xl flex items-center justify-center overflow-hidden">
                        <i class="fas fa-laptop-code text-8xl text-white/70"></i>
                    </div>
                    
                    {{-- Floating card 1 --}}
                    <div class="absolute -top-8 -left-8 md:-top-12 md:-left-12 bg-white/90 dark:bg-slate-800/90 backdrop-blur-md rounded-2xl p-5 shadow-xl animate-float">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/50 rounded-full flex items-center justify-center">
                                <i class="fas fa-user-graduate text-blue-600 dark:text-blue-400 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-slate-800 dark:text-white">{{ $totalAlumni ?? 250 }}+</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Alumni Sukses</p>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Floating card 2 --}}
                    <div class="absolute -bottom-8 -right-8 md:-bottom-12 md:-right-12 bg-white/90 dark:bg-slate-800/90 backdrop-blur-md rounded-2xl p-5 shadow-xl animate-float animation-delay-2000">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/50 rounded-full flex items-center justify-center">
                                <i class="fas fa-building text-emerald-600 dark:text-emerald-400 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-slate-800 dark:text-white">{{ $totalIndustri ?? 40 }}+</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Mitra Industri</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce cursor-pointer" onclick="window.scrollTo({top: window.innerHeight, behavior: 'smooth'})">
        <svg class="w-6 h-6 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

{{-- ============================================ --}}
{{-- 2. VALUE PROPOSITION – WHY CHOOSE US         --}}
{{-- ============================================ --}}
<section class="py-24 bg-white dark:bg-slate-900 transition-colors duration-300">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-blue-600 dark:text-blue-400 font-semibold uppercase tracking-wider text-sm">Keunggulan Program</span>
            <h2 class="font-display text-3xl md:text-4xl font-bold text-slate-800 dark:text-white mt-3">Mengapa PKL di RPL SKENSA?</h2>
            <p class="text-slate-600 dark:text-slate-300 mt-4">Kami menghubungkan Anda dengan pengalaman industri nyata yang membangun fondasi karir.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $features = [
                    ['icon' => 'fas fa-briefcase', 'title' => 'Mitra Industri Terkurasi', 'desc' => 'Bekerja sama dengan perusahaan teknologi terkemuka di Bali dan nasional.'],
                    ['icon' => 'fas fa-chalkboard-user', 'title' => 'Mentorship Expert', 'desc' => 'Dibimbing langsung oleh praktisi industri berpengalaman.'],
                    ['icon' => 'fas fa-rocket', 'title' => 'Proyek Nyata', 'desc' => 'Terlibat dalam pengembangan aplikasi riil yang digunakan masyarakat.'],
                    ['icon' => 'fas fa-handshake', 'title' => 'Penempatan Kerja', 'desc' => 'Peluang penyerapan tenaga kerja setelah lulus.'],
                    ['icon' => 'fas fa-certificate', 'title' => 'Sertifikasi Kompetensi', 'desc' => 'Sertifikat diakui industri sebagai bekal karir.'],
                    ['icon' => 'fas fa-globe', 'title' => 'Jaringan Alumni Luas', 'desc' => 'Komunitas alumni yang tersebar di berbagai perusahaan teknologi.'],
                ];
            @endphp

            @foreach($features as $feature)
                <div class="group bg-white dark:bg-slate-800/50 rounded-2xl p-6 shadow-card hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-slate-100 dark:border-slate-700">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/30 dark:to-indigo-900/30 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                        <i class="{{ $feature['icon'] }} text-2xl text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-2">{{ $feature['title'] }}</h3>
                    <p class="text-slate-600 dark:text-slate-300">{{ $feature['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================ --}}
{{-- 3. SOCIAL PROOF – TESTIMONIAL ALUMNI         --}}
{{-- ============================================ --}}
<section id="testimonials" class="py-24 bg-slate-50 dark:bg-slate-800/50 transition-colors duration-300">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-blue-600 dark:text-blue-400 font-semibold uppercase tracking-wider text-sm">Sukses Story</span>
            <h2 class="font-display text-3xl md:text-4xl font-bold text-slate-800 dark:text-white mt-3">Apa Kata Alumni Kami?</h2>
            <p class="text-slate-600 dark:text-slate-300 mt-4">Pengalaman nyata yang menginspirasi dari lulusan RPL yang telah sukses di industri.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Testimonial 1 --}}
            <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-card border border-slate-100 dark:border-slate-700 relative">
                <div class="absolute -top-4 left-6 text-6xl text-blue-200 dark:text-blue-800">“</div>
                <div class="pt-6">
                    <p class="text-slate-600 dark:text-slate-300 italic mb-6">"PKL di PT. Bali Digital Solution membuka mata saya tentang dunia kerja sebenarnya. Saya sekarang bekerja sebagai full-stack developer berkat pengalaman dan koneksi yang saya dapat."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-full flex items-center justify-center text-white font-bold">IA</div>
                        <div>
                            <h4 class="font-bold text-slate-800 dark:text-white">I Made Arya</h4>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Fullstack Developer, PT. Bali Digital Solution</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Testimonial 2 --}}
            <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-card border border-slate-100 dark:border-slate-700 relative">
                <div class="absolute -top-4 left-6 text-6xl text-blue-200 dark:text-blue-800">“</div>
                <div class="pt-6">
                    <p class="text-slate-600 dark:text-slate-300 italic mb-6">"Mentorship dari industri partner sangat membantu. Saya mendapat tawaran kerja sebelum lulus. Program RPL benar-benar mempersiapkan karir."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-full flex items-center justify-center text-white font-bold">NP</div>
                        <div>
                            <h4 class="font-bold text-slate-800 dark:text-white">Ni Putu Ayu</h4>
                            <p class="text-sm text-slate-500 dark:text-slate-400">UI/UX Designer, Codewave Technology</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Testimonial 3 --}}
            <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-card border border-slate-100 dark:border-slate-700 relative">
                <div class="absolute -top-4 left-6 text-6xl text-blue-200 dark:text-blue-800">“</div>
                <div class="pt-6">
                    <p class="text-slate-600 dark:text-slate-300 italic mb-6">"Sistem PKL di RPL sangat terstruktur. Saya mendapat pengalaman mengerjakan proyek startup yang akhirnya menjadi portofolio kuat untuk kuliah di luar negeri."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full flex items-center justify-center text-white font-bold">KW</div>
                        <div>
                            <h4 class="font-bold text-slate-800 dark:text-white">Ketut Widya</h4>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Mahasiswa ITB, Ex-PKL Dewata Creative</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================ --}}
{{-- 4. FEATURED INDUSTRIES (Premium Cards)      --}}
{{-- ============================================ --}}
<section class="py-24 bg-white dark:bg-slate-900 transition-colors duration-300">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-blue-600 dark:text-blue-400 font-semibold uppercase tracking-wider text-sm">Mitra Unggulan</span>
            <h2 class="font-display text-3xl md:text-4xl font-bold text-slate-800 dark:text-white mt-3">Industri Tempat Kamu Berkembang</h2>
            <p class="text-slate-600 dark:text-slate-300 mt-4">Perusahaan mitra yang telah membuka peluang untuk siswa RPL SKENSA.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $industries = [
                    ['name' => 'PT. Bali Digital Solution', 'type' => 'Software House', 'icon' => '💻', 'tech' => ['Laravel', 'React', 'Flutter'], 'bg' => 'from-blue-100 to-blue-200'],
                    ['name' => 'Codewave Technology', 'type' => 'Startup', 'icon' => '🚀', 'tech' => ['Node.js', 'Vue.js', 'MongoDB'], 'bg' => 'from-green-100 to-green-200'],
                    ['name' => 'Dewata Creative Studio', 'type' => 'Digital Agency', 'icon' => '🎨', 'tech' => ['Figma', 'WordPress', 'PHP'], 'bg' => 'from-purple-100 to-purple-200'],
                ];
            @endphp

            @foreach($industries as $industry)
                <div class="group bg-white dark:bg-slate-800 rounded-2xl overflow-hidden shadow-card hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-slate-100 dark:border-slate-700">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-16 h-16 bg-gradient-to-br {{ $industry['bg'] }} dark:from-blue-900/30 dark:to-indigo-900/30 rounded-xl flex items-center justify-center text-3xl">
                                {{ $industry['icon'] }}
                            </div>
                            <span class="px-3 py-1 bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-xs font-medium rounded-full">{{ $industry['type'] }}</span>
                        </div>
                        <h3 class="font-display text-xl font-bold text-slate-800 dark:text-white mb-2">{{ $industry['name'] }}</h3>
                        <p class="text-slate-600 dark:text-slate-300 text-sm mb-4">Mitra PKL yang menyediakan mentor profesional dan proyek industri nyata.</p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            @foreach($industry['tech'] as $tech)
                                <span class="px-2 py-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-xs rounded-md">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <a href="{{ route('industri.index') }}" class="inline-flex items-center justify-center w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 rounded-xl font-medium hover:shadow-lg transition-all group-hover:gap-2">
                            <span>Lihat Detail</span>
                            <i class="fas fa-arrow-right ml-1 transition-transform group-hover:translate-x-1"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('industri.index') }}" class="inline-flex items-center gap-2 text-blue-600 dark:text-blue-400 font-semibold hover:gap-3 transition-all">
                Lihat Semua Mitra Industri
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

{{-- ============================================ --}}
{{-- 5. CALL TO ACTION – NEWSLETTER SIGNUP       --}}
{{-- ============================================ --}}
<section class="py-24 bg-gradient-to-r from-blue-900 to-indigo-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-4">Siap Memulai Karir Digital?</h2>
            <p class="text-blue-100 text-lg mb-8">Dapatkan informasi terbaru tentang industri, event, dan peluang PKL langsung di inbox kamu.</p>
            <form class="flex flex-col sm:flex-row gap-3 max-w-lg mx-auto" action="#" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Email kamu" required class="flex-1 px-6 py-4 rounded-xl bg-white/10 border border-white/20 text-white placeholder:text-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <button type="submit" class="px-8 py-4 bg-white text-blue-900 font-semibold rounded-xl hover:shadow-lg transition-all hover:-translate-y-0.5">Berlangganan</button>
            </form>
            <p class="text-blue-200 text-sm mt-4">No spam, hanya info bermanfaat.</p>
        </div>
    </div>
</section>

{{-- ============================================ --}}
{{-- 6. MODERN FOOTER – INFORMATIF & ELEGAN       --}}
{{-- ============================================ --}}
<footer class="bg-slate-900 text-white pt-16 pb-8">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div>
                <h3 class="font-display text-2xl font-bold mb-4">RICH</h3>
                <p class="text-slate-400 text-sm">RPL Industry & Career Hub – Membangun koneksi antara siswa RPL dan industri teknologi.</p>
            </div>
            <div>
                <h4 class="font-semibold text-lg mb-4">Tautan Cepat</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('industri.index') }}" class="text-slate-400 hover:text-white transition">Industri</a></li>
                    <li><a href="#testimonials" class="text-slate-400 hover:text-white transition">Testimonial</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-white transition">Tentang Kami</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-white transition">Kontak</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-lg mb-4">Program</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-slate-400 hover:text-white transition">PKL Industri</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-white transition">Mentorship</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-white transition">Sertifikasi</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-lg mb-4">Ikuti Kami</h4>
                <div class="flex gap-4">
                    <a href="#" class="text-slate-400 hover:text-white transition"><i class="fab fa-instagram text-2xl"></i></a>
                    <a href="#" class="text-slate-400 hover:text-white transition"><i class="fab fa-linkedin text-2xl"></i></a>
                    <a href="#" class="text-slate-400 hover:text-white transition"><i class="fab fa-youtube text-2xl"></i></a>
                </div>
            </div>
        </div>
        <div class="border-t border-slate-800 mt-12 pt-8 text-center text-slate-500 text-sm">
            &copy; {{ date('Y') }} RPL SMK Negeri 1 Denpasar. All rights reserved.
        </div>
    </div>
</footer>

{{-- ============================================ --}}
{{-- ADDITIONAL STYLES & SCRIPTS                 --}}
{{-- ============================================ --}}
<style>
    /* Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,600;14..32,700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap');
    
    :root {
        --font-sans: 'Inter', sans-serif;
        --font-serif: 'Playfair Display', serif;
    }

    body {
        font-family: var(--font-sans);
    }

    .font-display {
        font-family: var(--font-serif);
    }

    /* Custom gradients & animations */
    .bg-gradient-hero {
        background: radial-gradient(circle at 20% 30%, rgba(10, 22, 40, 1) 0%, rgba(30, 58, 95, 1) 100%);
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

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-4000 {
        animation-delay: 4s;
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .animate-float {
        animation: float 4s ease-in-out infinite;
    }

    /* Card shadow premium */
    .shadow-card {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
    }

    /* Scroll reveal animations */
    .scroll-reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }

    .scroll-reveal.revealed {
        opacity: 1;
        transform: translateY(0);
    }

    /* Dark mode styles */
    .dark {
        color-scheme: dark;
    }

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
    .dark ::-webkit-scrollbar-track {
        background: #1e293b;
    }
    .dark ::-webkit-scrollbar-thumb {
        background: #60a5fa;
    }

    /* ===== FIX: Dark mode overrides for Tailwind classes (because CDN lacks dark: variant) ===== */
    .dark .bg-white { background-color: #1e293b; }
    .dark .bg-slate-50 { background-color: #0f172a; }
    .dark .bg-slate-100 { background-color: #1e293b; }
    .dark .bg-slate-200 { background-color: #334155; }
    .dark .bg-slate-800 { background-color: #1e293b; }
    .dark .bg-slate-800\\/90 { background-color: rgba(30, 41, 59, 0.9); }
    .dark .bg-slate-800\\/50 { background-color: rgba(30, 41, 59, 0.5); }
    .dark .bg-slate-900 { background-color: #0f172a; }
    .dark .bg-blue-900\\/30 { background-color: rgba(30, 58, 138, 0.3); }
    .dark .bg-indigo-900\\/30 { background-color: rgba(49, 46, 129, 0.3); }
    .dark .bg-emerald-900\\/50 { background-color: rgba(6, 78, 59, 0.5); }
    .dark .bg-blue-900\\/50 { background-color: rgba(30, 58, 138, 0.5); }
    .dark .bg-slate-700 { background-color: #334155; }
    .dark .border-slate-100 { border-color: #334155; }
    .dark .border-slate-200 { border-color: #334155; }
    .dark .border-slate-700 { border-color: #334155; }
    .dark .text-white { color: #f1f5f9; }
    .dark .text-slate-800 { color: #f1f5f9; }
    .dark .text-slate-600 { color: #cbd5e1; }
    .dark .text-slate-500 { color: #94a3b8; }
    .dark .text-slate-300 { color: #cbd5e1; }
    .dark .text-blue-400 { color: #60a5fa; }
    .dark .text-blue-600 { color: #60a5fa; }
    .dark .text-blue-700 { color: #93c5fd; }
    .dark .text-blue-300 { color: #93c5fd; }
    .dark .text-emerald-400 { color: #34d399; }
    .dark .text-emerald-600 { color: #34d399; }
    .dark .text-purple-600 { color: #c084fc; }
    .dark .from-blue-100 { --tw-gradient-from: #1e293b; --tw-gradient-to: rgba(30, 41, 59, 0); --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to); }
    .dark .to-blue-200 { --tw-gradient-to: #334155; }
    .dark .from-green-100 { --tw-gradient-from: #1e293b; --tw-gradient-to: rgba(30, 41, 59, 0); }
    .dark .to-green-200 { --tw-gradient-to: #334155; }
    .dark .from-purple-100 { --tw-gradient-from: #1e293b; --tw-gradient-to: rgba(30, 41, 59, 0); }
    .dark .to-purple-200 { --tw-gradient-to: #334155; }
    .dark .from-blue-50 { --tw-gradient-from: #1e293b; --tw-gradient-to: rgba(30, 41, 59, 0); }
    .dark .to-indigo-50 { --tw-gradient-to: #1e293b; }
    .dark .from-blue-900\\/30 { --tw-gradient-from: rgba(30, 58, 138, 0.3); --tw-gradient-to: rgba(30, 58, 138, 0); }
    .dark .to-indigo-900\\/30 { --tw-gradient-to: rgba(49, 46, 129, 0.3); }
    .dark .bg-gradient-to-r { background-image: linear-gradient(to right, var(--tw-gradient-stops)); }
    .dark .from-blue-600 { --tw-gradient-from: #2563eb; }
    .dark .to-indigo-600 { --tw-gradient-to: #4f46e5; }
    /* Ensure hover effects work */
    .dark .hover\\:bg-slate-700:hover { background-color: #334155; }
    .dark .hover\\:text-white:hover { color: #ffffff; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ========== DARK MODE ==========
        const darkModeToggle = document.getElementById('darkModeToggle');
        const htmlElement = document.documentElement;
        
        // Check saved preference or system preference
        const isDark = localStorage.getItem('theme') === 'dark' || 
                      (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches);
        
        if (isDark) {
            htmlElement.classList.add('dark');
            // Update icon visibility manually because Tailwind's dark: classes are not working
            const moonIcon = darkModeToggle.querySelector('.fa-moon');
            const sunIcon = darkModeToggle.querySelector('.fa-sun');
            if (moonIcon) moonIcon.classList.add('hidden');
            if (sunIcon) sunIcon.classList.remove('hidden');
        } else {
            htmlElement.classList.remove('dark');
            const moonIcon = darkModeToggle.querySelector('.fa-moon');
            const sunIcon = darkModeToggle.querySelector('.fa-sun');
            if (moonIcon) moonIcon.classList.remove('hidden');
            if (sunIcon) sunIcon.classList.add('hidden');
        }
        
        darkModeToggle.addEventListener('click', () => {
            if (htmlElement.classList.contains('dark')) {
                htmlElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                const moonIcon = darkModeToggle.querySelector('.fa-moon');
                const sunIcon = darkModeToggle.querySelector('.fa-sun');
                if (moonIcon) moonIcon.classList.remove('hidden');
                if (sunIcon) sunIcon.classList.add('hidden');
            } else {
                htmlElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                const moonIcon = darkModeToggle.querySelector('.fa-moon');
                const sunIcon = darkModeToggle.querySelector('.fa-sun');
                if (moonIcon) moonIcon.classList.add('hidden');
                if (sunIcon) sunIcon.classList.remove('hidden');
            }
        });

        // ========== SCROLL REVEAL ==========
        const revealElements = document.querySelectorAll('section:not(#hero) > .container, .grid > div');
        revealElements.forEach(el => {
            if (!el.classList.contains('scroll-reveal')) {
                el.classList.add('scroll-reveal');
            }
        });

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));

        // ========== SCROLL TOP BUTTON ==========
        const scrollTopBtn = document.getElementById('scrollTopBtn');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 500) {
                scrollTopBtn.classList.remove('opacity-0', 'invisible');
                scrollTopBtn.classList.add('opacity-100', 'visible');
            } else {
                scrollTopBtn.classList.add('opacity-0', 'invisible');
                scrollTopBtn.classList.remove('opacity-100', 'visible');
            }
        });
        
        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // ========== SMOOTH SCROLL FOR ANCHOR LINKS ==========
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // ========== NAVBAR SCROLL EFFECT ==========
        const navbar = document.querySelector('nav');
        if (navbar) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.classList.add('bg-white/80', 'dark:bg-slate-900/80', 'backdrop-blur-md', 'shadow-lg');
                } else {
                    navbar.classList.remove('bg-white/80', 'dark:bg-slate-900/80', 'backdrop-blur-md', 'shadow-lg');
                }
            });
        }

        // ========== PRELOADER / FADE IN ==========
        document.body.style.opacity = '0';
        document.body.style.transition = 'opacity 0.5s ease';
        window.addEventListener('load', () => {
            document.body.style.opacity = '1';
        });
    });
</script>
@endsection