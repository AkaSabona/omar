@extends('layouts.app')

@section('title', 'Contact - Get In Touch for Your Copywriting Project')
@section('description', 'Ready to transform your business with strategic copywriting? Contact me to discuss your project needs, timeline, and how we can achieve your goals together.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <div class="animate-on-scroll">
                    <h1 class="display-4 fw-bold mb-4">
                        Let's Create Something <span class="text-warning">Amazing</span> Together
                    </h1>
                    <p class="lead mb-4">
                        Ready to transform your business with strategic copywriting and content creation? Let's discuss your project and explore how we can achieve your goals.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="#contact-form" class="btn btn-light btn-lg">
                            <i class="fas fa-paper-plane me-2"></i>Send Message
                        </a>
                        <a href="#contact-info" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-phone me-2"></i>Contact Info
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Moved to Home Page CTA Section -->
<section class="section-padding" id="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="animate-on-scroll">
                    <div class="mb-5">
                        <h2 class="display-5 fw-bold mb-4">Contact Form Available on Home Page</h2>
                        <p class="lead text-muted mb-4">
                            The contact form has been moved to the home page for easier access. You can find it in the "Ready to Transform Your Content?" section.
                        </p>
                        <a href="{{ route('home') }}#cta-section" class="btn btn-primary btn-lg">
                            <i class="fas fa-arrow-left me-2"></i>Go to Contact Form
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="section-padding bg-light" id="contact-info">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="animate-on-scroll">
                    <div class="text-center mb-5">
                        <h2 class="display-5 fw-bold mb-4">Get In Touch</h2>
                        <p class="lead text-muted">
                            Prefer to reach out directly? Here are all the ways you can contact me.
                        </p>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 text-center border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;">
                                        <i class="fas fa-envelope fa-2x text-primary"></i>
                                    </div>
                                    <h5 class="fw-bold mb-3">Email</h5>
                                    <p class="text-muted mb-3">Send me a detailed message about your project</p>
                                    <a href="mailto:omar@copywriter.com" class="btn btn-outline-primary">
                                        omar@copywriter.com
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 text-center border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;">
                                        <i class="fas fa-phone fa-2x text-success"></i>
                                    </div>
                                    <h5 class="fw-bold mb-3">Phone</h5>
                                    <p class="text-muted mb-3">Call for urgent projects or quick consultations</p>
                                    <a href="tel:+1234567890" class="btn btn-outline-success">
                                        +1 (234) 567-8900
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 text-center border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <div class="bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;">
                                        <i class="fab fa-linkedin fa-2x text-info"></i>
                                    </div>
                                    <h5 class="fw-bold mb-3">LinkedIn</h5>
                                    <p class="text-muted mb-3">Connect with me professionally</p>
                                    <a href="https://linkedin.com/in/omar-copywriter" class="btn btn-outline-info" target="_blank">
                                        Connect on LinkedIn
                                    </a>
                                </div>
                            </div>
                        </div>
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
            <div class="col-lg-8 mx-auto">
                <div class="animate-on-scroll">
                    <div class="text-center mb-5">
                        <h2 class="display-5 fw-bold mb-4">Frequently Asked Questions</h2>
                        <p class="lead text-muted">
                            Quick answers to common questions about working together.
                        </p>
                    </div>
                    
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    How quickly can you start my project?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    I typically start new projects within 1-2 weeks of contract signing. For urgent projects, I can often accommodate rush timelines with a 25% rush fee.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    What's included in your copywriting services?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    All projects include research, strategy development, copywriting, one round of revisions, and final delivery. Additional revisions and services like SEO optimization can be added as needed.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Do you work with small businesses?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Absolutely! I work with businesses of all sizes, from startups to Fortune 500 companies. I have flexible packages to accommodate different budgets and needs.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    What if I'm not satisfied with the copy?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    I offer one round of revisions included in all projects. If you're still not satisfied, I'll work with you to make it right. Client satisfaction is my top priority.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    Do you provide ongoing content support?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes! I offer monthly retainer packages for ongoing content needs, including blog posts, email campaigns, social media content, and more. This ensures consistency and better results.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Response Time Section -->
<section class="section-padding bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="animate-on-scroll">
                    <div class="display-1 opacity-25 mb-3">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h2 class="display-5 fw-bold mb-4">Quick Response Guaranteed</h2>
                    <p class="lead mb-4">
                        I understand that time is valuable in business. That's why I guarantee a response to all inquiries within 24 hours, often much sooner.
                    </p>
                    <div class="row text-center">
                        <div class="col-md-4 mb-3">
                            <div class="display-6 fw-bold mb-2">< 2 hrs</div>
                            <p class="mb-0">Average Response Time</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="display-6 fw-bold mb-2">24/7</div>
                            <p class="mb-0">Email Monitoring</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="display-6 fw-bold mb-2">100%</div>
                            <p class="mb-0">Response Rate</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.form-control:focus,
.form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.form-control-lg {
    padding: 0.75rem 1rem;
}

.accordion-button:not(.collapsed) {
    background-color: var(--primary-color);
    color: white;
}

.accordion-button:focus {
    box-shadow: none;
    border-color: var(--primary-color);
}

.card:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease;
}

@media (max-width: 768px) {
    .form-control-lg {
        padding: 0.5rem 0.75rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const form = document.getElementById('contactForm');
    const messageTextarea = document.getElementById('message');
    
    // Character count for message
    if (messageTextarea) {
        const charCount = document.createElement('div');
        charCount.className = 'form-text text-end';
        messageTextarea.parentNode.appendChild(charCount);
        
        function updateCharCount() {
            const count = messageTextarea.value.length;
            charCount.textContent = `${count} characters`;
            
            if (count < 50) {
                charCount.className = 'form-text text-end text-danger';
            } else {
                charCount.className = 'form-text text-end text-muted';
            }
        }
        
        messageTextarea.addEventListener('input', updateCharCount);
        updateCharCount();
    }
    
    // Form submission
    if (form) {
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
            submitBtn.disabled = true;
        });
    }
    
    // Auto-dismiss alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });
});
</script>
@endpush