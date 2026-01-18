<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeRPL - @yield('title')</title>
    
    <!-- HAPUS SEMUA LINK BREEZE, PAKAI INI SAJA -->
    <style>
        /* CSS SEMENTARA LANGSUNG DI HEAD */
        :root {
            --primary-color: #2563eb;
            --secondary-color: #3b82f6;
            --light-blue: #dbeafe;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --white: #ffffff;
            --gray: #64748b;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--light-color);
            color: var(--dark-color);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* NAVBAR */
        .navbar {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .nav-brand {
            font-size: 24px;
            font-weight: bold;
        }
        
        .nav-brand a {
            text-decoration: none;
            color: var(--dark-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .text-primary {
            color: var(--primary-color);
        }
        
        /* HERO SECTION */
        .hero {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--white) 0%, var(--light-blue) 100%);
        }
        
        .hero .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
        }
        
        .hero-content {
            flex: 1;
        }
        
        .hero-title {
            font-size: 48px;
            margin-bottom: 20px;
        }
        
        .hero-subtitle {
            display: block;
            font-size: 20px;
            color: var(--gray);
            font-weight: normal;
            margin-top: 10px;
        }
        
        .hero-description {
            font-size: 18px;
            color: var(--gray);
            margin-bottom: 30px;
            max-width: 600px;
        }
        
        .hero-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 28px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
        }
        
        .btn-secondary {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .btn-secondary:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
        }
        
        .hero-image {
            flex: 1;
            display: flex;
            justify-content: center;
        }
        
        .hero-placeholder {
            width: 350px;
            height: 350px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
        
        .hero-placeholder i {
            font-size: 120px;
            opacity: 0.9;
        }
        
        /* STATISTICS */
        .statistics {
            padding: 60px 0;
            background-color: var(--white);
        }
        
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 900px;
            margin: 0 auto;
        }
        
        .stat-card {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2);
        }
        
        .stat-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }
        
        .stat-number {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 16px;
            opacity: 0.9;
        }
        
        /* FOOTER */
        .footer {
            background-color: var(--dark-color);
            color: white;
            padding: 50px 0 20px;
            margin-top: 60px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .footer-section h3 {
            font-size: 20px;
            margin-bottom: 20px;
            color: white;
        }
        
        .footer-section h3 i {
            color: var(--primary-color);
            margin-right: 10px;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.7);
        }
        
        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero .container {
                flex-direction: column;
                text-align: center;
            }
            
            .hero-title {
                font-size: 36px;
            }
            
            .hero-buttons {
                justify-content: center;
                flex-wrap: wrap;
            }
            
            .hero-placeholder {
                width: 280px;
                height: 280px;
            }
        }
    </style>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @yield('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-brand">
                <a href="{{ route('home') }}">
                    <i class="fas fa-code"></i>
                    <span>Code<span class="text-primary">RPL</span></span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3><i class="fas fa-code"></i> CodeRPL</h3>
                    <p>Platform informasi alumni dan industri PKL untuk Jurusan Rekayasa Perangkat Lunak SMKN 1 Denpasar.</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} CodeRPL - SMKN 1 Denpasar. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Simple JavaScript for mobile menu
        document.addEventListener('DOMContentLoaded', function() {
            console.log('CodeRPL loaded successfully!');
        });
    </script>
    
    @yield('scripts')
</body>
</html>