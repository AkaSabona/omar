@extends('layouts.app')

@section('title', 'Client Testimonials - Real Results from Real Clients')
@section('description', 'Read what clients say about working with me. Discover real results, success stories, and testimonials from businesses that have transformed their copywriting.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <div class="animate-on-scroll">
                    <h1 class="display-4 fw-bold mb-4">
                        What Clients Say About <span class="text-warning">Working Together</span>
                    </h1>
                    <p class="lead mb-4">
                        Don't just take my word for it. Here's what real clients say about the results we've achieved together and their experience working with me.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="#testimonials" class="btn btn-light btn-lg">
                            <i class="fas fa-comments me-2"></i>Read Testimonials
                        </a>
                        <a href="#results" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-chart-line me-2"></i>See Results
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section-padding bg-light" id="results">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="animate-on-scroll">
                    <h2 class="display-5 fw-bold mb-4">Proven Results Across Industries</h2>
                    <p class="lead text-muted">
                        These numbers represent real improvements achieved for real businesses.
                    </p>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="animate-on-scroll">
                    <div class="bg-white rounded-3 p-4 shadow-sm h-100">
                        <div class="display-4 fw-bold text-primary mb-2">150+</div>
                        <h6 class="mb-2">Happy Clients</h6>
                        <p class="text-muted small mb-0">Across various industries</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="animate-on-scroll" style="animation-delay: 0.1s;">
                    <div class="bg-white rounded-3 p-4 shadow-sm h-100">
                        <div class="display-4 fw-bold text-success mb-2">$3.2M+</div>
                        <h6 class="mb-2">Revenue Generated</h6>
                        <p class="text-muted small mb-0">Attributed to copy improvements</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="animate-on-scroll" style="animation-delay: 0.2s;">
                    <div class="bg-white rounded-3 p-4 shadow-sm h-100">
                        <div class="display-4 fw-bold text-warning mb-2">89%</div>
                        <h6 class="mb-2">Average Conversion Increase</h6>
                        <p class="text-muted small mb-0">Across all projects</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="animate-on-scroll" style="animation-delay: 0.3s;">
                    <div class="bg-white rounded-3 p-4 shadow-sm h-100">
                        <div class="display-4 fw-bold text-info mb-2">98%</div>
                        <h6 class="mb-2">Client Satisfaction Rate</h6>
                        <p class="text-muted small mb-0">Would recommend to others</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Testimonials -->
<section class="section-padding" id="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="animate-on-scroll">
                    <h2 class="display-5 fw-bold mb-4">Client Success Stories</h2>
                    <p class="lead text-muted">
                        Real testimonials from real clients who have seen transformative results.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row">
            @foreach($testimonials as $index => $testimonial)
            @if($index < 3) <!-- Featured testimonials -->
            <div class="col-lg-4 mb-4">
                <div class="animate-on-scroll" style="animation-delay: {{ $index * 0.1 }}s;">
                    <div class="card h-100 border-0 shadow-lg testimonial-card">
                        <div class="card-body p-5 text-center">
                            <!-- Quote Icon -->
                            <div class="display-4 text-primary opacity-25 mb-3">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            
                            <!-- Rating -->
                            <div class="mb-3">
                                @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star text-warning"></i>
                                @endfor
                            </div>
                            
                            <!-- Testimonial Text -->
                            <blockquote class="blockquote mb-4">
                                <p class="lead">"{{ $testimonial['content'] }}"</p>
                            </blockquote>
                            
                            <!-- Results Badge -->
                            <div class="mb-4">
                                <span class="badge bg-success fs-6">{{ $testimonial['result'] }}</span>
                            </div>
                            
                            <!-- Client Info -->
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="bg-primary rounded-circle p-3 me-3">
                                    <i class="fas fa-user fa-lg text-white"></i>
                                </div>
                                <div class="text-start">
                                    <h6 class="mb-0 fw-bold">{{ $testimonial['name'] }}</h6>
                                    <small class="text-muted">{{ $testimonial['position'] }}</small><br>
                                    <small class="text-muted">{{ $testimonial['company'] }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

<!-- Video Testimonials -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="animate-on-scroll">
                    <h2 class="display-5 fw-bold mb-4">Video Testimonials</h2>
                    <p class="lead text-muted">
                        Hear directly from clients about their experience and results.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row">
            @php
                $videoTestimonials = [
                    ['name' => 'Sarah Johnson', 'company' => 'Fashion Forward', 'thumbnail' => 'video1', 'duration' => '2:15'],
                    ['name' => 'Michael Chen', 'company' => 'Tech Startup', 'thumbnail' => 'video2', 'duration' => '1:45'],
                    ['name' => 'Emily Rodriguez', 'company' => 'Lifestyle Brand', 'thumbnail' => 'video3', 'duration' => '3:20']
                ];
            @endphp
            
            @foreach($videoTestimonials as $index => $video)
            <div class="col-lg-4 mb-4">
                <div class="animate-on-scroll" style="animation-delay: {{ $index * 0.1 }}s;">
                    <div class="card border-0 shadow-sm video-testimonial">
                        <div class="position-relative">
                            <div class="video-thumbnail" style="height: 200px; background: linear-gradient(135deg, {{ ['#667eea', '#f093fb', '#4facfe'][$index] }} 0%, {{ ['#764ba2', '#f5576c', '#00f2fe'][$index] }} 100%);">
                                <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                                    <div class="play-button mb-2">
                                        <i class="fas fa-play fa-3x"></i>
                                    </div>
                                    <div class="h6">{{ $video['name'] }}</div>
                                    <small>{{ $video['company'] }}</small>
                                </div>
                                <div class="position-absolute bottom-0 end-0 m-3">
                                    <span class="badge bg-dark bg-opacity-75">{{ $video['duration'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center p-4">
                            <h6 class="card-title mb-2">{{ $video['name'] }}</h6>
                            <p class="text-muted mb-3">{{ $video['company'] }}</p>
                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#videoModal{{ $index }}">
                                <i class="fas fa-play me-2"></i>Watch Testimonial
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- All Testimonials Grid -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="animate-on-scroll">
                    <h2 class="display-5 fw-bold mb-4">More Client Feedback</h2>
                    <p class="lead text-muted">
                        Browse through more testimonials from satisfied clients across different industries.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Filter by Industry -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <div class="animate-on-scroll">
                    <div class="btn-group flex-wrap" role="group">
                        <button type="button" class="btn btn-outline-primary active" data-filter="all">All Industries</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="ecommerce">E-commerce</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="saas">SaaS</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="healthcare">Healthcare</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="finance">Finance</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="education">Education</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row testimonials-grid">
            @foreach($testimonials as $index => $testimonial)
            @if($index >= 3) <!-- Skip the first 3 featured ones -->
            <div class="col-lg-6 mb-4 testimonial-item animate-on-scroll" 
                 data-industry="{{ strtolower($testimonial['industry']) }}" 
                 style="animation-delay: {{ ($index - 3) * 0.1 }}s;">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Rating -->
                                <div class="mb-2">
                                    @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star text-warning small"></i>
                                    @endfor
                                </div>
                                
                                <!-- Testimonial -->
                                <blockquote class="mb-3">
                                    <p class="mb-0">"{{ $testimonial['content'] }}"</p>
                                </blockquote>
                                
                                <!-- Client Info -->
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary rounded-circle p-2 me-3">
                                        <i class="fas fa-user text-white small"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $testimonial['name'] }}</h6>
                                        <small class="text-muted">{{ $testimonial['position'] }}, {{ $testimonial['company'] }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="bg-light rounded-3 p-3">
                                    <div class="h5 text-success mb-1">{{ $testimonial['result'] }}</div>
                                    <small class="text-muted">Result Achieved</small>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-primary">{{ $testimonial['industry'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

<!-- Trust Indicators -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="animate-on-scroll">
                    <h2 class="display-5 fw-bold mb-4">Why Clients Choose Me</h2>
                    <p class="lead text-muted">
                        Beyond the results, here's what makes the working relationship special.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row">
            @php
                $trustFactors = [
                    ['icon' => 'fas fa-clock', 'title' => 'Always On Time', 'description' => 'Projects delivered on schedule, every time', 'color' => 'primary'],
                    ['icon' => 'fas fa-comments', 'title' => 'Clear Communication', 'description' => 'Regular updates and transparent process', 'color' => 'success'],
                    ['icon' => 'fas fa-chart-line', 'title' => 'Results-Focused', 'description' => 'Every word written with ROI in mind', 'color' => 'warning'],
                    ['icon' => 'fas fa-handshake', 'title' => 'Long-term Partnerships', 'description' => '85% of clients return for additional projects', 'color' => 'info'],
                    ['icon' => 'fas fa-shield-alt', 'title' => 'Confidentiality Guaranteed', 'description' => 'Your business secrets are safe with me', 'color' => 'secondary'],
                    ['icon' => 'fas fa-sync', 'title' => 'Unlimited Revisions', 'description' => 'Until you\'re 100% satisfied with the copy', 'color' => 'danger']
                ];
            @endphp
            
            @foreach($trustFactors as $index => $factor)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="animate-on-scroll" style="animation-delay: {{ $index * 0.1 }}s;">
                    <div class="text-center">
                        <div class="bg-{{ $factor['color'] }} bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;">
                            <i class="{{ $factor['icon'] }} fa-2x text-{{ $factor['color'] }}"></i>
                        </div>
                        <h5 class="fw-bold mb-3">{{ $factor['title'] }}</h5>
                        <p class="text-muted">{{ $factor['description'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="animate-on-scroll">
                    <h2 class="display-5 fw-bold mb-4">Ready to Join These Success Stories?</h2>
                    <p class="lead mb-4">
                        Let's create a testimonial for your business. Start your copywriting project today and see the difference strategic copy can make.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-comments me-2"></i>Start Your Project
                        </a>
                        <a href="{{ route('portfolio.index') }}" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-eye me-2"></i>View Portfolio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Modals -->
@foreach($videoTestimonials as $index => $video)
<div class="modal fade" id="videoModal{{ $index }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $video['name'] }} - {{ $video['company'] }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="ratio ratio-16x9">
                    <div class="d-flex align-items-center justify-content-center bg-light">
                        <div class="text-center text-muted">
                            <i class="fas fa-video fa-3x mb-3"></i>
                            <p>Video testimonial would be embedded here</p>
                            <small>In a real implementation, this would contain the actual video player</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@push('styles')
<style>
.testimonial-card {
    transition: all 0.3s ease;
}

.testimonial-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
}

.video-testimonial {
    transition: all 0.3s ease;
    cursor: pointer;
}

.video-testimonial:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

.play-button {
    transition: all 0.3s ease;
}

.video-testimonial:hover .play-button {
    transform: scale(1.1);
}

.testimonial-item {
    transition: all 0.3s ease;
}

.testimonial-item.hidden {
    opacity: 0;
    transform: scale(0.8);
    pointer-events: none;
}

.btn-group .btn {
    margin: 2px;
}

.btn-group .btn.active {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
}

.blockquote {
    font-style: italic;
}

@media (max-width: 768px) {
    .btn-group {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Testimonials filtering
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('[data-filter]');
    const testimonialItems = document.querySelectorAll('.testimonial-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter items
            testimonialItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-industry') === filter) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });
    });
    
    // Video thumbnail clicks
    const videoThumbnails = document.querySelectorAll('.video-testimonial');
    videoThumbnails.forEach((thumbnail, index) => {
        thumbnail.addEventListener('click', function() {
            const modal = new bootstrap.Modal(document.getElementById(`videoModal${index}`));
            modal.show();
        });
    });
});
</script>
@endpush