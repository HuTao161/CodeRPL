<!DOCTYPE html>
<html lang="en"><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 Not Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi fade in */
        .fade-in {
            animation: fadeIn 1s ease-in-out forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }

        /* Animasi bounce untuk tombol */
        .bounce-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen bg-gradient-to-br from-gray-800 via-gray-900 to-black text-white">

    <div class="text-center fade-in max-w-md px-4">
        <!-- Kode 404 -->
        <h1 class="text-8xl font-extrabold mb-6 text-blue-500 drop-shadow-lg">404</h1>

        <!-- Pesan -->
        <p class="text-2xl md:text-3xl mb-6 text-gray-300">
            Oops! Page not found.
        </p>

        <!-- Tombol -->
        <a href="{{ url('/') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transition-all duration-300 bounce-hover">
            Back to Home
        </a>

        <!-- Tambahan dekorasi ringan -->
        <div class="mt-10 flex justify-center space-x-4">
            <div class="w-4 h-4 bg-blue-500 rounded-full animate-bounce"></div>
            <div class="w-4 h-4 bg-green-500 rounded-full animate-bounce delay-100"></div>
            <div class="w-4 h-4 bg-pink-500 rounded-full animate-bounce delay-200"></div>
        </div>
    </div>

</body>
</html>

</html>
