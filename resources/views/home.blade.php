@extends('layouts.app')

@section('title', 'Professional Copywriter & Digital Content Creator')
@section('description', 'Senior Copywriter and Digital Content Creator specializing in compelling web copy, email marketing, and content strategy that drives results.')

@push('styles')
<style>
    @if(isset($animationData))
    .scroll-scale {
        animation-duration: {{ $animationData['animation_duration'] }}s;
        animation-delay: {{ $animationData['animation_delay'] }}s;
    }
    @endif
    
    /* Rich Content Styles for TinyMCE Output */
    .rich-content {
        line-height: 1.6;
    }
    
    .rich-content h1, .rich-content h2, .rich-content h3, 
    .rich-content h4, .rich-content h5, .rich-content h6 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }
    
    .rich-content h1 { font-size: 2rem; }
    .rich-content h2 { font-size: 1.75rem; }
    .rich-content h3 { font-size: 1.5rem; }
    .rich-content h4 { font-size: 1.25rem; }
    .rich-content h5 { font-size: 1.1rem; }
    .rich-content h6 { font-size: 1rem; }
    
    .rich-content p {
        margin-bottom: 1rem;
    }
    
    .rich-content ul, .rich-content ol {
        margin-bottom: 1rem;
        padding-left: 2rem;
    }
    
    .rich-content li {
        margin-bottom: 0.5rem;
    }
    
    .rich-content blockquote {
        border-left: 4px solid #007bff;
        padding-left: 1rem;
        margin: 1.5rem 0;
        font-style: italic;
        background-color: #f8f9fa;
        padding: 1rem;
        border-radius: 0.25rem;
    }
    
    .rich-content img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5rem;
        margin: 1rem 0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .rich-content table {
        width: 100%;
        border-collapse: collapse;
        margin: 1rem 0;
    }
    
    .rich-content table th,
    .rich-content table td {
        border: 1px solid #dee2e6;
        padding: 0.75rem;
        text-align: left;
    }
    
    .rich-content table th {
        background-color: #f8f9fa;
        font-weight: 600;
    }
    
    .rich-content code {
        background-color: #f8f9fa;
        padding: 0.2rem 0.4rem;
        border-radius: 0.25rem;
        font-family: 'Courier New', monospace;
        font-size: 0.9em;
    }
    
    .rich-content pre {
        background-color: #f8f9fa;
        padding: 1rem;
        border-radius: 0.5rem;
        overflow-x: auto;
        margin: 1rem 0;
    }
    
    .rich-content pre code {
        background: none;
        padding: 0;
    }
    
    .rich-content a {
        color: #007bff;
        text-decoration: none;
    }
    
    .rich-content a:hover {
        text-decoration: underline;
    }
    
    .rich-content strong, .rich-content b {
        font-weight: 600;
    }
    
    .rich-content em, .rich-content i {
        font-style: italic;
    }
    
    .rich-content hr {
        border: none;
        border-top: 2px solid #dee2e6;
        margin: 2rem 0;
    }
    
    /* Custom Modal Styles */
    .modal-lg {
        max-width: 1200px !important;
    }
    
    @media (min-width: 1200px) {
        .modal-lg {
            max-width: 1400px !important;
        }
    }
    
    @media (max-width: 768px) {
        .modal-lg {
            max-width: 95% !important;
            margin: 10px auto;
        }
    }
    
    /* Astronaut Testimonials Section */
    .astronaut-testimonials-section {
        position: relative;
        background: linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 25%, #16213e 50%, #0f3460 75%, #533483 100%);
        overflow: hidden;
        color: white;
    }
    
    .astronaut-testimonials-section .space-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }
    
    .astronaut-testimonials-section .container {
        position: relative;
        z-index: 2;
    }
    
    .astronaut-testimonials-section .stars-layer {
        position: absolute;
        width: 100%;
        height: 100%;
    }
    
    .astronaut-testimonials-section .star {
        position: absolute;
        background: white;
        border-radius: 50%;
        animation: twinkle 3s infinite;
    }
    
    .astronaut-testimonials-section .star:nth-child(1) {
        width: 2px;
        height: 2px;
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }
    
    .astronaut-testimonials-section .star:nth-child(2) {
        width: 3px;
        height: 3px;
        top: 15%;
        left: 80%;
        animation-delay: 1s;
    }
    
    .astronaut-testimonials-section .star:nth-child(3) {
        width: 1px;
        height: 1px;
        top: 60%;
        left: 15%;
        animation-delay: 2s;
    }
    
    .astronaut-testimonials-section .star:nth-child(4) {
        width: 2px;
        height: 2px;
        top: 80%;
        left: 70%;
        animation-delay: 0.5s;
    }
    
    .astronaut-testimonials-section .star:nth-child(5) {
        width: 3px;
        height: 3px;
        top: 30%;
        left: 50%;
        animation-delay: 1.5s;
    }
    
    .astronaut-testimonials-section .star:nth-child(6) {
        width: 1px;
        height: 1px;
        top: 70%;
        left: 90%;
        animation-delay: 2.5s;
    }
    
    .astronaut-testimonials-section .star:nth-child(7) {
        width: 2px;
        height: 2px;
        top: 10%;
        left: 30%;
        animation-delay: 3s;
    }
    
    .astronaut-testimonials-section .star:nth-child(8) {
        width: 1px;
        height: 1px;
        top: 90%;
        left: 20%;
        animation-delay: 0.8s;
    }
    
    .astronaut-testimonials-section .star:nth-child(9) {
        width: 3px;
        height: 3px;
        top: 40%;
        left: 85%;
        animation-delay: 1.8s;
    }
    
    .astronaut-testimonials-section .star:nth-child(10) {
        width: 2px;
        height: 2px;
        top: 85%;
        left: 60%;
        animation-delay: 2.2s;
    }
    
    .astronaut-testimonials-section .nebula-layer {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 20% 30%, rgba(138, 43, 226, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(75, 0, 130, 0.2) 0%, transparent 50%),
            radial-gradient(circle at 60% 20%, rgba(255, 20, 147, 0.1) 0%, transparent 40%);
        animation: nebula-drift 20s ease-in-out infinite;
    }
    
    .astronaut-testimonials-section .floating-debris {
        position: absolute;
        width: 100%;
        height: 100%;
    }
    
    .astronaut-testimonials-section .debris {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: debris-float 15s linear infinite;
    }
    
    .astronaut-testimonials-section .debris-1 {
        width: 4px;
        height: 4px;
        top: 25%;
        left: -5%;
        animation-duration: 20s;
    }
    
    .astronaut-testimonials-section .debris-2 {
        width: 6px;
        height: 6px;
        top: 65%;
        left: -5%;
        animation-duration: 25s;
        animation-delay: 5s;
    }
    
    .astronaut-testimonials-section .debris-3 {
        width: 3px;
        height: 3px;
        top: 45%;
        left: -5%;
        animation-duration: 18s;
        animation-delay: 10s;
    }
    
    .astronaut-testimonials-section .card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
    }
    
    .astronaut-testimonials-section .text-muted {
        color: rgba(255, 255, 255, 0.7) !important;
    }
    
    @keyframes twinkle {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 1; transform: scale(1.2); }
    }
    
    @keyframes nebula-drift {
        0%, 100% { transform: translateX(0) translateY(0); }
        25% { transform: translateX(10px) translateY(-5px); }
        50% { transform: translateX(-5px) translateY(10px); }
        75% { transform: translateX(-10px) translateY(-10px); }
    }
    
    @keyframes debris-float {
        0% { transform: translateX(0) translateY(0) rotate(0deg); }
        100% { transform: translateX(100vw) translateY(-20px) rotate(360deg); }
    }
    
    /* Remove gap between sections */
    .astronaut-testimonials-section {
        margin-bottom: 0;
        padding-bottom: 0;
    }
    
    .cta-section {
        margin-top: 0;
        padding-top: 0;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="modern-hero-section">
    <div class="hero-background">
        <div class="floating-elements">
            <div class="floating-element element-1"></div>
            <div class="floating-element element-2"></div>
            <div class="floating-element element-3"></div>
            <div class="floating-element element-4"></div>
            <div class="floating-element element-5"></div>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6">
                <div class="hero-content scroll-slide-left">
                    <div class="mb-4 scroll-fade-in">
                    </div>
                    <h1 class="hero-title mb-4 scroll-animate">
                        {!! $heroData['title'] !!}
                    </h1>
                    <p class="hero-subtitle mb-5 scroll-animate">
                        {{ $heroData['subtitle'] }}
                    </p>
                    <div class="hero-stats mb-5 scroll-animate">
                        <div class="row">
                            <div class="col-4">
                                <div class="stat-item scroll-scale">
                                    <div class="stat-number">{{ $siteSettings->projects_count ?? '150+' }}</div>
                                    <div class="stat-label">Projects</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item scroll-scale">
                                    <div class="stat-number">{{ $siteSettings->avg_increase ?? '86%' }}</div>
                                    <div class="stat-label">Avg. Increase</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item scroll-scale">
                                    <div class="stat-number">{{ $siteSettings->years_experience ?? '6+' }}</div>
                                    <div class="stat-label">Years Exp.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-visual scroll-slide-right">
                    <div class="profile-card {{ $animationData['scroll_scale_enabled'] ? 'scroll-scale' : '' }}">
                        <div class="profile-image-wrapper">
                            <img src="{{ asset($heroData['image']) }}" alt="Professional Profile" class="profile-image">
                            <div class="profile-badge">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                        <div class="profile-info">
                            <h4 class="cairo-font">{{ $siteSettings->profile_name ?? 'Omar Gamal' }}</h4>
                            <p>{{ $siteSettings->profile_title ?? 'Senior Copywriter' }}</p>
                            <div class="profile-skills">
                                @if($siteSettings && $siteSettings->profile_skills)
                                    @foreach($siteSettings->profile_skills as $skill)
                                        <span class="skill-tag">{{ $skill }}</span>
                                    @endforeach
                                @else
                                    <span class="skill-tag">Web Copy</span>
                                    <span class="skill-tag">Email Marketing</span>
                                    <span class="skill-tag">Content Strategy</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Cool Transition Effect -->
    <div class="hero-to-portfolio-transition">
        <div class="transition-wave"></div>
        <div class="transition-particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="transition-shapes">
            <div class="morph-shape"></div>
            <div class="morph-shape"></div>
            <div class="morph-shape"></div>
        </div>
    </div>
    
    <!-- Space Background Elements -->
    <div class="space-background">
        <div class="stars-layer">
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
        </div>
        <div class="nebula-layer"></div>
        <div class="floating-debris">
            <div class="debris debris-1"></div>
            <div class="debris debris-2"></div>
            <div class="debris debris-3"></div>
        </div>
    </div>
</section>



<!-- Client Content Modal -->
<div class="modal fade" id="clientModal" tabindex="-1" aria-labelledby="clientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="clientModalLabel">Client Content</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="modal-content-container">
                    <!-- Dynamic content will be loaded here -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Showcase Section -->
<section id="featured-client-work" class="portfolio-showcase-section">
    <!-- Professional Background Elements -->
    <div class="portfolio-background">
        <div class="portfolio-pattern"></div>
        <div class="portfolio-gradient-overlay"></div>
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            <div class="shape shape-4"></div>
        </div>
    </div>
    
    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="scroll-animate">
                    <div class="mb-3 scroll-fade-in">
                    </div>
                    <h2 class="section-title mb-4 scroll-slide-from-top">{{ $featuredClientWork->title ?? 'Featured Client Work' }}</h2>
                    <p class="section-subtitle scroll-slide-from-top">
                        {{ $featuredClientWork->subtitle ?? 'Real projects, real results. See how strategic copywriting transformed these brands.' }}
                    </p>
                </div>
            </div>
        </div>
        <!-- Portfolio Showcase Carousel -->
        <div class="portfolio-carousel-container">
            <div id="portfolioCarousel" class="portfolio-carousel">
                <div class="portfolio-carousel-inner">
                    @if($portfolioCards && $portfolioCards->count() > 0)
                        @php
                            $cardsPerSlide = 5;
                            $totalSlides = ceil($portfolioCards->count() / $cardsPerSlide);
                            $positions = ['portfolio-side-far-left', 'portfolio-side-left', 'portfolio-center-item', 'portfolio-side-right', 'portfolio-side-far-right'];
                        @endphp
                        
                        @for($slide = 0; $slide < $totalSlides; $slide++)
                            <div class="portfolio-slide {{ $slide === 0 ? 'active' : '' }}">
                                <div class="portfolio-carousel-wrapper">
                                    @for($i = 0; $i < $cardsPerSlide; $i++)
                                        @php
                                            $cardIndex = ($slide * $cardsPerSlide + $i) % $portfolioCards->count();
                                            $card = $portfolioCards[$cardIndex];
                                            $positionClass = $positions[$i] ?? 'portfolio-center-item';
                                        @endphp
                                        <div class="{{ $positionClass }} @if($positionClass !== 'portfolio-center-item') portfolio-side-item @endif">
                                            <div class="portfolio-showcase-card">
                                                <div class="portfolio-image">
                                                    <div class="portfolio-overlay">
                                                        <h4 class="portfolio-title">{{ $card->title }}</h4>
                                                        <p class="portfolio-description">{{ $card->description }}</p>
                                                    </div>
                                                    @if($card->image)
                                                        <img src="{{ asset('storage/' . $card->image) }}" alt="{{ $card->title }}" class="portfolio-img">
                                                    @else
                                                        <div class="portfolio-bg {{ $card->background_class ?? 'bg-gradient-primary' }}"></div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        @endfor
                    @else
                        <!-- Fallback content if no cards are available -->
                        <div class="portfolio-slide active">
                            <div class="portfolio-carousel-wrapper">
                                <div class="portfolio-center-item">
                                    <div class="portfolio-showcase-card">
                                        <div class="portfolio-image">
                                            <div class="portfolio-overlay">
                                                <h4 class="portfolio-title">No Portfolio Cards</h4>
                                                <p class="portfolio-description">Please add portfolio cards from the admin dashboard.</p>
                                            </div>
                                            <div class="portfolio-bg bg-gradient-primary"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                
                <!-- Custom Portfolio Navigation Info -->
                <div class="portfolio-navigation-info text-center mt-4">
                    <small class="text-muted">
                    </small>
                </div>
            </div>
        </div>

        
        </div>
    </div>
</section>

<!-- Professional Experience Timeline with Astronaut Background -->
<section id="professional-experience" class="experience-timeline-section section-padding astronaut-section">
    <!-- Astronaut Background -->
    <div class="astronaut-background">
        <div class="stars-layer">
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
        </div>
        <div class="nebula-layer"></div>
        <div class="planet-layer">
            <div class="planet planet-1"></div>
            <div class="planet planet-2"></div>
        </div>
        <div class="astronaut-container">
            <div class="astronaut">
                <div class="astronaut-body">
                    <div class="helmet">
                        <div class="helmet-glass"></div>
                        <div class="helmet-reflection"></div>
                    </div>
                    <div class="body-suit">
                        <div class="chest-panel"></div>
                        <div class="arm arm-left"></div>
                        <div class="arm arm-right"></div>
                        <div class="leg leg-left"></div>
                        <div class="leg leg-right"></div>
                    </div>
                </div>
                <div class="jetpack">
                    <div class="jetpack-flame flame-1"></div>
                    <div class="jetpack-flame flame-2"></div>
                    <div class="jetpack-flame flame-3"></div>
                </div>
            </div>
        </div>
        <div class="floating-debris">
            <div class="debris debris-1"></div>
            <div class="debris debris-2"></div>
            <div class="debris debris-3"></div>
            <div class="debris debris-4"></div>
        </div>
    </div>
    
    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5" style="margin-top: 120px;">
                <div class="scroll-animate">
                    <h2 class="section-title mb-4 scroll-slide-from-top text-white">{{ $siteSettings->astronaut_section_title ?? 'Exploring New Frontiers in Professional Experience' }}</h2>
                    <p class="section-subtitle scroll-slide-from-top text-white">
                        {{ $siteSettings->astronaut_section_description ?? 'A journey of growth, learning, and delivering exceptional results across leading organizations - pushing boundaries like an astronaut explores space.' }}
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="timeline-container scroll-animate">
                    <!-- Timeline Line -->
                    <div class="timeline-line"></div>
                    
                    @foreach($experiences as $index => $experience)
                    <!-- {{ $experience->company_name }} -->
                    <div class="timeline-item scroll-fade-in {{ $experience->is_clickable ? 'experience-clickable' : '' }} space-timeline-item" 
                         @if($experience->is_clickable) id="experience-timeline-{{ $experience->id }}" style="animation-delay: {{ ($index + 1) * 0.1 }}s; cursor: pointer;" @else style="animation-delay: {{ ($index + 1) * 0.1 }}s;" @endif
                         @if($experience->is_clickable && $experience->target_logos) data-target-logos="{{ is_array($experience->target_logos) ? implode(',', $experience->target_logos) : $experience->target_logos }}" @endif>
                        <div class="timeline-year text-white">{{ $experience->year }}</div>
                        <div class="timeline-content space-timeline-content">
                            <div class="company-logo">
                                <div class="logo-circle {{ $experience->logo_class }} space-logo-glow">
                                    @if($experience->logo_image)
                                        <img src="{{ asset('storage/' . $experience->logo_image) }}" alt="{{ $experience->company_name }}" class="logo-image" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                                    @elseif($experience->logo_icon)
                                        <i class="{{ $experience->logo_icon }} text-white"></i>
                                    @elseif($experience->logo_text)
                                        <span class="text-white fw-bold">{{ $experience->logo_text }}</span>
                                    @endif
                                </div>
                            </div>
                            <h5 class="company-name text-white">{{ $experience->company_name }}</h5>
                            <p class="position text-light">{{ $experience->position }}</p>
                            <p class="duration text-light opacity-75">{{ $experience->duration }}</p>
                            @if($experience->description)
                                <p class="description text-light opacity-75 mt-2">{{ $experience->description }}</p>
                            @endif
                            @if($experience->is_clickable)
                                <div class="mt-3">
                                    <span class="btn btn-outline-light btn-sm space-btn-glow">
                                        <i class="fas fa-external-link-alt me-2"></i>Read More
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <div class="py-4">
                    <!-- Additional spacing area -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Clients Past Work Section -->
<section class="clients-past-work-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="scroll-animate">
                    <h2 class="section-title mb-4 scroll-slide-from-top">Trusted by Leading Brands</h2>
                    <p class="section-subtitle scroll-slide-from-top">
                        From startups to Fortune 500 companies, I've helped brands across industries achieve their content goals.
                    </p>

                </div>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Client Logo Grid -->
            <div class="col-lg-12">
                <div class="clients-grid scroll-animate">
                    @forelse($logos as $index => $logo)
                        @php
                            $logoId = strtolower(str_replace(' ', '-', $logo->title)) . '-logo';
                            $dataClient = strtolower(str_replace(' ', '', $logo->title));
                            $animationDelay = ($index + 1) * 0.1;
                            $specialClasses = $logo->title === 'Bird' ? 'bird-clickable ' : '';
                        @endphp
                        <div class="client-logo-item scroll-fade-in {{ $specialClasses }}clickable-logo" 
                             id="{{ $logoId }}" 
                             style="animation-delay: {{ $animationDelay }}s; cursor: pointer;" 
                             data-client="{{ $dataClient }}">
                            @if($logo->image)
                                <img src="{{ asset('storage/' . $logo->image) }}" alt="{{ $logo->title }}" class="client-logo">
                            @else
                                <img src="{{ asset('images/portfolio/default-logo.png') }}" alt="{{ $logo->title }}" class="client-logo">
                            @endif
                            <div class="logo-overlay">
                                <i class="fas fa-play-circle"></i>
                                <span>View Content</span>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">No logos available at the moment.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        

    </div>
</section>

<!-- What Clients Say Section -->
<section class="section-padding astronaut-testimonials-section py-5" id="client-testimonials">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="animate-on-scroll">
                    <h2 class="display-5 fw-bold mb-4">What Clients Say</h2>
                    <p class="lead text-muted">
                        Real feedback from real clients about their project experiences.
                    </p>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card h-100 animate-on-scroll border-0 shadow-sm">
                    <div class="card-body text-center p-5">
                        <div class="mb-3">
                            <i class="fas fa-quote-left fa-2x text-primary opacity-50"></i>
                        </div>
                        <p class="card-text mb-4">
                            "The website copy transformation was incredible. Our conversion rate jumped from 2% to 6.5% within the first month. ROI was immediate."
                        </p>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="bg-primary rounded-circle p-2 me-3">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div class="text-start">
                                <h6 class="mb-0 fw-bold">Sarah Johnson</h6>
                                <small class="text-muted">Fashion Forward CEO</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100 animate-on-scroll border-0 shadow-sm">
                    <div class="card-body text-center p-5">
                        <div class="mb-3">
                            <i class="fas fa-quote-left fa-2x text-primary opacity-50"></i>
                        </div>
                        <p class="card-text mb-4">
                            "Our email campaigns went from being eagerly anticipated to being ignored to tripled open rates and sales from email increased by 400%."
                        </p>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="bg-success rounded-circle p-2 me-3">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div class="text-start">
                                <h6 class="mb-0 fw-bold">Michael Chen</h6>
                                <small class="text-muted">Tech Startup Founder</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100 animate-on-scroll border-0 shadow-sm">
                    <div class="card-body text-center p-5">
                        <div class="mb-3">
                            <i class="fas fa-quote-left fa-2x text-primary opacity-50"></i>
                        </div>
                        <p class="card-text mb-4">
                            "The content strategy completely transformed our brand voice. We went from generic to memorable, and our engagement rates soared."
                        </p>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="bg-info rounded-circle p-2 me-3">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div class="text-start">
                                <h6 class="mb-0 fw-bold">Emily Rodriguez</h6>
                                <small class="text-muted">Lifestyle Brand Director</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section" id="cta-section">
    <div class="cta-background">
        <div class="cta-pattern"></div>
    </div>
    
    <!-- Space Elements -->
    <div class="space-planet-1"></div>
    <div class="space-planet-2"></div>
    <div class="space-satellite"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="cta-content scroll-animate" style="margin-top: 120px;">
                    <div class="cta-icon mb-4 scroll-scale">
                        <i class="fas fa-user-astronaut"></i>
                    </div>
                    <h2 class="cta-title mb-4 scroll-slide-from-top">Ready to Launch Your Project?</h2>
                    <p class="cta-subtitle mb-5 scroll-animate">
                        Join us on a journey to the stars. Let's create something out of this world together.
                    </p>
                    <!-- Contact Form -->
                    <div class="contact-form-wrapper scroll-animate" style="margin-top: 10px;">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif
                        
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            Please correct the errors below and try again.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif
                        
                        <div class="card shadow-lg border-0" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px);">
                            <div class="card-body p-4">
                                <form action="{{ route('contact.store') }}" method="POST" id="ctaContactForm">
                                    @csrf
                                    
                                    <!-- Personal Information -->
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-3">
                                            <label for="cta_name" class="form-label fw-bold text-dark">
                                                <i class="fas fa-user text-primary me-2"></i>Full Name (Required)
                                            </label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                                   id="cta_name" name="name" value="{{ old('name') }}" required>
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="cta_email" class="form-label fw-bold text-dark">
                                                <i class="fas fa-envelope text-primary me-2"></i>Email Address (Required)
                                            </label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                                   id="cta_email" name="email" value="{{ old('email') }}" required>
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-3">
                                            <label for="cta_phone" class="form-label fw-bold text-dark">
                                                <i class="fas fa-phone text-primary me-2"></i>Phone Number (Required)
                                            </label>
                                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                                   id="cta_phone" name="phone" value="{{ old('phone') }}" required>
                                            @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="cta_company" class="form-label fw-bold text-dark">
                                                <i class="fas fa-building text-primary me-2"></i>Company/Organization
                                            </label>
                                            <input type="text" class="form-control @error('company') is-invalid @enderror" 
                                                   id="cta_company" name="company" value="{{ old('company') }}">
                                            @error('company')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="cta_message" class="form-label fw-bold text-dark">
                                            <i class="fas fa-comment text-primary me-2"></i>Project Description (Required)
                                        </label>
                                        <textarea class="form-control @error('message') is-invalid @enderror" 
                                                  id="cta_message" name="message" rows="4" required 
                                                  placeholder="Please describe your project in detail...">{{ old('message') }}</textarea>
                                        @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-lg px-5" id="ctaSubmitBtn">
                                            <i class="fas fa-paper-plane me-2"></i>Send Message
                                        </button>
                                    </div>
                                    
                                    <!-- Loading Overlay -->
                                    <div class="loading-overlay" id="ctaLoadingOverlay" style="display: none;">
                                        <div class="loading-content">
                                            <div class="loading-spinner">
                                                <i class="fas fa-paper-plane fa-3x text-primary"></i>
                                            </div>
                                            <h5 class="mt-3 text-primary">Sending your message...</h5>
                                            <p class="text-muted">Please wait while we process your request</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="cta-guarantee mt-4 scroll-fade-in">
                        <small class="text-white" style="opacity: 0.9;">
                            <i class="fas fa-shield-alt me-2"></i>100% satisfaction guarantee • Free consultation
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
@keyframes pulse {
    0% { transform: scale(1); opacity: 0.7; }
    50% { transform: scale(1.05); opacity: 0.4; }
    100% { transform: scale(1); opacity: 0.7; }
}

