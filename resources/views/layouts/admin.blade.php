<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Admin Dashboard') - {{ config('app.name', 'Portfolio') }}</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #858796;
            --success-color: #1cc88a;
            --info-color: #36b9cc;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
            --light-color: #f8f9fc;
            --dark-color: #5a5c69;
        }
        
        body {
            font-family: 'Cairo', sans-serif;
            background-color: var(--light-color);
            color: var(--dark-color);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        
        *:not(.fas):not(.far):not(.fab):not(.fal):not(.fad):not([class*="fa-"]) {
            font-family: 'Cairo', sans-serif !important;
        }
        
        /* Ensure Font Awesome icons use their proper font */
        .fas, .far, .fab, .fal, .fad, [class*="fa-"] {
            font-family: "Font Awesome 6 Free", "Font Awesome 6 Pro", "Font Awesome 6 Brands" !important;
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
        }
        
        .sidebar {
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            min-height: 100vh;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15), 0 0 40px rgba(30, 41, 59, 0.1);
            width: 280px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.85);
            padding: 0.875rem 1.5rem;
            border-radius: 8px;
            margin: 0.125rem 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
            font-size: 0.95rem;
            letter-spacing: 0.025em;
            position: relative;
            overflow: hidden;
        }
        
        .sidebar .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 3px;
            height: 100%;
            background: linear-gradient(180deg, #3b82f6, #1d4ed8);
            transform: scaleY(0);
            transition: transform 0.3s ease;
            border-radius: 0 2px 2px 0;
        }
        
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(29, 78, 216, 0.1) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(59, 130, 246, 0.2);
            transform: translateX(4px);
        }
        
        .sidebar .nav-link:hover::before,
        .sidebar .nav-link.active::before {
            transform: scaleY(1);
        }
        
        .sidebar .nav-link i {
            margin-right: 0.75rem;
            width: 1.25rem;
            text-align: center;
            font-size: 1rem;
            opacity: 0.9;
        }
        
        .sidebar .nav-link:hover i,
        .sidebar .nav-link.active i {
            opacity: 1;
            transform: scale(1.1);
        }
        
        .card {
            border: none;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }
        
        .card-header {
            background-color: var(--light-color);
            border-bottom: 1px solid #e3e6f0;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            border: none;
            font-weight: 600;
            padding: 0.625rem 1.25rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }
        
        .text-primary {
            color: var(--primary-color) !important;
        }
        
        .alert {
            border-radius: 0.35rem;
        }
        
        .form-control {
            border-radius: 0.35rem;
            border: 1px solid #d1d3e2;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        
        .main-content {
            margin-left: 280px;
            padding: 0;
            width: calc(100% - 280px);
            min-height: 100vh;
            position: relative;
        }
        
        .main-content.no-sidebar {
            margin-left: 0;
            width: 100%;
        }
        
        .main-content .navbar {
            position: sticky;
            top: 0;
            z-index: 999;
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        }
        
        .navbar .dropdown-toggle {
            color: #374151 !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .navbar .dropdown-toggle:hover {
            background: rgba(59, 130, 246, 0.1);
            color: #1d4ed8 !important;
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            border-radius: 8px;
            padding: 0.5rem 0;
        }
        
        .dropdown-item {
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            background: rgba(59, 130, 246, 0.1);
            color: #1d4ed8;
        }
        
        .content-wrapper {
            padding: 2rem;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            
            .content-wrapper {
                padding: 1rem;
            }
            
            .mobile-toggle {
                display: block !important;
            }
        }
        
        .mobile-toggle {
            display: none;
        }
        
        /* Fix white text titles in admin pages */
        .content-wrapper h1,
        .content-wrapper h2,
        .content-wrapper h3,
        .content-wrapper h4,
        .content-wrapper h5,
        .content-wrapper h6 {
            color: #000000 !important;
        }
        
        .content-wrapper .card-header h1,
        .content-wrapper .card-header h2,
        .content-wrapper .card-header h3,
        .content-wrapper .card-header h4,
        .content-wrapper .card-header h5,
        .content-wrapper .card-header h6 {
            color: #000000 !important;
        }
        
        /* Fix white subtitle text in card headers */
        .content-wrapper .card-header small,
        .content-wrapper .card-header .opacity-75 {
            color: #666666 !important;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    @auth
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
            <div class="p-4 border-bottom border-secondary border-opacity-25">
                <h4 class="text-white mb-0 fw-bold">
                    <i class="fas fa-user-shield me-2 text-primary"></i>
                    <span class="fs-5">Admin Panel...</span>
                </h4>
                <p class="text-white-50 mb-0 mt-1 small">Management Dashboard</p>
            </div>
            
            <ul class="nav flex-column pt-3">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.portfolio-cards') ? 'active' : '' }}" href="{{ route('admin.portfolio-cards') }}">
                        <i class="fas fa-th-large"></i>
                        Portfolio Cards
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.experiences.*') ? 'active' : '' }}" href="{{ route('admin.experiences.index') }}">
                        <i class="fas fa-briefcase"></i>
                        Experience
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.logos.*') ? 'active' : '' }}" href="{{ route('admin.logos.index') }}">
                        <i class="fas fa-images"></i>
                        Logos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">
                        <i class="fas fa-envelope"></i>
                        Messages
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}" target="_blank">
                        <i class="fas fa-external-link-alt"></i>
                        View Website
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start" style="color: rgba(255, 255, 255, 0.8);">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
    </nav>
    
    <!-- Main Content -->
    <div class="main-content">
            <!-- Top Navigation -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
                <div class="container-fluid">
                    <button class="btn btn-primary mobile-toggle" type="button" onclick="toggleSidebar()">
                        <i class="fas fa-bars"></i>
                    </button>
                    
                    <div class="navbar-nav ms-auto">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-2"></i>{{ Auth::user()->name ?? 'Admin' }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            
        <!-- Page Content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
    @else
        @if(request()->routeIs('login'))
            <!-- Show login form for login route -->
            <div class="main-content no-sidebar">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        @else
            <!-- Access Denied for other admin routes -->
            <div class="main-content no-sidebar">
                <div class="d-flex justify-content-center align-items-center min-vh-100">
                    <div class="text-center">
                        <h3 class="text-muted mb-3">Access Denied</h3>
                        <p class="text-muted mb-4">You need to be logged in to access the admin panel.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                    </div>
                </div>
            </div>
        @endif
    @endauth
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.querySelector('.mobile-toggle');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !toggleBtn.contains(event.target)) {
                sidebar.classList.remove('show');
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>
