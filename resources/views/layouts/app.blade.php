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
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1050;
            padding: 1rem 0;
            border-bottom: 1px solid transparent;
        }
        
        .navbar-transparent {
            background: rgba(15, 20, 25, 0.1);
            backdrop-filter: blur(20px);
            box-shadow: none;
            border-bottom-color: transparent;
        }
        
        .navbar-scrolled {
            background: rgba(15, 20, 25, 0.95);
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            border-bottom-color: rgba(74, 144, 226, 0.2);
            padding: 0.75rem 0;
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
            font-size: 2rem;
            color: var(--primary-color) !important;
            text-decoration: none;
            transition: all 0.3s ease;
            letter-spacing: -0.5px;
        }
        
        .navbar-brand:hover {
            transform: scale(1.05);
        }
        
        .navbar-brand i {
            background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .navbar-nav {
            gap: 0.5rem;
        }
        
        .nav-link {
            font-weight: 500;
            font-size: 0.95rem;
            letter-spacing: 0.3px;
            padding: 0.75rem 1.25rem !important;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            text-transform: uppercase;
            font-size: 0.85rem;
        }
        
        .navbar-transparent .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
        }
        
        .navbar-transparent .nav-link:hover {
            color: white !important;
        }
        
        .navbar-scrolled .nav-link {
            color: var(--text-dark) !important;
        }
        
        .navbar-scrolled .nav-link:hover {
            color: white !important;
        }
        
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            width: 0;
            height: 2px;
            background: rgba(44, 62, 80, 0.8);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .navbar-toggler {
            border: none;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
        }
        
        .navbar-toggler-icon {
            background-image: none;
            width: 24px;
            height: 2px;
            background: currentColor;
            border-radius: 2px;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .navbar-toggler-icon::before,
        .navbar-toggler-icon::after {
            content: '';
            position: absolute;
            width: 24px;
            height: 2px;
            background: currentColor;
            border-radius: 2px;
            transition: all 0.3s ease;
        }
        
        .navbar-toggler-icon::before {
            top: -8px;
        }
        
        .navbar-toggler-icon::after {
            bottom: -8px;
        }
        
        .nav-link-cta {
            background: linear-gradient(135deg, var(--secondary-color), var(--accent-color)) !important;
            color: white !important;
            border-radius: 25px !important;
            padding: 0.6rem 1.5rem !important;
            font-weight: 600 !important;
            text-transform: none !important;
            font-size: 0.9rem !important;
            margin-left: 0.5rem;
            box-shadow: 0 2px 10px rgba(52, 152, 219, 0.3);
        }
        
        .nav-link-cta:hover {
            background: linear-gradient(135deg, var(--accent-color), var(--secondary-color)) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.4) !important;
        }
        
        .navbar-scrolled .nav-link-cta {
            background: linear-gradient(135deg, var(--secondary-color), var(--accent-color)) !important;
            color: white !important;
        }
        
        .navbar-scrolled .nav-link-cta:hover {
            background: linear-gradient(135deg, var(--accent-color), var(--secondary-color)) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.4) !important;
        }
        
        .navbar-scrolled .nav-link-cta::before {
            display: none;
        }
        
        @media (max-width: 991.98px) {
            .navbar {
                padding: 0.75rem 0;
            }
            
            .navbar-brand {
                font-size: 1.6rem;
            }
            
            .nav-link {
                padding: 0.75rem 0 !important;
                margin: 0.25rem 0;
                text-align: center;
                border-radius: 6px;
            }
            
            .nav-link-cta {
                margin: 1rem auto 0.5rem;
                display: inline-block;
                text-align: center;
                max-width: 200px;
            }
            
            .navbar-collapse {
                margin-top: 1rem;
                padding-top: 1rem;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }
            
            .navbar-scrolled .navbar-collapse {
                border-top-color: rgba(0, 0, 0, 0.1);
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
        
        /* Mobile hero background - completely separate styling */
        @media (max-width: 768px) {
            .modern-hero-section {
                background: url('/storage/summernote-images/cover%201Cover%202.png') center center / contain no-repeat, var(--space-gradient) !important;
                background-size: contain !important;
                background-position: center center !important;
                padding: 0px 0;
                min-height: 60vh;
            }
        }
        
        @media (max-width: 576px) {
            .modern-hero-section {
                background: url(/storage/summernote-images/cover%201Cover%202.png) center center / contain no-repeat, var(--space-gradient) !important;
                background-size: contain !important;
                background-position: center center !important;
                padding: 1px 0;
                margin-top: -87px;
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
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
        <div class="container">

            
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