/* Loading Overlay Styles */
.loading-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(5px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    border-radius: 0.5rem;
}

.loading-content {
    text-align: center;
    padding: 2rem;
}

.loading-spinner {
    animation: float 2s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.loading-spinner i {
    animation: pulse-glow 1.5s ease-in-out infinite;
}

@keyframes pulse-glow {
    0%, 100% { 
        opacity: 1;
        transform: scale(1);
        filter: drop-shadow(0 0 5px rgba(13, 110, 253, 0.3));
    }
    50% { 
        opacity: 0.7;
        transform: scale(1.1);
        filter: drop-shadow(0 0 15px rgba(13, 110, 253, 0.6));
    }
}

/* Form card positioning for overlay */
.contact-form-wrapper .card {
    position: relative;
}

/* Ensure form has relative positioning for overlay */
#ctaContactForm {
    position: relative;
}
</style>
@endpush

@push('scripts')
<script>
// Professional Scroll-based Animation System
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.09,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
                // Optional: Stop observing after animation to improve performance
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all elements with scroll animation classes
    const animatedElements = document.querySelectorAll([
        '.scroll-animate',
        '.scroll-fade-in',
        '.scroll-slide-left',
        '.scroll-slide-right',
        '.scroll-slide-from-left',
        '.scroll-slide-from-right',
        '.scroll-slide-from-top',
        '.scroll-scale',
        '.scroll-rotate',
        '.portfolio-showcase-card'
    ].join(','));

    animatedElements.forEach(element => {
        observer.observe(element);
    });

    // Enhanced portfolio card animations with staggered effect
    const portfolioCards = document.querySelectorAll('.portfolio-showcase-card');
    portfolioCards.forEach((card, index) => {
        // Only apply staggered delay if card doesn't have directional animation
        if (!card.classList.contains('scroll-slide-from-left') && 
            !card.classList.contains('scroll-slide-from-right') && 
            !card.classList.contains('scroll-slide-from-top')) {
            card.style.transitionDelay = `${index * 0.2}s`;
        }
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Handle CTA contact form submission with AJAX to prevent page scrolling
    const ctaContactForm = document.getElementById('ctaContactForm');
    if (ctaContactForm) {
        ctaContactForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            
            const formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            const originalButtonText = submitButton.innerHTML;
            
            // Show loading overlay
            const loadingOverlay = document.getElementById('ctaLoadingOverlay');
            submitButton.disabled = true;
            loadingOverlay.style.display = 'flex';
            
            // Also update button for additional feedback
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
            
            // Track start time for timing control
            const startTime = Date.now();
            
            // Submit form via AJAX
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else if (response.status === 422) {
                    // Validation errors
                    return response.json().then(data => {
                        throw { validation: true, data: data };
                    });
                } else {
                    throw new Error('Network response was not ok');
                }
            })
            .then(data => {
                if (data.success) {
                    // Wait for 2 seconds before showing thank you message
                    setTimeout(() => {
                        // Update loading overlay with thank you message
                        const loadingOverlay = document.getElementById('ctaLoadingOverlay');
                        const loadingContent = loadingOverlay.querySelector('.loading-content');
                        loadingContent.innerHTML = `
                            <div class="loading-spinner">
                                <i class="fas fa-check-circle fa-3x text-success"></i>
                            </div>
                            <h5 class="mt-3 text-success">Thank you for your message!</h5>
                            <p class="text-muted">I'll get back to you within 24 hours</p>
                        `;
                        
                        // Reset form and clear any validation errors
                        this.reset();
                        clearValidationErrors();
                        
                        // Hide overlay after showing thank you message for 2 seconds
                        setTimeout(() => {
                            const loadingOverlay = document.getElementById('ctaLoadingOverlay');
                            const loadingContent = loadingOverlay.querySelector('.loading-content');
                            
                            // Restore original loading content for next submission
                            loadingContent.innerHTML = `
                                <div class="loading-spinner">
                                    <i class="fas fa-paper-plane fa-3x text-primary"></i>
                                </div>
                                <h5 class="mt-3 text-primary">Sending your message...</h5>
                                <p class="text-muted">Please wait while we process your request</p>
                            `;
                            
                            loadingOverlay.style.display = 'none';
                            submitButton.disabled = false;
                            submitButton.innerHTML = originalButtonText;
                        }, 2000); // Show thank you message for 2 seconds
                    }, 2000); // Show initial loading for 2 seconds
                } else {
                    // Show error message and hide overlay immediately
                    showFormMessage('error', data.message || 'An error occurred. Please try again.');
                    
                    const loadingOverlay = document.getElementById('ctaLoadingOverlay');
                    const loadingContent = loadingOverlay.querySelector('.loading-content');
                    
                    // Restore original loading content
                    loadingContent.innerHTML = `
                        <div class="loading-spinner">
                            <i class="fas fa-paper-plane fa-3x text-primary"></i>
                        </div>
                        <h5 class="mt-3 text-primary">Sending your message...</h5>
                        <p class="text-muted">Please wait while we process your request</p>
                    `;
                    
                    loadingOverlay.style.display = 'none';
                    submitButton.disabled = false;
                    submitButton.innerHTML = originalButtonText;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                if (error.validation && error.data.errors) {
                    // Handle validation errors
                    displayValidationErrors(error.data.errors);
                    showFormMessage('error', error.data.message || 'Please correct the errors below.');
                } else {
                    showFormMessage('error', 'An error occurred. Please try again.');
                }
                
                // Hide overlay immediately for errors
                const loadingOverlay = document.getElementById('ctaLoadingOverlay');
                const loadingContent = loadingOverlay.querySelector('.loading-content');
                
                // Restore original loading content
                loadingContent.innerHTML = `
                    <div class="loading-spinner">
                        <i class="fas fa-paper-plane fa-3x text-primary"></i>
                    </div>
                    <h5 class="mt-3 text-primary">Sending your message...</h5>
                    <p class="text-muted">Please wait while we process your request</p>
                `;
                
                loadingOverlay.style.display = 'none';
                submitButton.disabled = false;
                submitButton.innerHTML = originalButtonText;
            });
        });
    }
    
    // Function to show form messages without page reload
    function showFormMessage(type, message) {
        // Remove existing alerts
        const existingAlerts = document.querySelectorAll('.contact-form-wrapper .alert');
        existingAlerts.forEach(alert => alert.remove());
        
        // Create new alert
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const iconClass = type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-triangle';
        
        const alertHTML = `
            <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                <i class="${iconClass} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
        
        // Insert alert before the form card
        const formWrapper = document.querySelector('.contact-form-wrapper');
        const formCard = formWrapper.querySelector('.card');
        formCard.insertAdjacentHTML('beforebegin', alertHTML);
        
        // Auto-dismiss after 5 seconds
        setTimeout(() => {
            const alert = formWrapper.querySelector('.alert');
            if (alert) {
                alert.classList.remove('show');
                setTimeout(() => alert.remove(), 150);
            }
        }, 5000);
     }
     
     // Function to display validation errors on form fields
     function displayValidationErrors(errors) {
         // Clear existing validation errors first
         clearValidationErrors();
         
         Object.keys(errors).forEach(fieldName => {
             const field = document.querySelector(`#cta_${fieldName}`);
             if (field) {
                 // Add error class to field
                 field.classList.add('is-invalid');
                 
                 // Create or update error message
                 let errorDiv = field.parentNode.querySelector('.invalid-feedback');
                 if (!errorDiv) {
                     errorDiv = document.createElement('div');
                     errorDiv.className = 'invalid-feedback';
                     field.parentNode.appendChild(errorDiv);
                 }
                 errorDiv.textContent = errors[fieldName][0]; // Show first error message
             }
         });
     }
     
     // Function to clear validation errors
     function clearValidationErrors() {
         const form = document.getElementById('ctaContactForm');
         if (form) {
             // Remove error classes from all fields
             const fields = form.querySelectorAll('.is-invalid');
             fields.forEach(field => {
                 field.classList.remove('is-invalid');
             });
             
             // Remove all error messages
             const errorDivs = form.querySelectorAll('.invalid-feedback');
             errorDivs.forEach(div => {
                 if (!div.hasAttribute('data-original')) {
                     div.remove();
                 }
             });
         }
     }

    // Counter animation for statistics (5 second duration)
    const counters = document.querySelectorAll('.stat-number');
    const counterObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const originalText = counter.textContent;
                const target = parseInt(originalText.replace(/[^0-9]/g, ''));
                const suffix = originalText.replace(/[0-9]/g, '');
                const duration = 5000; // 5 seconds
                const startTime = performance.now();
                
                const updateCounter = (currentTime) => {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    
                    // Easing function for smooth animation
                    const easeOutQuart = 1 - Math.pow(1 - progress, 4);
                    const current = Math.floor(target * easeOutQuart);
                    
                    counter.textContent = current + suffix;
                    
                    if (progress < 1) {
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = originalText; // Ensure final value is exact
                    }
                };
                
                counter.textContent = '0' + suffix; // Start from 0
                requestAnimationFrame(updateCounter);
                counterObserver.unobserve(counter);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => {
        counterObserver.observe(counter);
    });

    // Portfolio Section Parallax Effects
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const portfolioSection = document.querySelector('.portfolio-showcase-section');
        
        if (portfolioSection) {
            const rect = portfolioSection.getBoundingClientRect();
            const isInView = rect.top < window.innerHeight && rect.bottom > 0;
            
            if (isInView) {
                // Parallax for background pattern
                const portfolioPattern = document.querySelector('.portfolio-pattern');
                if (portfolioPattern) {
                    const rate = (scrolled - portfolioSection.offsetTop) * 0.3;
                    portfolioPattern.style.transform = `translateY(${rate}px)`;
                }
                
                // Parallax for floating shapes
                const shapes = document.querySelectorAll('.shape');
                shapes.forEach((shape, index) => {
                    const rate = (scrolled - portfolioSection.offsetTop) * (0.1 + index * 0.05);
                    shape.style.transform = `translateY(${rate}px) rotate(${rate * 0.5}deg)`;
                });
                
                // Parallax for portfolio cards (only if they're already animated)
                const portfolioCards = document.querySelectorAll('.portfolio-showcase-card.animate');
                portfolioCards.forEach((card, index) => {
                    const rate = (scrolled - portfolioSection.offsetTop) * (0.05 + index * 0.02);
                    // Preserve the original transform if it exists
                    const currentTransform = card.style.transform || '';
                    if (currentTransform.includes('translateX') || currentTransform.includes('translateY')) {
                        // Don't override directional animations
                        return;
                    }
                    card.style.transform = `translateY(${rate}px)`;
                });
            }
        }
    });

    // Performance optimization: Reduce animations on low-end devices
    if (navigator.hardwareConcurrency && navigator.hardwareConcurrency < 4) {
        document.documentElement.style.setProperty('--transition-duration', '0.4s');
    }

    // Portfolio Carousel Custom Navigation
    const portfolioItems = [
        @if($portfolioCards && $portfolioCards->count() > 0)
            @foreach($portfolioCards as $index => $card)
                { 
                    title: '{{ addslashes($card->title) }}', 
                    description: '{{ addslashes($card->description) }}', 
                    bg: '{{ $card->background_class }}',
                    image: '{{ $card->image ? asset("storage/" . $card->image) : "" }}'
                }{{ $loop->last ? '' : ',' }}
            @endforeach
        @else
            { title: 'No Portfolio Cards', description: 'Please add portfolio cards from the admin dashboard.', bg: 'bg-gradient-primary', image: '' }
        @endif
    ];
    
    let currentPortfolioIndex = 0;
    let portfolioAutoSlideInterval;
    
    function startPortfolioAutoSlide() {
        // Always reset existing timer to maintain a steady 3s cadence
        stopPortfolioAutoSlide();
        portfolioAutoSlideInterval = setInterval(() => {
            moveToNext();
        }, 3000); // 3 seconds
    }
    
    function stopPortfolioAutoSlide() {
        if (portfolioAutoSlideInterval) {
            clearInterval(portfolioAutoSlideInterval);
            portfolioAutoSlideInterval = null;
        }
    }
    
    function updatePortfolioCarousel(centerIndex, direction = 'next') {
        const carousel = document.querySelector('#portfolioCarousel');
        if (!carousel) return;
        
        // Get all portfolio slides
        const carouselItems = carousel.querySelectorAll('.portfolio-slide');
        
        // Add swipe animation on the wrapper per direction
        carouselItems.forEach((slide) => {
            const wrapper = slide.querySelector('.portfolio-carousel-wrapper');
            if (!wrapper) return;
            wrapper.classList.remove('swipe-next', 'swipe-prev');
            if (direction === 'next') {
                void wrapper.offsetWidth; // reflow to restart animation
                wrapper.classList.add('swipe-next');
            } else if (direction === 'prev') {
                void wrapper.offsetWidth;
                wrapper.classList.add('swipe-prev');
            }
        });
        
        // Add fade-out animation to current content
        carouselItems.forEach((slide, slideIndex) => {
            const wrapper = slide.querySelector('.portfolio-carousel-wrapper');
            if (!wrapper) return;
            
            const allItems = wrapper.querySelectorAll('.portfolio-side-far-left, .portfolio-side-left, .portfolio-center-item, .portfolio-side-right, .portfolio-side-far-right');
            allItems.forEach(item => {
                // Add fade-out effect
                item.style.opacity = '0.3';
                item.style.transform = item.style.transform + ' scale(0.95)';
                item.style.transition = 'opacity 0.2s ease, transform 0.2s ease';
            });
        });
        
        // Update content after fade-out
        setTimeout(() => {
        
        // Update content immediately
        carouselItems.forEach((slide, slideIndex) => {
            const wrapper = slide.querySelector('.portfolio-carousel-wrapper');
            if (!wrapper) return;
            
            // Calculate indices for this slide
            const farLeftIndex = (centerIndex - 2 + portfolioItems.length) % portfolioItems.length;
            const leftIndex = (centerIndex - 1 + portfolioItems.length) % portfolioItems.length;
            const rightIndex = (centerIndex + 1) % portfolioItems.length;
            const farRightIndex = (centerIndex + 2) % portfolioItems.length;
            
            // Get portfolio items in this slide
            const farLeftItem = wrapper.querySelector('.portfolio-side-far-left');
            const leftItem = wrapper.querySelector('.portfolio-side-left');
            const centerItem = wrapper.querySelector('.portfolio-center-item');
            const rightItem = wrapper.querySelector('.portfolio-side-right');
            const farRightItem = wrapper.querySelector('.portfolio-side-far-right');
            
            // Update content for each position
            updatePortfolioItem(farLeftItem, portfolioItems[farLeftIndex]);
            updatePortfolioItem(leftItem, portfolioItems[leftIndex]);
            updatePortfolioItem(centerItem, portfolioItems[centerIndex]);
            updatePortfolioItem(rightItem, portfolioItems[rightIndex]);
            updatePortfolioItem(farRightItem, portfolioItems[farRightIndex]);
        });
        
            // Fade content back in with smooth animation
            setTimeout(() => {
                carouselItems.forEach((slide, slideIndex) => {
                    const wrapper = slide.querySelector('.portfolio-carousel-wrapper');
                    if (!wrapper) return;
                    
                    const allItems = wrapper.querySelectorAll('.portfolio-side-far-left, .portfolio-side-left, .portfolio-center-item, .portfolio-side-right, .portfolio-side-far-right');
                    allItems.forEach(item => {
                        // Fade back in with scale animation
                        item.style.opacity = '';
                        item.style.transform = item.style.transform.replace(' scale(0.95)', '');
                        item.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                    });
                });
                
                // Reset transitions after animation
                setTimeout(() => {
                    carouselItems.forEach((slide, slideIndex) => {
                        const wrapper = slide.querySelector('.portfolio-carousel-wrapper');
                        if (!wrapper) return;
                        
                        const allItems = wrapper.querySelectorAll('.portfolio-side-far-left, .portfolio-side-left, .portfolio-center-item, .portfolio-side-right, .portfolio-side-far-right');
                        allItems.forEach(item => {
                            item.style.transition = '';
                        });
                    });
                }, 300);
            }, 50);
        }, 200);
        
        currentPortfolioIndex = centerIndex;
    }
    
    function updatePortfolioItem(element, itemData) {
        if (!element || !itemData) return;
        
        const titleElement = element.querySelector('.portfolio-title');
        const descElement = element.querySelector('.portfolio-description');
        const bgElement = element.querySelector('.portfolio-bg');
        const imgElement = element.querySelector('.portfolio-img');
        const cardElement = element.querySelector('.portfolio-showcase-card');
        
        if (titleElement) titleElement.textContent = itemData.title;
        if (descElement) descElement.textContent = itemData.description;
        
        // Handle image or background
        if (itemData.image && itemData.image !== '') {
            // Show image, hide background
            if (imgElement) {
                imgElement.src = itemData.image;
                imgElement.style.display = 'block';
            }
            if (bgElement) {
                bgElement.style.display = 'none';
            }
        } else {
            // Show background, hide image
            if (imgElement) {
                imgElement.style.display = 'none';
            }
            if (bgElement) {
                bgElement.className = `portfolio-bg ${itemData.bg}`;
                bgElement.style.display = 'block';
            }
        }
    }
    
    function moveToNext() {
        const nextIndex = (currentPortfolioIndex + 1) % portfolioItems.length;
        updatePortfolioCarousel(nextIndex, 'next');
    }
    
    function moveToPrevious() {
        const prevIndex = (currentPortfolioIndex - 1 + portfolioItems.length) % portfolioItems.length;
        updatePortfolioCarousel(prevIndex, 'prev');
    }
    
    // Initialize portfolio carousel
    updatePortfolioCarousel(0);
    
    // Entrance animation: mark wrappers as init-hidden and reveal on first view
    const pcWrappers = document.querySelectorAll('.portfolio-carousel-wrapper');
    pcWrappers.forEach(w => w.classList.add('animate-init'));
    
    const revealObserver = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                el.classList.remove('animate-init');
                // restart reveal if needed
                void el.offsetWidth;
                el.classList.add('animate-in');
                setTimeout(() => el.classList.remove('animate-in'), 800);
                obs.unobserve(el);
            }
        });
    }, { threshold: 0.15 });
    pcWrappers.forEach(w => revealObserver.observe(w));
    
    // Start auto-slide
    startPortfolioAutoSlide();
    
    // Pause auto-slide on hover
    const portfolioCarouselContainer = document.querySelector('.portfolio-carousel-container');
    if (portfolioCarouselContainer) {
        portfolioCarouselContainer.addEventListener('mouseenter', stopPortfolioAutoSlide);
        portfolioCarouselContainer.addEventListener('mouseleave', startPortfolioAutoSlide);
    }
    
    // Add click event listeners to portfolio items
    document.addEventListener('click', function(e) {
        const portfolioCard = e.target.closest('.portfolio-showcase-card');
        if (!portfolioCard) return;
        
        const parentItem = portfolioCard.closest('.portfolio-side-item, .portfolio-center-item');
        if (!parentItem) return;
        
        // Allow clicking center item for interaction (could add modal or details view later)
        if (parentItem.classList.contains('portfolio-center-item')) {
            // Center item clicked - could add modal or details functionality here
            return;
        }
        
        // Stop auto-slide temporarily when user clicks
        stopPortfolioAutoSlide();
        
        // Determine direction based on position to move clicked item to center
        if (parentItem.classList.contains('portfolio-side-left')) {
            moveToPrevious();
        } else if (parentItem.classList.contains('portfolio-side-right')) {
            moveToNext();
        } else if (parentItem.classList.contains('portfolio-side-far-left')) {
            // Move two steps back to bring far-left item to center
            const targetIndex = (currentPortfolioIndex - 2 + portfolioItems.length) % portfolioItems.length;
            updatePortfolioCarousel(targetIndex);
        } else if (parentItem.classList.contains('portfolio-side-far-right')) {
            // Move two steps forward to bring far-right item to center
            const targetIndex = (currentPortfolioIndex + 2) % portfolioItems.length;
            updatePortfolioCarousel(targetIndex);
        }
        
        // Restart auto-slide after user interaction
        startPortfolioAutoSlide(); // Restart immediately to maintain 3s cadence
    });
    
    // Override default carousel controls for single-item navigation
    const prevButton = document.querySelector('.carousel-control-prev');
    const nextButton = document.querySelector('.carousel-control-next');
    
    if (prevButton) {
        prevButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            // Stop auto-slide temporarily and restart after user interaction
            stopPortfolioAutoSlide();
            moveToPrevious();
            startPortfolioAutoSlide(); // Restart immediately to maintain 3s cadence
        });
    }
    
    if (nextButton) {
        nextButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            // Stop auto-slide temporarily and restart after user interaction
            stopPortfolioAutoSlide();
            moveToNext();
            startPortfolioAutoSlide(); // Restart immediately to maintain 3s cadence
        });
    }
    
    // Completely disable Bootstrap carousel functionality
    const portfolioCarousel = document.querySelector('#portfolioCarousel');
    if (portfolioCarousel) {
        portfolioCarousel.removeAttribute('data-bs-ride');
        portfolioCarousel.classList.remove('carousel');
        
        // Prevent any Bootstrap carousel initialization
        if (window.bootstrap && window.bootstrap.Carousel) {
            const existingCarousel = window.bootstrap.Carousel.getInstance(portfolioCarousel);
            if (existingCarousel) {
                existingCarousel.dispose();
            }
        }
    }

    // Testimonial Carousel Functionality
    const testimonialItems = document.querySelectorAll('.testimonial-item');
    const testimonialNavBtns = document.querySelectorAll('.testimonial-nav-btn');
    let currentTestimonial = 0;
    let testimonialInterval;

    function showTestimonial(index) {
        // Hide all testimonials
        testimonialItems.forEach(item => {
            item.classList.remove('active');
        });
        
        // Remove active class from all nav buttons
        testimonialNavBtns.forEach(btn => {
            btn.classList.remove('active');
        });
        
        // Show current testimonial
        if (testimonialItems[index]) {
            testimonialItems[index].classList.add('active');
        }
        
        // Activate current nav button
        if (testimonialNavBtns[index]) {
            testimonialNavBtns[index].classList.add('active');
        }
        
        currentTestimonial = index;
    }

    function nextTestimonial() {
        const next = (currentTestimonial + 1) % testimonialItems.length;
        showTestimonial(next);
    }

    function startTestimonialAutoplay() {
        testimonialInterval = setInterval(nextTestimonial, 5000); // Change every 5 seconds
    }

    function stopTestimonialAutoplay() {
        if (testimonialInterval) {
            clearInterval(testimonialInterval);
        }
    }

    // Initialize testimonial carousel
    if (testimonialItems.length > 0) {
        showTestimonial(0);
        startTestimonialAutoplay();
        
        // Add click event listeners to navigation buttons
        testimonialNavBtns.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                stopTestimonialAutoplay();
                showTestimonial(index);
                // Restart autoplay after user interaction
                setTimeout(startTestimonialAutoplay, 3000);
            });
        });
        
        // Pause autoplay on hover
        const testimonialCarousel = document.querySelector('.testimonials-carousel');
        if (testimonialCarousel) {
            testimonialCarousel.addEventListener('mouseenter', stopTestimonialAutoplay);
            testimonialCarousel.addEventListener('mouseleave', startTestimonialAutoplay);
        }
    }

    // Client Content Data from Database
    const clientContent = {
        @foreach($logos as $logo)
        '{{ strtolower(str_replace([' ', '-'], '', $logo->title)) }}': {
            title: '{{ $logo->popup_title ?? $logo->title }}',
            description: `{!! $logo->popup_description ?? $logo->description !!}`,
            video: '{{ $logo->popup_video_url ?? "https://www.youtube.com/embed/dQw4w9WgXcQ" }}',
            content: @if($logo->popup_content && is_array($logo->popup_content))
                {!! json_encode($logo->popup_content) !!}
            @else
                ['No content available']
            @endif,
            additionalSections: @if($logo->popup_additional_sections && is_array($logo->popup_additional_sections))
                {!! json_encode($logo->popup_additional_sections) !!}
            @else
                []
            @endif
        },
        @endforeach
    };

    // Modal Functionality
    const clientModal = new bootstrap.Modal(document.getElementById('clientModal'));
    const modalTitle = document.getElementById('clientModalLabel');
    const modalContainer = document.getElementById('modal-content-container');

    // Add click event listeners to all clickable logos
    document.querySelectorAll('.clickable-logo').forEach(logo => {
        logo.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const clientKey = this.getAttribute('data-client');
            const client = clientContent[clientKey];
            
            if (client) {
                // Update modal title
                modalTitle.textContent = client.title;
                
                // Create modal content
                let additionalSectionsHTML = '';
                if (client.additionalSections) {
                    additionalSectionsHTML = client.additionalSections.map(section => `
                        <div class="additional-section mb-4">
                            <h5 class="mb-3 text-primary">${section.title}</h5>
                            <ul class="list-unstyled">
                                ${section.items.map(item => `<li class="mb-2"><i class="fas fa-arrow-right text-primary me-2"></i>${item}</li>`).join('')}
                            </ul>
                        </div>
                    `).join('');
                }
                
                const contentHTML = `
                    <div class="client-content">
                        <h3 class="mb-3">${client.title}</h3>
                        <div class="rich-content mb-4">
                            <style>
                                .rich-content .text-left { text-align: left !important; }
                                .rich-content .text-center { text-align: center !important; }
                                .rich-content .text-right { text-align: right !important; }
                                .rich-content img { max-width: 100%; height: auto; border-radius: 8px; }
                                .rich-content p { margin-bottom: 1rem; line-height: 1.6; }
                                .rich-content h1, .rich-content h2, .rich-content h3, .rich-content h4, .rich-content h5, .rich-content h6 { margin-top: 1.5rem; margin-bottom: 1rem; }
                            </style>
                            ${client.description}
                        </div>
                        
                        
                    </div>
                `;
                
                modalContainer.innerHTML = contentHTML;
                clientModal.show();
            }
        });
    });

    // Bird Logo Interactive Functionality
    const birdLogo = document.getElementById('bird-logo');
    
    // Get all available logo elements dynamically
    const availableLogos = document.querySelectorAll('.clickable-logo:not(#bird-logo)');
    
    console.log('Bird logo element:', birdLogo);
    console.log('Available target logos:', availableLogos);
    
    if (birdLogo) {
        birdLogo.addEventListener('click', function(e) {
            console.log('Bird logo clicked!');
            e.preventDefault();
            e.stopPropagation();
            
            // Add clicked animation to bird logo
            birdLogo.classList.add('clicked');
            console.log('Added clicked class to bird logo');
            
            // Scroll down smoothly to show the companies/clients section
            const clientsSection = document.querySelector('.clients-past-work-section');
            if (clientsSection) {
                clientsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
            
            // After animation completes, highlight the target logos
            setTimeout(() => {
                // Remove clicked class from bird
                birdLogo.classList.remove('clicked');
                console.log('Removed clicked class from bird logo');
                
                // Add highlight effect to all available target logos
                availableLogos.forEach(logo => {
                    logo.classList.add('highlighted');
                    console.log('Added highlight to logo:', logo.id);
                });
                
                // Remove highlight after 5 seconds
                setTimeout(() => {
                    availableLogos.forEach(logo => {
                        logo.classList.remove('highlighted');
                    });
                    console.log('Removed highlights from all target logos');
                }, 5000);
            }, 1000); // Wait for bird animation to complete
        });
        
        // Add visual feedback on hover
        birdLogo.addEventListener('mouseenter', function() {
            console.log('Bird logo hovered');
            this.style.transform = 'scale(1.1)';
        });
        
        birdLogo.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    } else {
        console.error('Bird logo element not found!');
    }

    // Dynamic Experience Timeline Interactive Functionality
    const experienceTimelines = document.querySelectorAll('.experience-clickable');
    
    console.log('Experience timeline elements:', experienceTimelines);
    
    experienceTimelines.forEach(timeline => {
        timeline.addEventListener('click', function(e) {
            console.log('Experience timeline clicked:', this.id);
            e.preventDefault();
            e.stopPropagation();
            
            // Add clicked animation to timeline
            this.classList.add('clicked');
            console.log('Added clicked class to timeline:', this.id);
            
            // Scroll down smoothly to show the companies/clients section
            const clientsSection = document.querySelector('.clients-past-work-section');
            if (clientsSection) {
                clientsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
            
            // Get target logos from data attribute
            const targetLogos = this.getAttribute('data-target-logos');
            
            // After animation completes, highlight the target logos
            setTimeout(() => {
                // Remove clicked class from timeline
                this.classList.remove('clicked');
                console.log('Removed clicked class from timeline:', this.id);
                
                // Add highlight effect to target logos
                if (targetLogos) {
                    const logoIds = targetLogos.split(',');
                    logoIds.forEach(logoId => {
                        const logoElement = document.getElementById(logoId.trim());
                        if (logoElement) {
                            logoElement.classList.add('highlighted');
                            console.log('Added highlight to logo:', logoId);
                        }
                    });
                    
                    // Remove highlight after 5 seconds
                    setTimeout(() => {
                        logoIds.forEach(logoId => {
                            const logoElement = document.getElementById(logoId.trim());
                            if (logoElement) {
                                logoElement.classList.remove('highlighted');
                            }
                        });
                        console.log('Removed highlights from target logos');
                    }, 5000);
                }
            }, 1000); // Wait for timeline animation to complete
        });
        
        // Add visual feedback on hover
        timeline.addEventListener('mouseenter', function() {
            console.log('Experience timeline hovered:', this.id);
        });
        
        timeline.addEventListener('mouseleave', function() {
            console.log('Experience timeline hover ended:', this.id);
        });
    });

    // Astronaut Section Parallax Effects
    const astronautSection = document.querySelector('.astronaut-section');
    const astronaut = document.querySelector('.astronaut');
    const starsLayer = document.querySelector('.stars-layer');
    const nebulaLayer = document.querySelector('.nebula-layer');
    const planets = document.querySelectorAll('.planet');
    const debris = document.querySelectorAll('.debris');
    
    if (astronautSection) {
        // Parallax scroll effect
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const sectionTop = astronautSection.offsetTop;
            const sectionHeight = astronautSection.offsetHeight;
            const windowHeight = window.innerHeight;
            
            // Check if section is in viewport
            if (scrolled + windowHeight > sectionTop && scrolled < sectionTop + sectionHeight) {
                const parallaxSpeed = (scrolled - sectionTop) * 0.5;
                
                // Apply parallax to different layers
                if (starsLayer) {
                    starsLayer.style.transform = `translateY(${parallaxSpeed * 0.2}px)`;
                }
                
                if (nebulaLayer) {
                    nebulaLayer.style.transform = `translateY(${parallaxSpeed * 0.3}px) rotate(${parallaxSpeed * 0.01}deg)`;
                }
                
                if (astronaut) {
                    astronaut.style.transform = `translateY(${parallaxSpeed * 0.1}px) rotate(${Math.sin(scrolled * 0.01) * 2}deg)`;
                }
                
                // Animate planets
                planets.forEach((planet, index) => {
                    const speed = (index + 1) * 0.15;
                    planet.style.transform = `translateY(${parallaxSpeed * speed}px) rotate(${scrolled * 0.1}deg)`;
                });
                
                // Animate debris
                debris.forEach((debrisItem, index) => {
                    const speed = (index + 1) * 0.25;
                    debrisItem.style.transform = `translateY(${parallaxSpeed * speed}px) rotate(${scrolled * 0.2}deg)`;
                });
            }
        });
        
        // Mouse movement parallax effect
        astronautSection.addEventListener('mousemove', (e) => {
            const rect = astronautSection.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width;
            const y = (e.clientY - rect.top) / rect.height;
            
            // Apply subtle mouse parallax to astronaut
            if (astronaut) {
                const moveX = (x - 0.5) * 20;
                const moveY = (y - 0.5) * 20;
                astronaut.style.transform += ` translate(${moveX}px, ${moveY}px)`;
            }
            
            // Apply mouse parallax to planets
            planets.forEach((planet, index) => {
                const moveX = (x - 0.5) * (10 + index * 5);
                const moveY = (y - 0.5) * (10 + index * 5);
                planet.style.transform += ` translate(${moveX}px, ${moveY}px)`;
            });
        });
        
        // Reset mouse parallax when mouse leaves
        astronautSection.addEventListener('mouseleave', () => {
            if (astronaut) {
                astronaut.style.transform = astronaut.style.transform.replace(/translate\([^)]*\)/g, '');
            }
            
            planets.forEach((planet) => {
                planet.style.transform = planet.style.transform.replace(/translate\([^)]*\)/g, '');
            });
        });
    }

});
</script>
@endpush