@extends('layouts.coderpl')

@section('title', 'Home')

@section('content')
<!-- HERO -->
<section class="bg-gradient-to-br from-white to-blue-100 py-20">
    <div class="max-w-7xl mx-auto px-24 pr-2 grid md:grid-cols-2 gap-12 items-center">

        <!-- Text -->
        <div>
            <h1 class="text-5xl font-bold text-slate-800">
                RI<span class="text-blue-600">CH</span>
                <span class="block text-xl text-slate-500 font-normal mt-4">
                    RPL Industry & Career Hub
                </span>
            </h1>

            <p class="mt-6 text-lg text-slate-600 max-w-xl">
                Alumni & Industri PKL – Platform resmi untuk informasi alumni dan daftar industri PKL bagi siswa Jurusan RPL SMKN 1 Denpasar.
            </p>

            <div class="flex flex-wrap gap-4 mt-8">
                <a href="{{ route('alumni.index') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
                    <i class="fas fa-user-graduate"></i>
                    Lihat Alumni
                </a>

                <a href="{{ route('industri.index') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-blue-500 text-white font-semibold hover:bg-blue-600 transition">
                    <i class="fas fa-industry"></i>
                    Lihat Industri
                </a>
            </div>
        </div>

        <!-- Image -->
        <div class="flex justify-center">
            <div class="w-72 h-72 md:w-96 md:h-96 rounded-2xl bg-gradient-to-br from-blue-600 to-blue-400 flex items-center justify-center text-white shadow-xl">
                <i class="fas fa-laptop-code text-7xl"></i>
            </div>
        </div>

    </div>
</section>

<!-- STATISTICS -->
<section class="bg-white py-16">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-3 gap-8">

        <div class="bg-blue-600 text-white rounded-xl p-8 text-center shadow-lg">
            <i class="fas fa-user-graduate text-4xl mb-4"></i>
            <h3 class="text-4xl font-bold">{{ $totalAlumni ?? 0 }}+</h3>
            <p class="mt-2">Alumni RPL</p>
        </div>

        <div class="bg-blue-500 text-white rounded-xl p-8 text-center shadow-lg">
            <i class="fas fa-industry text-4xl mb-4"></i>
            <h3 class="text-4xl font-bold">{{ $totalIndustri ?? 0 }}+</h3>
            <p class="mt-2">Industri PKL</p>
        </div>

        <div class="bg-blue-400 text-white rounded-xl p-8 text-center shadow-lg">
            <i class="fas fa-check-circle text-4xl mb-4"></i>
            <h3 class="text-4xl font-bold">{{ $industriTersedia ?? 0 }}+</h3>
            <p class="mt-2">Kuota Tersedia</p>
        </div>

    </div>
</section>
@endsection
