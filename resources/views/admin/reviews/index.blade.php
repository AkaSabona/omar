@extends('layouts.admin')

@section('title', 'Reviews Management')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-1 text-dark fw-bold">Reviews Management</h1>
                    <p class="text-muted mb-0">Manage client testimonials and reviews</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('home') }}" class="btn btn-outline-primary" target="_blank">
                        <i class="fas fa-external-link-alt me-2"></i>Preview Site
                    </a>
                    <button class="btn btn-primary" onclick="location.reload()">
                        <i class="fas fa-sync-alt me-2"></i>Refresh
                    </button>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger border-0 shadow-sm" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-triangle text-danger me-3 fs-5"></i>
                <div class="flex-grow-1">
                    <h6 class="alert-heading mb-1">Validation Error</h6>
                    <ul class="mb-0 small">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    <!-- Client Testimonials Section -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-gradient-primary text-white border-0 py-3">
            <h5 class="mb-0 fw-semibold">
                <i class="fas fa-star me-2"></i>Client Testimonials Section
            </h5>
            <small class="opacity-75">Manage testimonials displayed on the homepage</small>
        </div>
        <div class="card-body p-4">
            <form method="POST" action="{{ route('admin.reviews.testimonials.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Section Title</label>
                        <input type="text" name="testimonials_title" class="form-control" value="{{ old('testimonials_title', $testimonialsData['title'] ?? 'What Clients Say') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Section Subtitle</label>
                        <input type="text" name="testimonials_subtitle" class="form-control" value="{{ old('testimonials_subtitle', $testimonialsData['subtitle'] ?? 'Real feedback from real clients about their project experiences.') }}" required>
                    </div>
                </div>
    
                <hr>
                <div class="row g-3">
                    @php($items = $testimonialsData['items'] ?? [])
                    @for($i = 0; $i < 3; $i++)
                        @php($item = $items[$i] ?? ['content' => '', 'name' => '', 'position' => ''])
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <h6 class="fw-bold">Testimonial #{{ $i + 1 }}</h6>
                                <div class="mb-3">
                                    <label class="form-label">Content</label>
                                    <textarea name="testimonials[{{ $i }}][content]" class="form-control" rows="6" required>{{ old("testimonials.$i.content", $item['content']) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" name="testimonials[{{ $i }}][name]" class="form-control" value="{{ old("testimonials.$i.name", $item['name']) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Position / Title</label>
                                    <input type="text" name="testimonials[{{ $i }}][position]" class="form-control" value="{{ old("testimonials.$i.position", $item['position']) }}" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label"><i class="fas fa-image me-2"></i>Company Logo</label>
                                    <input type="file" name="testimonials[{{ $i }}][logo]" class="form-control" accept="image/*">
                                    @if(isset($item['logo']) && $item['logo'])
                                        <div class="mt-2">
                                            <img src="{{ asset($item['logo']) }}" alt="Current logo" class="img-thumbnail" style="max-width: 60px; max-height: 60px;">
                                            <small class="text-muted d-block">Current logo</small>
                                        </div>
                                    @endif
                                    <small class="text-muted">Upload company logo image (JPG, PNG, SVG)</small>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
    
                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-2"></i>Update Testimonials
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}
</style>
@endpush