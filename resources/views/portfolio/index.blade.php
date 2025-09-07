@extends('layouts.app')

@section('title', 'Portfolio - Professional Copywriting Work & Case Studies')
@section('description', 'Explore my portfolio of successful copywriting projects including website copy, email campaigns, content strategy, and more with proven results.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <div class="animate-on-scroll">
                    <h1 class="display-4 fw-bold mb-4">
                        Portfolio of <span class="text-warning">Proven Results</span>
                    </h1>
                    <p class="lead mb-4">
                        Explore real projects with real results. Each case study demonstrates how strategic copywriting and content creation drive business growth.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="#portfolio" class="btn btn-light btn-lg">
                            <i class="fas fa-eye me-2"></i>View Projects
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-comments me-2"></i>Discuss Your Project
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="section-padding bg-light" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="animate-on-scroll">
                    <h2 class="display-5 fw-bold mb-4">Featured Work</h2>
                    <p class="lead text-muted mb-4">
                        Filter by category to see specific types of projects and their results.
                    </p>
                    
                    <!-- Filter Buttons -->
                    <div class="btn-group flex-wrap" role="group">
                        <button type="button" class="btn btn-outline-primary active" data-filter="all">All Projects</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="website">Website Copy</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="email">Email Marketing</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="social">Social Media</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="sales">Sales Copy</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="blog">Blog Writing</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="brand">Brand Copy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="section-padding">
    <div class="container">
        <div class="row portfolio-grid">
            @foreach($portfolioItems as $item)
            <div class="col-lg-4 col-md-6 mb-4 portfolio-item animate-on-scroll" 
                 data-category="{{ strtolower(str_replace(' ', '', explode(' ', $item['category'])[0])) }}" 
                 style="animation-delay: {{ $loop->index * 0.1 }}s;">
                <div class="card h-100 portfolio-card">
                    <div class="card-img-top position-relative overflow-hidden" style="height: 250px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                            <i class="fas fa-image fa-3x mb-2 opacity-50"></i>
                            <div class="small">{{ $item['category'] }}</div>
                        </div>
                        <div class="portfolio-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                            <a href="{{ route('portfolio.show', $item['id']) }}" class="btn btn-light btn-lg">
                                <i class="fas fa-eye me-2"></i>View Case Study
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-primary">{{ $item['category'] }}</span>
                            <small class="text-muted">{{ $item['client'] }}</small>
                        </div>
                        <h5 class="card-title mb-3">{{ $item['title'] }}</h5>
                        <p class="card-text text-muted mb-3">{{ $item['description'] }}</p>
                        
                        <!-- Tags -->
                        <div class="mb-3">
                            @foreach($item['tags'] as $tag)
                            <span class="badge bg-light text-dark me-1 mb-1">{{ $tag }}</span>
                            @endforeach
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('portfolio.show', $item['id']) }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-arrow-right me-1"></i>Read More
                            </a>
                            <div class="text-end">
                                <div class="small text-muted">Results</div>
                                <div class="fw-bold text-success">+{{ rand(25, 85) }}%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Load More Button -->
        <div class="text-center mt-5">
            <button class="btn btn-outline-primary btn-lg" id="loadMore">
                <i class="fas fa-plus me-2"></i>Load More Projects
            </button>
        </div>
    </div>
</section>

<!-- Results Summary -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="animate-on-scroll">
                    <h2 class="display-5 fw-bold mb-4">Collective Impact</h2>
                    <p class="lead text-muted">
                        The combined results from all portfolio projects demonstrate the power of strategic copywriting.
                    </p>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="animate-on-scroll">
                    <div class="bg-white rounded-3 p-4 shadow-sm h-100">
                        <div class="display-4 fw-bold text-primary mb-2">$2.5M+</div>
                        <h6 class="mb-2">Revenue Generated</h6>
                        <p class="text-muted small mb-0">Attributed to copywriting improvements</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="animate-on-scroll" style="animation-delay: 0.1s;">
                    <div class="bg-white rounded-3 p-4 shadow-sm h-100">
                        <div class="display-4 fw-bold text-success mb-2">75%</div>
                        <h6 class="mb-2">Average Conversion Increase</h6>
                        <p class="text-muted small mb-0">Across all website projects</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="animate-on-scroll" style="animation-delay: 0.2s;">
                    <div class="bg-white rounded-3 p-4 shadow-sm h-100">
                        <div class="display-4 fw-bold text-warning mb-2">85%</div>
                        <h6 class="mb-2">Email Open Rate Improvement</h6>
                        <p class="text-muted small mb-0">Average across email campaigns</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="animate-on-scroll" style="animation-delay: 0.3s;">
                    <div class="bg-white rounded-3 p-4 shadow-sm h-100">
                        <div class="display-4 fw-bold text-info mb-2">200%</div>
                        <h6 class="mb-2">Social Media Growth</h6>
                        <p class="text-muted small mb-0">Average follower increase</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Client Testimonials -->
<section class="section-padding">
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
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100 animate-on-scroll">
                    <div class="card-body text-center p-4">
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
                                <h6 class="mb-0">Sarah Johnson</h6>
                                <small class="text-muted">Fashion Forward CEO</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 animate-on-scroll" style="animation-delay: 0.1s;">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-quote-left fa-2x text-primary opacity-50"></i>
                        </div>
                        <p class="card-text mb-4">
                            "Our email campaigns went from being ignored to being eagerly anticipated. Open rates tripled and sales from email increased by 400%."
                        </p>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="bg-secondary rounded-circle p-2 me-3">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div class="text-start">
                                <h6 class="mb-0">Michael Chen</h6>
                                <small class="text-muted">Tech Startup Founder</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 animate-on-scroll" style="animation-delay: 0.2s;">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-quote-left fa-2x text-primary opacity-50"></i>
                        </div>
                        <p class="card-text mb-4">
                            "The content strategy completely transformed our brand voice. We went from generic to memorable, and our engagement rates soared."
                        </p>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="bg-success rounded-circle p-2 me-3">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div class="text-start">
                                <h6 class="mb-0">Emily Rodriguez</h6>
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
<section class="section-padding bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="animate-on-scroll">
                    <h2 class="display-5 fw-bold mb-4">Ready for Similar Results?</h2>
                    <p class="lead mb-4">
                        Let's discuss how we can create a success story for your business with strategic copywriting and content creation.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-comments me-2"></i>Start Your Project
                        </a>
                        <a href="{{ route('services') }}" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-info-circle me-2"></i>View Services
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.portfolio-card {
    transition: all 0.3s ease;
    overflow: hidden;
}

.portfolio-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.portfolio-overlay {
    background: rgba(0,0,0,0.8);
    opacity: 0;
    transition: all 0.3s ease;
}

.portfolio-card:hover .portfolio-overlay {
    opacity: 1;
}

.portfolio-item {
    transition: all 0.3s ease;
}

.portfolio-item.hidden {
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
// Portfolio filtering
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('[data-filter]');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter items
            portfolioItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });
    });
    
    // Load more functionality (placeholder)
    const loadMoreBtn = document.getElementById('loadMore');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            // In a real application, this would load more items via AJAX
            this.innerHTML = '<i class="fas fa-check me-2"></i>All Projects Loaded';
            this.disabled = true;
        });
    }
});
</script>
@endpush