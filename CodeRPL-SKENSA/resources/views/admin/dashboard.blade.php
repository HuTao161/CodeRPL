<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background: #343a40;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .container {
            padding: 20px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 15px;
        }
        .logout-btn {
            background: #dc3545;
            border: none;
            color: white;
            padding: 8px 14px;
            border-radius: 4px;
            cursor: pointer;
        }
        .logout-btn:hover {
            background: #c82333;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div>
            <strong>Admin Dashboard</strong>
        </div>

        <!-- Logout Form -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                Logout
            </button>
        </form>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="card">
            <h2>Selamat datang, {{ auth()->user()->name }}</h2>
            <p>Role: <strong>{{ auth()->user()->role }}</strong></p>
        </div>

        <div class="card">
            <p>Total Alumni: <strong>{{ $totalAlumni }}</strong></p>
            <p>Total Industri: <strong>{{ $totalIndustri }}</strong></p>
            <p>Industri Tersedia: <strong>{{ $industriTersedia }}</strong></p>
        </div>
    </div>

</body>
</html>
