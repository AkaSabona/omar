<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Professional Profile')</title>
<meta name="description" content="@yield('description', 'A modern professional portfolio showcasing work, projects, and skills.')">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}?v={{ filemtime(public_path('css/custom.css')) }}" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0f1419;
            --secondary-color: #4a90e2;
            --accent-color: #ff6b6b;
            --space-purple: #6c5ce7;
            --space-blue: #0984e3;
            --cosmic-pink: #fd79a8;
            --star-yellow: #fdcb6e;
            --text-dark: #ffffff;
            --text-light: #b2bec3;
            --bg-light: #2d3436;
            --gradient: linear-gradient(135deg, #0f1419 0%, #2d3436 50%, #636e72 100%);
            --space-gradient: linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 25%, #16213e 50%, #0f3460 75%, #533483 100%);
        }
        
        body {
            font-family: 'Cairo', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Cairo', sans-serif;
            font-weight: 600;
        }
        
        .navbar {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1050;
            padding: 0.6rem 0;
            border-bottom: 1px solid transparent;
            background: linear-gradient(135deg, rgba(12, 12, 12, 0.8) 0%, rgba(26, 26, 46, 0.7) 50%, rgba(83, 52, 131, 0.6) 100%);
        }
        
        .navbar-transparent {
            background: linear-gradient(135deg, rgba(12, 12, 12, 0.3) 0%, rgba(26, 26, 46, 0.2) 50%, rgba(83, 52, 131, 0.1) 100%);
            backdrop-filter: blur(25px);
            box-shadow: 0 2px 20px rgba(108, 92, 231, 0.1);
            border-bottom-color: rgba(108, 92, 231, 0.1);
        }
        
        .navbar-scrolled {
            background: linear-gradient(135deg, rgba(12, 12, 12, 0.95) 0%, rgba(26, 26, 46, 0.9) 50%, rgba(83, 52, 131, 0.8) 100%);
            backdrop-filter: blur(25px);
            box-shadow: 0 8px 32px rgba(108, 92, 231, 0.3), 0 4px 16px rgba(0, 0, 0, 0.4);
            border-bottom-color: rgba(108, 92, 231, 0.4);
            padding: 0.4rem 0;
        }
        
        .navbar-scrolled .navbar-nav .nav-link {
            color: white !important;
        }
        
        .navbar-scrolled .navbar-brand {
            color: white !important;
        }
        
        .navbar-brand {
            font-family: 'Cairo', sans-serif;
            font-weight: 700;
            font-size: 1.4rem;
            background: linear-gradient(135deg, var(--space-purple), var(--cosmic-pink), var(--star-yellow));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            letter-spacing: -0.5px;
            text-shadow: 0 0 20px rgba(108, 92, 231, 0.3);
        }
        
        .navbar-brand:hover {
            transform: scale(1.08) translateY(-2px);
            filter: brightness(1.2);
            text-shadow: 0 0 30px rgba(108, 92, 231, 0.5);
        }
        
        .navbar-brand i {
            background: linear-gradient(135deg, var(--space-blue), var(--cosmic-pink));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-right: 0.5rem;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .navbar-brand:hover i {
            transform: rotate(15deg) scale(1.1);
        }
        
        .navbar-nav {
            gap: 0.3rem;
        }
        
        .nav-link {
            font-weight: 500;
            font-size: 0.75rem;
            letter-spacing: 0.3px;
            padding: 0.5rem 0.8rem !important;
            border-radius: 8px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.85) !important;
            backdrop-filter: blur(10px);
        }
        
        .navbar-transparent .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
        }
        
        .navbar-transparent .nav-link:hover {
            color: white !important;
            background: linear-gradient(135deg, rgba(108, 92, 231, 0.2), rgba(253, 121, 168, 0.15));
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(108, 92, 231, 0.2);
        }
        
        .navbar-scrolled .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
        }
        
        .navbar-scrolled .nav-link:hover {
            color: white !important;
            background: linear-gradient(135deg, rgba(108, 92, 231, 0.3), rgba(253, 121, 168, 0.2));
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(108, 92, 231, 0.3);
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, var(--space-purple), var(--cosmic-pink));
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateX(-50%);
            border-radius: 2px;
        }
        
        .nav-link:hover::after {
            width: 80%;
        }
        
        .navbar-toggler {
            border: 1px solid rgba(108, 92, 231, 0.3);
            padding: 0.5rem;
            border-radius: 10px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(108, 92, 231, 0.1);
            backdrop-filter: blur(10px);
            color: rgba(255, 255, 255, 0.9);
        }
        
        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.2rem rgba(108, 92, 231, 0.25);
            border-color: rgba(108, 92, 231, 0.5);
        }
        
        .navbar-toggler:hover {
            background: rgba(108, 92, 231, 0.2);
            border-color: rgba(108, 92, 231, 0.5);
            transform: scale(1.05);
        }
        
        .navbar-toggler-icon {
            background-image: none;
            width: 22px;
            height: 2px;
            background: linear-gradient(135deg, var(--space-purple), var(--cosmic-pink));
            border-radius: 2px;
            position: relative;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .navbar-toggler-icon::before,
        .navbar-toggler-icon::after {
            content: '';
            position: absolute;
            width: 22px;
            height: 2px;
            background: linear-gradient(135deg, var(--space-purple), var(--cosmic-pink));
            border-radius: 2px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .navbar-toggler-icon::before {
            top: -7px;
        }
        
        .navbar-toggler-icon::after {
            bottom: -7px;
        }
        
        .nav-link-cta {
            background: linear-gradient(135deg, var(--space-purple), var(--cosmic-pink)) !important;
            color: white !important;
            border-radius: 20px !important;
            padding: 0.4rem 1.2rem !important;
            font-weight: 600 !important;
            text-transform: none !important;
            font-size: 0.75rem !important;
            margin-left: 0.5rem;
            box-shadow: 0 4px 20px rgba(108, 92, 231, 0.4), 0 0 30px rgba(253, 121, 168, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
        
        .nav-link-cta:hover {
            background: linear-gradient(135deg, var(--cosmic-pink), var(--star-yellow)) !important;
            transform: translateY(-3px) scale(1.05) !important;
            box-shadow: 0 8px 30px rgba(108, 92, 231, 0.6), 0 0 40px rgba(253, 121, 168, 0.4) !important;
            border-color: rgba(255, 255, 255, 0.2);
        }
        
        .navbar-scrolled .nav-link-cta {
            background: linear-gradient(135deg, var(--space-purple), var(--cosmic-pink)) !important;
            color: white !important;
            box-shadow: 0 4px 20px rgba(108, 92, 231, 0.5), 0 0 30px rgba(253, 121, 168, 0.3);
        }
        
        .navbar-scrolled .nav-link-cta:hover {
            background: linear-gradient(135deg, var(--cosmic-pink), var(--star-yellow)) !important;
            transform: translateY(-3px) scale(1.05) !important;
            box-shadow: 0 8px 30px rgba(108, 92, 231, 0.7), 0 0 40px rgba(253, 121, 168, 0.5) !important;
        }
        
        .navbar-scrolled .nav-link-cta::before {
            display: none;
        }
        
        @media (max-width: 991.98px) {
            .navbar {
                padding: 0.3rem 0;
                background: linear-gradient(135deg, rgba(12, 12, 12, 0.95) 0%, rgba(26, 26, 46, 0.9) 50%, rgba(83, 52, 131, 0.85) 100%);
            }
            
            .navbar-brand {
                font-size: 1.1rem;
            }
            
            .navbar-brand i {
                font-size: 1rem;
            }
            
            .nav-link {
                padding: 0.2rem 0.4rem !important;
                margin: 0.05rem 0;
                text-align: center;
                border-radius: 4px;
                font-size: 0.6rem;
                letter-spacing: 0.1px;
                background: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
            
            .nav-link:hover {
                background: linear-gradient(135deg, rgba(108, 92, 231, 0.3), rgba(253, 121, 168, 0.2)) !important;
                transform: none !important;
                box-shadow: 0 2px 10px rgba(108, 92, 231, 0.3) !important;
            }
            
            .nav-link-cta {
                margin: 0.3rem auto 0.1rem;
                display: inline-block;
                text-align: center;
                max-width: 120px;
                padding: 0.3rem 0.7rem !important;
                font-size: 0.6rem !important;
                border-radius: 15px !important;
            }
            
            .nav-link-cta:hover {
                transform: scale(1.02) !important;
                box-shadow: 0 4px 20px rgba(108, 92, 231, 0.5) !important;
            }
            
            .navbar-collapse {
                margin-top: 0.2rem;
                padding: 0.2rem 0.2rem;
                border-top: 1px solid rgba(108, 92, 231, 0.3);
                background: linear-gradient(135deg, rgba(12, 12, 12, 0.8) 0%, rgba(26, 26, 46, 0.7) 100%);
                border-radius: 6px;
                backdrop-filter: blur(15px);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            }
            
            .navbar-scrolled .navbar-collapse {
                border-top-color: rgba(108, 92, 231, 0.4);
                background: linear-gradient(135deg, rgba(12, 12, 12, 0.9) 0%, rgba(26, 26, 46, 0.8) 100%);
            }
            
            .navbar-toggler {
                border: 1px solid rgba(108, 92, 231, 0.3);
                background: rgba(108, 92, 231, 0.1);
                backdrop-filter: blur(10px);
                padding: 0.4rem 0.6rem;
            }
            
            .navbar-toggler:focus {
                box-shadow: 0 0 0 0.2rem rgba(108, 92, 231, 0.25);
            }
        }
        
        /* Extra small mobile devices */
        @media (max-width: 576px) {
            .navbar {
                padding: 0.2rem 0;
            }
            
            .navbar-brand {
                font-size: 1rem;
            }
            
            .navbar-brand i {
                font-size: 0.9rem;
            }
            
            .nav-link {
                padding: 0.15rem 0.3rem !important;
                margin: 0.03rem 0;
                font-size: 0.55rem;
                border-radius: 3px;
            }
            
            .nav-link-cta {
                margin: 0.2rem auto 0.05rem;
                max-width: 100px;
                padding: 0.2rem 0.5rem !important;
                font-size: 0.55rem !important;
                border-radius: 12px !important;
            }
            
            .navbar-collapse {
                margin-top: 0.1rem;
                padding: 0.15rem 0.15rem;
                border-radius: 4px;
            }
            
            .navbar-toggler {
                padding: 0.3rem 0.5rem;
            }
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--space-blue), var(--space-purple));
            border: none;
            padding: 12px 30px;
            font-weight: 500;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 0 20px rgba(74, 144, 226, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(74, 144, 226, 0.4), 0 0 30px rgba(108, 92, 231, 0.3);
            background: linear-gradient(135deg, var(--space-purple), var(--cosmic-pink));
        }
        
        .btn-outline-primary {
            border: 2px solid var(--secondary-color);
            color: var(--secondary-color);
            padding: 12px 30px;
            font-weight: 500;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        
        .btn-outline-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .hero-section, .modern-hero-section {
            background: var(--space-gradient);
            color: white;
            padding: 45px 0;
            position: relative;
            overflow: hidden;
            min-height: 100vh;
        }
        
        .hero-section::before, .modern-hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.15) 0%, transparent 50%),
                        radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.1) 0%, transparent 50%);
            animation: cosmicGlow 8s ease-in-out infinite alternate;
        }
        
        @keyframes cosmicGlow {
            0% { opacity: 0.8; }
            100% { opacity: 1; }
        }
        
        /* Space-themed floating elements */
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }
        
        .floating-element {
            position: absolute;
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-element.element-1 {
            width: 4px;
            height: 4px;
            background: var(--star-yellow);
            top: 20%;
            left: 10%;
            animation-delay: 0s;
            box-shadow: 0 0 10px var(--star-yellow);
        }
        
        .floating-element.element-2 {
            width: 6px;
            height: 6px;
            background: var(--cosmic-pink);
            top: 60%;
            left: 80%;
            animation-delay: 2s;
            box-shadow: 0 0 15px var(--cosmic-pink);
        }
        
        .floating-element.element-3 {
            width: 3px;
            height: 3px;
            background: var(--space-blue);
            top: 80%;
            left: 20%;
            animation-delay: 4s;
            box-shadow: 0 0 8px var(--space-blue);
        }
        
        .floating-element.element-4 {
            width: 5px;
            height: 5px;
            background: var(--space-purple);
            top: 30%;
            left: 70%;
            animation-delay: 1s;
            box-shadow: 0 0 12px var(--space-purple);
        }
        
        .floating-element.element-5 {
            width: 2px;
            height: 2px;
            background: white;
            top: 50%;
            left: 50%;
            animation-delay: 3s;
            box-shadow: 0 0 6px white;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(120deg); }
            66% { transform: translateY(10px) rotate(240deg); }
        }
        
        /* Astronaut-themed particles */
        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(2px 2px at 20px 30px, white, transparent),
                radial-gradient(2px 2px at 40px 70px, white, transparent),
                radial-gradient(1px 1px at 90px 40px, white, transparent),
                radial-gradient(1px 1px at 130px 80px, white, transparent),
                radial-gradient(2px 2px at 160px 30px, white, transparent);
            background-repeat: repeat;
            background-size: 200px 100px;
            animation: sparkle 3s linear infinite;
        }
        
        @keyframes sparkle {
            from { transform: translateX(0); }
            to { transform: translateX(-200px); }
        }
        
        /* Planet-like elements */
        .hero-section::after, .modern-hero-section::after {
            content: '';
            position: absolute;
            top: 10%;
            right: 5%;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle at 30% 30%, var(--cosmic-pink), var(--space-purple));
            border-radius: 50%;
            opacity: 0.6;
            animation: planetRotate 20s linear infinite;
        }
        
        @keyframes planetRotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .section-padding {
            padding: 80px 0;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .footer {
            background: var(--primary-color);
            color: white;
            padding: 50px 0 30px;
        }
        
        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: var(--secondary-color);
            color: white;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background: var(--accent-color);
            transform: translateY(-3px);
            color: #fff !important; /* Keep icon/text white on hover */
        }
        
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }

        /* Desktop hero background image */
        .modern-hero-section {
            background: url('/storage/summernote-images/cover%201Cover%202.png') center top / cover no-repeat, var(--space-gradient) !important;
            color: white;
            padding: 25px 0;
            position: relative;
            overflow: hidden;
        }
        
        /* Desktop-specific styling (won't affect mobile) */
        @media (min-width: 769px) {
            .modern-hero-section {
                height: 600px; /* Adjust this value to change desktop banner height */
                margin-top: 0px; /* Adjust this value to change top margin */
                margin-bottom: 100px; /* Adjust this value to change bottom margin */
                padding: 40px 0;
            }
        }
        
        /* Mobile hero background - completely separate styling */
        @media (max-width: 768px) {
            .modern-hero-section {
                background: url('/storage/summernote-images/cover%201Cover%202.png') center center / contain no-repeat, var(--space-gradient) !important;
                background-size: contain !important;
                background-position: center center !important;
                padding: 0px 0;
                min-height: 60vh;
                height: 75vh;
            margin-top: -70px;
    
            }
        }
        
        @media (max-width: 576px) {
            .modern-hero-section {
                background: url(/storage/summernote-images/cover%201Cover%202.png) center center / contain no-repeat, var(--space-gradient) !important;
                background-size: contain !important;
                background-position: center center !important;
                padding: 1px 0;
                height: 63vh;
                margin-top: -90px;
            }
        }
        
        /* Disable animated overlays for homepage hero */
        .modern-hero-section::before,
        .modern-hero-section::after {
            display: none !important;
            content: none !important;
            background: none !important;
            animation: none !important;
        }
        .modern-hero-section .hero-background,
        .modern-hero-section .space-background {
            display: none !important;
        }
        
        /* Featured Client Work responsive font sizes */
        @media (max-width: 992px) {
            .section-title {
                font-size: 2.5rem !important;
            }
        }
        
        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem !important;
            }
        }
        
        @media (max-width: 576px) {
            .section-title {
                font-size: 1.75rem !important;
            }
        }
        
        /* Hide scroll down indicator on mobile devices */
        @media (max-width: 768px) {
            .scroll-down-indicator {
                display: none !important;
            }
        }
        
        /* Add margin-top for container position-relative on mobile */
        @media (max-width: 768px) {
            .container.position-relative {
                margin-top: -160px !important;
            }
        }
        
        /* Hide transition-wave element on mobile devices */
        @media (max-width: 768px) {
            .transition-wave {
                display: none !important;
            }
        }
        
        /* Portfolio showcase section mobile styles */
        @media (max-width: 768px) {
            .portfolio-showcase-section {
                padding: 0px 0 !important;
                position: relative !important;
                overflow: hidden !important;
                background: linear-gradient(135deg, #0f1419 0%, #1a2332 50%, #2c3e50 100%) !important;
                color: white !important;
                margin-top: -151px !important;
                padding-top: 215px !important;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-pen-nib me-2"></i>Omar Gamal
            </a>
            
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#professional-experience">Experiences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#featured-client-work">Featured Client Work</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#clients-past-work-section">Brands</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link nav-link-cta" href="{{ route('home') }}#cta-section">Get Quote</a>
                    </li>
                </ul>
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
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <h5>Omar - Professional Copywriter</h5>
                    <p class="mb-3">Crafting compelling content that drives results and transforms businesses through strategic copywriting and digital content creation.</p>
                </div>
                <div class="col-lg-6 mb-4">
                    <h5>Connect With Me</h5>
                    <div class="social-links mb-3">
                        <a href="https://facebook.com/omargamal48/" target="_blank" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/omar-gamal-139060218/" target="_blank" title="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="mailto:cwomar.gamal@gmail.com" title="Email">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a href="tel:01064034376" title="Phone">
                            <i class="fas fa-phone"></i>
                        </a>
                    </div>
                    <p class="mb-0">Let's create something amazing together!</p>
                </div>
            </div>
            <hr class="my-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; {{ date('Y') }} Omar Gamal - Professional Copywriter. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">Made with <i class="fas fa-heart text-danger"></i> by <a href="https://facebook.com/hesham.naeem.16/" target="_blank" title="Facebook - Hesham Naeem">Hesham Naeem</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const target = document.querySelector(targetId);
                if (target) {
                    // Get navbar height
                    const navbar = document.querySelector('.navbar');
                    const navbarHeight = navbar ? navbar.offsetHeight : 20;
                    
                    // Calculate target position
                    const targetTop = target.offsetTop;
                    const scrollPosition = targetTop - navbarHeight - 10;
                    
                    // Smooth scroll to position
                    window.scrollTo({
                        top: Math.max(0, scrollPosition),
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Animate elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        }, observerOptions);
        
        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });
        
        // Navbar background on scroll
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            
            if (window.scrollY > 50) {
                navbar.classList.remove('navbar-transparent');
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
                navbar.classList.add('navbar-transparent');
            }
        });
        
        // Initialize navbar as transparent
        document.addEventListener('DOMContentLoaded', () => {
            const navbar = document.querySelector('.navbar');
            navbar.classList.add('navbar-transparent');
        });
    </script>
    
    @stack('scripts')
</body>
</html>