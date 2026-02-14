<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeRPL - @yield('title')</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @yield('styles')
</head>
<body class="bg-slate-50 text-slate-800">

    <!-- NAVBAR -->
    <nav class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <!-- Brand -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 text-xl font-bold">
                <i class="fas fa-code text-blue-600"></i>
                <span class="inline-flex tracking-normal">
                  RI<span class="text-blue-600">CH</span>
                </span>
            </a>

            <!-- Menu -->
            <div class="hidden md:flex items-center gap-6">
                <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a>
                <a href="{{ route('industri.index') }}" class="hover:text-blue-600">Industri</a>
            </div>

            <!-- Auth Buttons -->
            <div class="flex items-center gap-3">
                @guest
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 rounded-lg border border-blue-600 text-blue-600 hover:bg-blue-50 transition">
                        Login
                    </a>
                @endguest

                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                            class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                            Dashboard
                        </a>
                    @endif

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-200 mt-16">
        <div class="max-w-7xl mx-auto px-6 py-10">
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-xl font-bold mb-2">
                        <i class="fas fa-code text-blue-500"></i>
                        RI<span class="text-blue-500">CH</span>
                    </h3>
                    <p class="text-slate-400">
                        Platform informasi alumni dan industri PKL untuk
                        Jurusan Rekayasa Perangkat Lunak SMKN 1 Denpasar.
                    </p>
                </div>
            </div>

            <div class="border-t border-slate-700 mt-8 pt-4 text-center text-slate-400 text-sm">
                © {{ date('Y') }} RICH - SMKN 1 Denpasar. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Vanilla JS -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            console.log('CodeRPL Tailwind loaded 🚀');
        });
    </script>

    @yield('scripts')
</body>
</html>
