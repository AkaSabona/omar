@extends('layouts.app')

@section('title', 'Services - Professional Copywriting & Content Creation')
@section('description', 'Comprehensive copywriting and content creation services including website copy, email marketing, content strategy, social media content, and more.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <div class="animate-on-scroll">
                    <h1 class="display-4 fw-bold mb-4">
                        Services That <span class="text-warning">Drive Results</span>
                    </h1>
                    <p class="lead mb-4">
                        From compelling website copy to strategic content planning, I offer comprehensive copywriting and content creation services that help businesses grow and connect with their audience.
                    </p>
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-comments me-2"></i>Discuss Your Project
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            @foreach($services as $index => $service)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 animate-on-scroll" style="--animation-delay: {{ $index * 0.1 }}s; animation-delay: var(--animation-delay);">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="{{ $service['icon'] }} fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title mb-3">{{ $service['title'] }}</h5>
                        <p class="card-text text-muted mb-4">{{ $service['description'] }}</p>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Detailed Services -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="animate-on-scroll">
                    <h2 class="display-5 fw-bold mb-4">What's Included</h2>
                    <p class="lead text-muted">
                        Each service is tailored to your specific needs and includes comprehensive support throughout the process.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Website Copywriting -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4">
                <div class="animate-on-scroll">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary rounded-circle p-2 me-3">
                            <i class="fas fa-globe text-white"></i>
                        </div>
                        <h3 class="mb-0">Website Copywriting</h3>
                    </div>
                    <p class="mb-3">
                        Transform your website into a conversion machine with compelling copy that speaks directly to your audience and drives action.
                    </p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Homepage copy that converts</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>About page storytelling</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Service/product descriptions</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Landing page optimization</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Call-to-action optimization</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="animate-on-scroll" style="animation-delay: 0.2s;">
                    <div class="bg-white rounded-3 p-4 shadow">
                        <h6 class="text-primary mb-3">Typical Results:</h6>
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="h4 text-success mb-1">65%</div>
                                <small class="text-muted">Conversion Increase</small>
                            </div>
                            <div class="col-4">
                                <div class="h4 text-success mb-1">40%</div>
                                <small class="text-muted">Bounce Rate Reduction</small>
                            </div>
                            <div class="col-4">
                                <div class="h4 text-success mb-1">25%</div>
                                <small class="text-muted">Time on Page Increase</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Email Marketing -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 order-lg-2">
                <div class="animate-on-scroll">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-secondary rounded-circle p-2 me-3">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <h3 class="mb-0">Email Marketing</h3>
                    </div>
                    <p class="mb-3">
                        Build relationships and drive sales with email campaigns that your subscribers actually want to read and act upon.
                    </p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Welcome email sequences</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Newsletter content</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Promotional campaigns</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Automated drip sequences</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Re-engagement campaigns</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 mb-4 order-lg-1">
                <div class="animate-on-scroll" style="animation-delay: 0.2s;">
                    <div class="bg-white rounded-3 p-4 shadow">
                        <h6 class="text-secondary mb-3">Typical Results:</h6>
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="h4 text-success mb-1">80%</div>
                                <small class="text-muted">Open Rate Increase</small>
                            </div>
                            <div class="col-4">
                                <div class="h4 text-success mb-1">120%</div>
                                <small class="text-muted">Click Rate Boost</small>
                            </div>
                            <div class="col-4">
                                <div class="h4 text-success mb-1">45%</div>
                                <small class="text-muted">Revenue Growth</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Content Strategy -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4">
                <div class="animate-on-scroll">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success rounded-circle p-2 me-3">
                            <i class="fas fa-chart-line text-white"></i>
                        </div>
                        <h3 class="mb-0">Content Strategy</h3>
                    </div>
                    <p class="mb-3">
                        Develop a comprehensive content strategy that aligns with your business goals and resonates with your target audience.
                    </p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Content audit and analysis</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Editorial calendar creation</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Brand voice development</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Content distribution strategy</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Performance tracking setup</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="animate-on-scroll" style="animation-delay: 0.2s;">
                    <div class="bg-white rounded-3 p-4 shadow">
                        <h6 class="text-success mb-3">Typical Results:</h6>
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="h4 text-success mb-1">150%</div>
                                <small class="text-muted">Traffic Growth</small>
                            </div>
                            <div class="col-4">
                                <div class="h4 text-success mb-1">200%</div>
                                <small class="text-muted">Engagement Boost</small>
                            </div>
                            <div class="col-4">
                                <div class="h4 text-success mb-1">75%</div>
                                <small class="text-muted">Lead Generation</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="animate-on-scroll">
                    <h2 class="display-5 fw-bold mb-4">My Process</h2>
                    <p class="lead text-muted">
                        A proven methodology that ensures every project delivers exceptional results.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center animate-on-scroll">
                    <div class="bg-primary rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <span class="text-white fw-bold fs-4">1</span>
                    </div>
                    <h5 class="mb-3">Discovery</h5>
                    <p class="text-muted">Deep dive into your business, audience, and goals to understand what makes you unique.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center animate-on-scroll" style="animation-delay: 0.1s;">
                    <div class="bg-secondary rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <span class="text-white fw-bold fs-4">2</span>
                    </div>
                    <h5 class="mb-3">Strategy</h5>
                    <p class="text-muted">Develop a comprehensive strategy that aligns with your objectives and resonates with your audience.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center animate-on-scroll" style="animation-delay: 0.2s;">
                    <div class="bg-success rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <span class="text-white fw-bold fs-4">3</span>
                    </div>
                    <h5 class="mb-3">Creation</h5>
                    <p class="text-muted">Craft compelling copy and content that captures attention and drives action.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center animate-on-scroll" style="animation-delay: 0.3s;">
                    <div class="bg-warning rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <span class="text-white fw-bold fs-4">4</span>
                    </div>
                    <h5 class="mb-3">Optimization</h5>
                    <p class="text-muted">Test, measure, and refine to ensure maximum performance and ROI.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="animate-on-scroll">
                    <h2 class="display-5 fw-bold mb-4">Investment Options</h2>
                    <p class="lead text-muted">
                        Flexible pricing options to fit your budget and project needs.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100 animate-on-scroll">
                    <div class="card-body text-center p-4">
                        <h5 class="card-title mb-3">Project-Based</h5>
                        <div class="mb-3">
                            <span class="h2 text-primary">$2,500</span>
                            <span class="text-muted">- $15,000</span>
                        </div>
                        <p class="card-text mb-4">Perfect for specific projects with defined scope and deliverables.</p>
                        <ul class="list-unstyled text-start mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Fixed scope projects</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Clear deliverables</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Timeline-based</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>2 rounds of revisions</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary">Get Quote</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-primary animate-on-scroll" style="animation-delay: 0.1s;">
                    <div class="card-header bg-primary text-white text-center">
                        <span class="badge bg-warning text-dark">Most Popular</span>
                    </div>
                    <div class="card-body text-center p-4">
                        <h5 class="card-title mb-3">Monthly Retainer</h5>
                        <div class="mb-3">
                            <span class="h2 text-primary">$5,000</span>
                            <span class="text-muted">/month</span>
                        </div>
                        <p class="card-text mb-4">Ongoing partnership for continuous content needs and strategy.</p>
                        <ul class="list-unstyled text-start mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Ongoing support</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Priority scheduling</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Strategic consultation</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Unlimited revisions</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-primary">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 animate-on-scroll" style="animation-delay: 0.2s;">
                    <div class="card-body text-center p-4">
                        <h5 class="card-title mb-3">Hourly Consultation</h5>
                        <div class="mb-3">
                            <span class="h2 text-primary">$150</span>
                            <span class="text-muted">/hour</span>
                        </div>
                        <p class="card-text mb-4">Flexible option for strategy sessions and smaller tasks.</p>
                        <ul class="list-unstyled text-start mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Flexible scheduling</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Strategy sessions</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Content audits</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Quick consultations</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary">Book Session</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="animate-on-scroll">
                    <h2 class="display-5 fw-bold mb-4">Frequently Asked Questions</h2>
                    <p class="lead text-muted">
                        Common questions about my services and process.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item animate-on-scroll">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                How long does a typical project take?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Project timelines vary depending on scope and complexity. A typical website copy project takes 2-3 weeks, while comprehensive content strategies may take 4-6 weeks. I always provide detailed timelines during the discovery phase.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll" style="animation-delay: 0.1s;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Do you work with businesses in my industry?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                I've worked with businesses across various industries including SaaS, e-commerce, healthcare, finance, and professional services. My approach focuses on understanding your unique audience and value proposition, regardless of industry.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll" style="animation-delay: 0.2s;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                What if I'm not satisfied with the results?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                I'm committed to your success. All projects include revision rounds, and I work closely with you to ensure the final deliverables meet your expectations. I also offer a satisfaction guarantee on all project-based work.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll" style="animation-delay: 0.3s;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Can you help with ongoing content needs?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Absolutely! I offer monthly retainer packages for businesses with ongoing content needs. This includes regular content creation, strategy updates, and priority support for urgent projects.
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
                    <h2 class="display-5 fw-bold mb-4">Ready to Get Started?</h2>
                    <p class="lead mb-4">
                        Let's discuss your project and create content that drives real results for your business.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-comments me-2"></i>Start Your Project
                        </a>
                        <a href="{{ route('portfolio') }}" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-eye me-2"></i>View Portfolio
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
.accordion-button {
    font-weight: 500;
}

.accordion-button:not(.collapsed) {
    background-color: var(--bs-primary);
    color: white;
}

.card.border-primary {
    border-width: 2px;
    transform: scale(1.05);
}

.card.border-primary .card-body {
    position: relative;
}
</style>
@endpush