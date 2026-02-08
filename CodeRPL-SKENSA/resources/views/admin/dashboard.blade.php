<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - RICH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            color: #334155;
        }
        
        .font-playfair {
            font-family: 'Playfair Display', serif;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #0a1628 0%, #1e3a5f 100%);
            color: white;
            position: fixed;
            height: 100vh;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            z-index: 100;
        }
        
        .sidebar-header {
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 30px;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .nav-links {
            list-style: none;
        }
        
        .nav-links li {
            margin-bottom: 8px;
        }
        
        .nav-links a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .nav-links a:hover, .nav-links a.active {
            background: rgba(255,255,255,0.1);
            color: white;
        }
        
        .nav-links i {
            width: 20px;
            text-align: center;
        }
        
        /* Main Content */
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
        }
        
        .top-nav {
            background: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 90;
        }
        
        .top-nav-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary {
            background: #3b82f6;
            color: white;
        }
        
        .btn-primary:hover {
            background: #2563eb;
        }
        
        .btn-success {
            background: #10b981;
            color: white;
        }
        
        .btn-success:hover {
            background: #059669;
        }
        
        .btn-warning {
            background: #f59e0b;
            color: white;
        }
        
        .btn-warning:hover {
            background: #d97706;
        }
        
        .btn-info {
            background: #0ea5e9;
            color: white;
        }
        
        .btn-info:hover {
            background: #0284c7;
        }
        
        .logout-btn {
            background: #ef4444;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background 0.3s;
        }
        
        .logout-btn:hover {
            background: #dc2626;
        }
        
        /* Dashboard Content */
        .dashboard-content {
            padding: 30px;
        }
        
        .page-header {
            margin-bottom: 30px;
        }
        
        .page-header h1 {
            font-size: 2rem;
            color: #1e293b;
            margin-bottom: 10px;
        }
        
        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }
        
        .stat-icon.alumni {
            background: linear-gradient(135deg, #60a5fa, #3b82f6);
            color: white;
        }
        
        .stat-icon.industri {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }
        
        .stat-icon.tersedia {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #64748b;
            font-size: 0.95rem;
        }
        
        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .quick-action-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            text-decoration: none;
            color: inherit;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #e2e8f0;
        }
        
        .quick-action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            border-color: #cbd5e1;
        }
        
        .quick-action-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 1.5rem;
        }
        
        /* CRUD Sections */
        .crud-section {
            background: white;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f1f5f9;
        }
        
        .section-header h2 {
            font-size: 1.5rem;
            color: #1e293b;
        }
        
        .btn-danger {
            background: #ef4444;
            color: white;
        }
        
        .btn-danger:hover {
            background: #dc2626;
        }
        
        /* Tables */
        .table-container {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th {
            background: #f8fafc;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #475569;
            border-bottom: 2px solid #e2e8f0;
        }
        
        td {
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
        }
        
        tr:hover {
            background: #f8fafc;
        }
        
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        
        .action-btn {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .edit-btn {
            background: #fef3c7;
            color: #92400e;
        }
        
        .edit-btn:hover {
            background: #fde68a;
        }
        
        .delete-btn {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .delete-btn:hover {
            background: #fecaca;
        }
        
        .view-btn {
            background: #dbeafe;
            color: #1e40af;
        }
        
        .view-btn:hover {
            background: #bfdbfe;
        }
        
        /* Form Styles */
        .form-container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #475569;
        }
        
        input, textarea, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            transition: border 0.3s;
        }
        
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .image-preview {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            object-fit: cover;
            margin-top: 10px;
            border: 2px dashed #cbd5e1;
        }
        
        /* Alert Messages */
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }
        
        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .nav-links {
                display: flex;
                overflow-x: auto;
                gap: 10px;
            }
            
            .nav-links li {
                flex-shrink: 0;
            }
            
            .nav-links a {
                white-space: nowrap;
            }
            
            .top-nav {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .top-nav-left {
                width: 100%;
                justify-content: space-between;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <i class="fas fa-laptop-code"></i>
                <span>RICH Admin</span>
            </div>
            <p style="margin-top: 10px; color: #94a3b8; font-size: 0.9rem;">
                SMKN 1 Denpasar - RPL
            </p>
        </div>
        
        <ul class="nav-links">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.alumni.index') }}" class="{{ request()->routeIs('admin.alumni.*') ? 'active' : '' }}">
                    <i class="fas fa-user-graduate"></i>
                    Daftar Alumni
                </a>
            </li>
            <li>
                <a href="{{ route('admin.industri.index') }}" class="{{ request()->routeIs('admin.industri.*') ? 'active' : '' }}">
                    <i class="fas fa-industry"></i>
                    Daftar Industri
                </a>
            </li>
            <li>
                <a href="{{ route('admin.industri.available') }}">
                    <i class="fas fa-check-circle"></i>
                    Industri Tersedia
                </a>
            </li>
            <li>
                <a href="{{ route('home') }}" target="_blank" class="view-site-btn">
                    <i class="fas fa-external-link-alt"></i>
                    Lihat Website
                </a>
            </li>
        </ul>
        
        <div style="position: absolute; bottom: 20px; width: calc(100% - 40px);">
            <a href="{{ route('home') }}" target="_blank" class="btn btn-info" style="width: 100%; justify-content: center;">
                <i class="fas fa-eye"></i>
                Lihat Halaman Utama
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        <nav class="top-nav">
            <div class="top-nav-left">
                <div>
                    <h2 class="font-playfair">Admin Dashboard</h2>
                    <p style="color: #64748b; font-size: 0.9rem; margin-top: 5px;">
                        Panel Administrasi RICH - RPL Industry & Career Hub
                    </p>
                </div>
                
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-warning">
                        <i class="fas fa-external-link-alt"></i>
                        Lihat Website
                    </a>
                    <a href="{{ route('alumni.index') }}" target="_blank" class="btn btn-info">
                        <i class="fas fa-user-graduate"></i>
                        Lihat Alumni
                    </a>
                    <a href="{{ route('industri.index') }}" target="_blank" class="btn btn-success">
                        <i class="fas fa-industry"></i>
                        Lihat Industri
                    </a>
                </div>
            </div>
            
            <div class="user-info">
                <div class="user-avatar">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div>
                    <p style="font-weight: 600;">{{ auth()->user()->name }}</p>
                    <p style="font-size: 0.9rem; color: #64748b;">{{ auth()->user()->role }}</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </button>
                </form>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            @yield('content')
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Delete Confirmation
        function confirmDelete(formId, name) {
            if (confirm(`Apakah Anda yakin ingin menghapus ${name}?`)) {
                document.getElementById(formId).submit();
            }
        }
        
        // Image Preview
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            const file = input.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }
        
        // Toggle Sidebar on Mobile
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('active');
        }
        
        // Auto-hide alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 300);
                }, 5000);
            });
        });
    </script>
</body>
</html>