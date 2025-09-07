@extends('layouts.app')

@section('title', $portfolio['title'] . ' - Case Study')
@section('description', 'Detailed case study of ' . $portfolio['title'] . ' - ' . $portfolio['description'])

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <div class="animate-on-scroll">
                    <div class="mb-3">
                        <a href="{{ route('portfolio.index') }}" class="btn btn-outline-light">
                            <i class="fas fa-arrow-left me-2"></i>Back to Portfolio
                        </a>
                    </div>
                    <span class="badge bg-warning text-dark mb-3 fs-6">{{ $portfolio['category'] }}</span>
                    <h1 class="display-4 fw-bold mb-4">{{ $portfolio['title'] }}</h1>
                    <p class="lead mb-4">{{ $portfolio['description'] }}</p>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="mb-2">
                                <i class="fas fa-building text-warning"></i>
                            </div>
                            <h6>Client</h6>
                            <p class="text-light">{{ $portfolio['client'] }}</p>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2">
                                <i class="fas fa-calendar text-warning"></i>
                            </div>
                            <h6>Duration</h6>
                            <p class="text-light">{{ $portfolio['duration'] ?? '3 months' }}</p>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2">
                                <i class="fas fa-chart-line text-warning"></i>
                            </div>
                            <h6>Results</h6>
                            <p class="text-warning fw-bold">{{ $portfolio['result_summary'] ?? '+65% Conversion' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Project Overview -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="animate-on-scroll">
                    <h2 class="display-6 fw-bold mb-4">Project Overview</h2>
                    <div class="row mb-5">
                        <div class="col-md-8">
                            <p class="lead mb-4">{{ $portfolio['overview'] ?? $portfolio['description'] }}</p>
                            
                            <!-- Tags -->
                            <div class="mb-4">
                                <h6 class="mb-3">Project Tags</h6>
                                @foreach($portfolio['tags'] as $tag)
                                <span class="badge bg-primary me-2 mb-2">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-light rounded-3 p-4">
                                <h6 class="fw-bold mb-3">Project Details</h6>
                                <div class="mb-3">
                                    <strong>Industry:</strong><br>
                                    <span class="text-muted">{{ $portfolio['industry'] ?? 'E-commerce' }}</span>
                                </div>
                                <div class="mb-3">
                                    <strong>Project Type:</strong><br>
                                    <span class="text-muted">{{ $portfolio['category'] }}</span>
                                </div>
                                <div class="mb-3">
                                    <strong>Team Size:</strong><br>
                                    <span class="text-muted">{{ $portfolio['team_size'] ?? '3 members' }}</span>
                                </div>
                                <div class="mb-3">
                                    <strong>Budget Range:</strong><br>
                                    <span class="text-muted">{{ $portfolio['budget'] ?? '$5,000 - $10,000' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Challenge Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="animate-on-scroll">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="display-1 text-danger opacity-25 mb-3">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <h2 class="display-6 fw-bold mb-4">The Challenge</h2>
                            <p class="lead mb-4">{{ $portfolio['challenge'] }}</p>
                            
                            <!-- Key Issues -->
                            <div class="mb-4">
                                <h6 class="fw-bold mb-3">Key Issues Identified:</h6>
                                <ul class="list-unstyled">
                                    @php
                                        $issues = [
                                            'Low conversion rates on landing pages',
                                            'Unclear value proposition messaging',
                                            'Poor email engagement metrics',
                                            'Inconsistent brand voice across channels'
                                        ];
                                    @endphp
                                    @foreach($issues as $issue)
                                    <li class="mb-2">
                                        <i class="fas fa-times-circle text-danger me-2"></i>
                                        {{ $issue }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-white rounded-3 p-4 shadow-sm">
                                <h6 class="fw-bold mb-3">Before Metrics</h6>
                                <div class="row text-center">
                                    <div class="col-6 mb-3">
                                        <div class="display-6 fw-bold text-danger">2.1%</div>
                                        <small class="text-muted">Conversion Rate</small>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="display-6 fw-bold text-danger">18%</div>
                                        <small class="text-muted">Email Open Rate</small>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="display-6 fw-bold text-danger">45s</div>
                                        <small class="text-muted">Avg. Session</small>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="display-6 fw-bold text-danger">68%</div>
                                        <small class="text-muted">Bounce Rate</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Solution Section -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="animate-on-scroll">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="bg-primary bg-opacity-10 rounded-3 p-4 shadow-sm">
                                <h6 class="fw-bold mb-3">Solution Strategy</h6>
                                <div class="mb-4">
                                    @php
                                        $strategies = [
                                            'Comprehensive content audit and analysis',
                                            'Customer journey mapping and optimization',
                                            'A/B testing of key messaging elements',
                                            'Brand voice development and guidelines',
                                            'Conversion-focused copywriting implementation'
                                        ];
                                    @endphp
                                    @foreach($strategies as $index => $strategy)
                                    <div class="d-flex align-items-start mb-3">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 30px; height: 30px; font-size: 14px;">
                                            {{ $index + 1 }}
                                        </div>
                                        <div>
                                            <p class="mb-0">{{ $strategy }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="display-1 text-success opacity-25 mb-3">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <h2 class="display-6 fw-bold mb-4">The Solution</h2>
                            <p class="lead mb-4">{{ $portfolio['solution'] }}</p>
                            
                            <!-- Implementation Timeline -->
                            <div class="mb-4">
                                <h6 class="fw-bold mb-3">Implementation Timeline:</h6>
                                <div class="timeline">
                                    <div class="timeline-item mb-3">
                                        <div class="timeline-marker bg-primary"></div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Week 1-2: Research & Analysis</h6>
                                            <p class="text-muted mb-0">Comprehensive audit and strategy development</p>
                                        </div>
                                    </div>
                                    <div class="timeline-item mb-3">
                                        <div class="timeline-marker bg-warning"></div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Week 3-6: Content Creation</h6>
                                            <p class="text-muted mb-0">New copy development and optimization</p>
                                        </div>
                                    </div>
                                    <div class="timeline-item mb-3">
                                        <div class="timeline-marker bg-success"></div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Week 7-8: Testing & Launch</h6>
                                            <p class="text-muted mb-0">A/B testing and performance monitoring</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Results Section -->
<section class="section-padding bg-success text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="animate-on-scroll">
                    <div class="display-1 opacity-25 mb-3">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h2 class="display-6 fw-bold mb-4">The Results</h2>
                    <p class="lead mb-5">{{ $portfolio['results'] }}</p>
                    
                    <!-- Metrics Comparison -->
                    <div class="row">
                        <div class="col-md-3 col-6 mb-4">
                            <div class="bg-white bg-opacity-20 rounded-3 p-4">
                                <div class="display-5 fw-bold mb-2">6.8%</div>
                                <h6 class="mb-2">Conversion Rate</h6>
                                <div class="badge bg-light text-success">+224% Increase</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="bg-white bg-opacity-20 rounded-3 p-4">
                                <div class="display-5 fw-bold mb-2">42%</div>
                                <h6 class="mb-2">Email Open Rate</h6>
                                <div class="badge bg-light text-success">+133% Increase</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="bg-white bg-opacity-20 rounded-3 p-4">
                                <div class="display-5 fw-bold mb-2">2:45</div>
                                <h6 class="mb-2">Avg. Session</h6>
                                <div class="badge bg-light text-success">+267% Increase</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="bg-white bg-opacity-20 rounded-3 p-4">
                                <div class="display-5 fw-bold mb-2">28%</div>
                                <h6 class="mb-2">Bounce Rate</h6>
                                <div class="badge bg-light text-success">-59% Decrease</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Client Testimonial -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="animate-on-scroll">
                    <div class="text-center mb-5">
                        <h2 class="display-6 fw-bold mb-4">Client Testimonial</h2>
                    </div>
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5 text-center">
                            <div class="display-4 text-primary opacity-25 mb-4">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <blockquote class="blockquote mb-4">
                                <p class="lead">{{ $portfolio['testimonial'] }}</p>
                            </blockquote>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="bg-primary rounded-circle p-3 me-4">
                                    <i class="fas fa-user fa-2x text-white"></i>
                                </div>
                                <div class="text-start">
                                    <h5 class="mb-1">{{ $portfolio['testimonial_author'] ?? 'Sarah Johnson' }}</h5>
                                    <p class="text-muted mb-0">{{ $portfolio['testimonial_title'] ?? 'CEO, ' . $portfolio['client'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Key Takeaways -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="animate-on-scroll">
                    <h2 class="display-6 fw-bold mb-4 text-center">Key Takeaways</h2>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-2">Strategic Messaging</h6>
                                    <p class="text-muted mb-0">Clear, benefit-focused messaging significantly improved user engagement and conversion rates.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-start">
                                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-2">Data-Driven Approach</h6>
                                    <p class="text-muted mb-0">Continuous testing and optimization led to sustained performance improvements.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-start">
                                <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-2">Customer-Centric Copy</h6>
                                    <p class="text-muted mb-0">Understanding the target audience was crucial for creating resonant messaging.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-start">
                                <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-sync"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-2">Iterative Improvement</h6>
                                    <p class="text-muted mb-0">Regular updates and refinements maintained and improved performance over time.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Projects -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="animate-on-scroll">
                    <h2 class="display-6 fw-bold mb-4 text-center">Related Projects</h2>
                    <div class="row">
                        @php
                            $relatedProjects = [
                                ['title' => 'E-commerce Email Campaign', 'category' => 'Email Marketing', 'result' => '+180% Revenue'],
                                ['title' => 'SaaS Landing Page Optimization', 'category' => 'Website Copy', 'result' => '+95% Signups'],
                                ['title' => 'Social Media Content Strategy', 'category' => 'Social Media', 'result' => '+250% Engagement']
                            ];
                        @endphp
                        @foreach($relatedProjects as $project)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 60px; height: 60px;">
                                        <i class="fas fa-file-alt fa-2x text-primary"></i>
                                    </div>
                                    <h6 class="card-title mb-2">{{ $project['title'] }}</h6>
                                    <p class="text-muted small mb-2">{{ $project['category'] }}</p>
                                    <div class="badge bg-success">{{ $project['result'] }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('portfolio.index') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-eye me-2"></i>View All Projects
                        </a>
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
                    <h2 class="display-5 fw-bold mb-4">Ready to Achieve Similar Results?</h2>
                    <p class="lead mb-4">
                        Let's discuss how strategic copywriting can transform your business performance and drive measurable growth.
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
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #dee2e6;
}

.timeline-item {
    position: relative;
}

.timeline-marker {
    position: absolute;
    left: -37px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid white;
}

.timeline-content {
    padding-bottom: 20px;
}

.blockquote {
    font-size: 1.25rem;
    font-style: italic;
}

@media (max-width: 768px) {
    .timeline {
        padding-left: 20px;
    }
    
    .timeline-marker {
        left: -27px;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Smooth scrolling for anchor links
document.addEventListener('DOMContentLoaded', function() {
    // Add any specific JavaScript for the case study page
    console.log('Portfolio case study loaded');
});
</script>
@endpush