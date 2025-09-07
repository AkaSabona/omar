@extends('layouts.app')

@section('title', 'Blog - Copywriting Tips, Strategies & Industry Insights')
@section('description', 'Discover proven copywriting strategies, marketing insights, and industry trends. Learn how to improve your content and drive better business results.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <div class="animate-on-scroll">
                    <h1 class="display-4 fw-bold mb-4">
                        Copywriting <span class="text-warning">Insights</span> & Strategies
                    </h1>
                    <p class="lead mb-4">
                        Discover proven strategies, industry insights, and actionable tips to improve your copywriting and content marketing results.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="#latest-posts" class="btn btn-light btn-lg">
                            <i class="fas fa-book-open me-2"></i>Read Latest Posts
                        </a>
                        <a href="#categories" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-tags me-2"></i>Browse Categories
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Post -->
<section class="section-padding" id="latest-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="animate-on-scroll">
                    @if(isset($blogPosts[0]))
                    <div class="card border-0 shadow-lg mb-5">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <div class="card-img-left h-100 position-relative" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 300px;">
                                    <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                                        <i class="fas fa-star fa-4x mb-3 opacity-50"></i>
                                        <div class="h5">Featured Post</div>
                                    </div>
                                    <div class="position-absolute top-0 start-0 m-3">
                                        <span class="badge bg-warning text-dark">Featured</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="badge bg-primary">{{ $blogPosts[0]['category'] }}</span>
                                        <small class="text-muted">{{ $blogPosts[0]['date'] }}</small>
                                    </div>
                                    <h3 class="card-title mb-3">{{ $blogPosts[0]['title'] }}</h3>
                                    <p class="card-text text-muted mb-4">{{ $blogPosts[0]['excerpt'] }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="#" class="btn btn-primary">
                                            <i class="fas fa-arrow-right me-2"></i>Read Full Article
                                        </a>
                                        <div class="d-flex align-items-center text-muted">
                                            <i class="fas fa-clock me-1"></i>
                                            <small>{{ $blogPosts[0]['read_time'] }} min read</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="section-padding bg-light" id="categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="animate-on-scroll">
                    <h2 class="display-5 fw-bold mb-4">Browse by Category</h2>
                    <p class="lead text-muted">
                        Find articles that match your specific interests and needs.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @php
                $categories = [
                    ['name' => 'Copywriting Tips', 'icon' => 'fas fa-pen-fancy', 'count' => 12, 'color' => 'primary'],
                    ['name' => 'Email Marketing', 'icon' => 'fas fa-envelope', 'count' => 8, 'color' => 'success'],
                    ['name' => 'Content Strategy', 'icon' => 'fas fa-chess', 'count' => 6, 'color' => 'warning'],
                    ['name' => 'Conversion Optimization', 'icon' => 'fas fa-chart-line', 'count' => 9, 'color' => 'info'],
                    ['name' => 'Industry Insights', 'icon' => 'fas fa-lightbulb', 'count' => 7, 'color' => 'secondary'],
                    ['name' => 'Case Studies', 'icon' => 'fas fa-microscope', 'count' => 5, 'color' => 'danger']
                ];
            @endphp
            @foreach($categories as $index => $category)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="animate-on-scroll" style="animation-delay: {{ $index * 0.1 }}s;">
                    <div class="card h-100 border-0 shadow-sm category-card" data-category="{{ strtolower(str_replace(' ', '-', $category['name'])) }}">
                        <div class="card-body text-center p-4">
                            <div class="bg-{{ $category['color'] }} bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;">
                                <i class="{{ $category['icon'] }} fa-2x text-{{ $category['color'] }}"></i>
                            </div>
                            <h5 class="card-title mb-3">{{ $category['name'] }}</h5>
                            <p class="text-muted mb-3">{{ $category['count'] }} articles</p>
                            <a href="#" class="btn btn-outline-{{ $category['color'] }} btn-sm">
                                <i class="fas fa-arrow-right me-1"></i>Browse Articles
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Blog Posts Grid -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="animate-on-scroll">
                    <h2 class="display-5 fw-bold mb-4">Latest Articles</h2>
                    <p class="lead text-muted">
                        Stay updated with the latest copywriting strategies and marketing insights.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Filter Buttons -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <div class="animate-on-scroll">
                    <div class="btn-group flex-wrap" role="group">
                        <button type="button" class="btn btn-outline-primary active" data-filter="all">All Posts</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="copywriting">Copywriting</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="email">Email Marketing</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="strategy">Strategy</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="conversion">Conversion</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="insights">Insights</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row blog-grid">
            @foreach($blogPosts as $index => $post)
            @if($index > 0) <!-- Skip the first post as it's featured -->
            <div class="col-lg-4 col-md-6 mb-4 blog-item animate-on-scroll" 
                 data-category="{{ strtolower(str_replace(' ', '', explode(' ', $post['category'])[0])) }}" 
                 style="animation-delay: {{ ($index - 1) * 0.1 }}s;">
                <div class="card h-100 border-0 shadow-sm blog-card">
                    <div class="card-img-top position-relative" style="height: 200px; background: linear-gradient(135deg, {{ ['#667eea', '#764ba2', '#f093fb', '#f5576c', '#4facfe', '#00f2fe'][($index - 1) % 6] }} 0%, {{ ['#764ba2', '#667eea', '#f5576c', '#f093fb', '#00f2fe', '#4facfe'][($index - 1) % 6] }} 100%);">
                        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                            <i class="fas fa-{{ ['book-open', 'envelope', 'chart-line', 'lightbulb', 'cogs', 'users'][($index - 1) % 6] }} fa-3x opacity-50"></i>
                        </div>
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge bg-white text-dark">{{ $post['category'] }}</span>
                        </div>
                        <div class="position-absolute bottom-0 end-0 m-3">
                            <small class="badge bg-dark bg-opacity-75">{{ $post['read_time'] }} min</small>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted">{{ $post['date'] }}</small>
                            <small class="text-muted">By {{ $post['author'] }}</small>
                        </div>
                        <h5 class="card-title mb-3">{{ $post['title'] }}</h5>
                        <p class="card-text text-muted mb-3">{{ $post['excerpt'] }}</p>
                        
                        <!-- Tags -->
                        <div class="mb-3">
                            @foreach($post['tags'] as $tag)
                            <span class="badge bg-light text-dark me-1 mb-1">{{ $tag }}</span>
                            @endforeach
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-arrow-right me-1"></i>Read More
                            </a>
                            <div class="d-flex align-items-center text-muted">
                                <i class="fas fa-eye me-1"></i>
                                <small>{{ rand(150, 850) }} views</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        
        <!-- Load More Button -->
        <div class="text-center mt-5">
            <button class="btn btn-outline-primary btn-lg" id="loadMore">
                <i class="fas fa-plus me-2"></i>Load More Articles
            </button>
        </div>
    </div>
</section>

<!-- Newsletter Signup -->
<section class="section-padding bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="animate-on-scroll">
                    <div class="display-1 opacity-25 mb-3">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <h2 class="display-5 fw-bold mb-4">Stay Updated</h2>
                    <p class="lead mb-4">
                        Get the latest copywriting tips, strategies, and industry insights delivered straight to your inbox. No spam, just valuable content.
                    </p>
                    
                    <form class="row g-3 justify-content-center" id="newsletterForm">
                        <div class="col-md-6">
                            <input type="email" class="form-control form-control-lg" placeholder="Enter your email address" required>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-light btn-lg w-100">
                                <i class="fas fa-paper-plane me-2"></i>Subscribe
                            </button>
                        </div>
                    </form>
                    
                    <div class="row text-center mt-5">
                        <div class="col-md-4">
                            <div class="display-6 fw-bold mb-2">2,500+</div>
                            <p class="mb-0">Subscribers</p>
                        </div>
                        <div class="col-md-4">
                            <div class="display-6 fw-bold mb-2">Weekly</div>
                            <p class="mb-0">New Content</p>
                        </div>
                        <div class="col-md-4">
                            <div class="display-6 fw-bold mb-2">0</div>
                            <p class="mb-0">Spam Ever</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular Posts -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="animate-on-scroll">
                    <div class="text-center mb-5">
                        <h2 class="display-5 fw-bold mb-4">Most Popular Posts</h2>
                        <p class="lead text-muted">
                            Our readers' favorite articles that have helped transform their copywriting.
                        </p>
                    </div>
                    
                    @php
                        $popularPosts = [
                            ['title' => '10 Psychological Triggers That Make Copy Convert', 'views' => '12.5K', 'category' => 'Copywriting Tips'],
                            ['title' => 'How to Write Email Subject Lines That Get Opened', 'views' => '9.8K', 'category' => 'Email Marketing'],
                            ['title' => 'The Ultimate Guide to Landing Page Copy', 'views' => '8.2K', 'category' => 'Conversion Optimization'],
                            ['title' => 'Content Strategy Framework for 2024', 'views' => '7.1K', 'category' => 'Content Strategy'],
                            ['title' => 'Case Study: How We Increased Conversions by 340%', 'views' => '6.9K', 'category' => 'Case Studies']
                        ];
                    @endphp
                    
                    @foreach($popularPosts as $index => $post)
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-1 text-center">
                                    <div class="display-6 fw-bold text-primary">#{{ $index + 1 }}</div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="card-title mb-2">{{ $post['title'] }}</h6>
                                    <span class="badge bg-primary me-2">{{ $post['category'] }}</span>
                                    <small class="text-muted">{{ $post['views'] }} views</small>
                                </div>
                                <div class="col-md-3 text-end">
                                    <a href="#" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-arrow-right me-1"></i>Read
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="animate-on-scroll">
                    <h2 class="display-5 fw-bold mb-4">Ready to Apply These Strategies?</h2>
                    <p class="lead mb-4">
                        Reading about copywriting is great, but implementing it is where the magic happens. Let's work together to transform your content.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-comments me-2"></i>Start Your Project
                        </a>
                        <a href="{{ route('services') }}" class="btn btn-outline-primary btn-lg">
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
.blog-card {
    transition: all 0.3s ease;
    overflow: hidden;
}

.blog-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.category-card {
    transition: all 0.3s ease;
    cursor: pointer;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

.blog-item {
    transition: all 0.3s ease;
}

.blog-item.hidden {
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

#newsletterForm .form-control:focus {
    border-color: white;
    box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
}

@media (max-width: 768px) {
    .btn-group {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    
    #newsletterForm .col-md-3 {
        margin-top: 10px;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Blog filtering
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('[data-filter]');
    const blogItems = document.querySelectorAll('.blog-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter items
            blogItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });
    });
    
    // Load more functionality
    const loadMoreBtn = document.getElementById('loadMore');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            // In a real application, this would load more items via AJAX
            this.innerHTML = '<i class="fas fa-check me-2"></i>All Articles Loaded';
            this.disabled = true;
        });
    }
    
    // Newsletter form
    const newsletterForm = document.getElementById('newsletterForm');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Subscribing...';
            submitBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                submitBtn.innerHTML = '<i class="fas fa-check me-2"></i>Subscribed!';
                submitBtn.classList.remove('btn-light');
                submitBtn.classList.add('btn-success');
                
                // Reset form
                this.reset();
                
                // Reset button after 3 seconds
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('btn-success');
                    submitBtn.classList.add('btn-light');
                }, 3000);
            }, 2000);
        });
    }
    
    // Category card clicks
    const categoryCards = document.querySelectorAll('.category-card');
    categoryCards.forEach(card => {
        card.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            // In a real application, this would filter or navigate to category page
            console.log('Filter by category:', category);
        });
    });
});
</script>
@endpush