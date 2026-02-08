<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard Guru RPL
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

                <!-- LEFT TEXT -->
                <div>
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        <span class="text-blue-600">RICH</span> Teacher Dashboard
                    </h1>

                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        RPL Industry & Career Hub — Platform resmi untuk guru memantau alumni,
                        industri PKL, dan data siswa jurusan RPL SMKN 1 Denpasar.
                    </p>

                    <div class="flex gap-4">
                        <a href="{{ route('alumni.index') }}"
                           class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                           👨‍🎓 Lihat Alumni
                        </a>

                        <a href="{{ route('industri.index') }}"
                           class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
                           🏭 Lihat Industri
                        </a>
                    </div>
                </div>

                <!-- RIGHT BIG CARD -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-3xl p-16 flex items-center justify-center shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-32 h-32 text-white opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
