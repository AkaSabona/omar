@extends('layouts.admin')

@section('title', 'Message Details')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-1 text-dark fw-bold">Message Details</h1>
                    <p class="text-muted mb-0">Contact form submission from {{ $message->name }}</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Messages
                    </a>
                    <form action="{{ route('admin.messages.toggle-read', $message) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-primary">
                            <i class="fas fa-{{ $message->is_read ? 'envelope' : 'envelope-open' }} me-2"></i>
                            Mark as {{ $message->is_read ? 'Unread' : 'Read' }}
                        </button>
                    </form>
                    <form action="{{ route('admin.messages.destroy', $message) }}" 
                          method="POST" class="d-inline" 
                          onsubmit="return confirm('Are you sure you want to delete this message?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fas fa-trash me-2"></i>Delete
                        </button>
                    </form>
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

    <!-- Message Details -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Main Message Content -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-envelope me-2 text-primary"></i>{{ $message->subject }}
                    </h5>
                    @if($message->is_read)
                        <span class="badge bg-success">
                            <i class="fas fa-check"></i> Read
                        </span>
                    @else
                        <span class="badge bg-warning">
                            <i class="fas fa-exclamation"></i> Unread
                        </span>
                    @endif
                </div>
                <div class="card-body">
                    <div class="message-content">
                        <h6 class="text-muted mb-3">Message:</h6>
                        <div class="bg-light p-3 rounded">
                            {!! nl2br(e($message->message)) !!}
                        </div>
                    </div>
                    
                    @if($message->additional_services && count($message->additional_services) > 0)
                        <div class="mt-4">
                            <h6 class="text-muted mb-3">Additional Services Requested:</h6>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($message->additional_services as $service)
                                    <span class="badge bg-info">{{ ucfirst(str_replace('_', ' ', $service)) }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <!-- Contact Information -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user me-2 text-primary"></i>Contact Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="contact-info">
                        <div class="mb-3">
                            <label class="form-label text-muted small">Name</label>
                            <div class="fw-bold">{{ $message->name }}</div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted small">Email</label>
                            <div>
                                <a href="mailto:{{ $message->email }}" class="text-decoration-none">
                                    {{ $message->email }}
                                </a>
                            </div>
                        </div>
                        
                        @if($message->phone)
                            <div class="mb-3">
                                <label class="form-label text-muted small">Phone</label>
                                <div>
                                    <a href="tel:{{ $message->phone }}" class="text-decoration-none">
                                        {{ $message->phone }}
                                    </a>
                                </div>
                            </div>
                        @endif
                        
                        @if($message->company)
                            <div class="mb-3">
                                <label class="form-label text-muted small">Company</label>
                                <div>{{ $message->company }}</div>
                            </div>
                        @endif
                        
                        @if($message->industry)
                            <div class="mb-3">
                                <label class="form-label text-muted small">Industry</label>
                                <div>{{ ucfirst(str_replace('_', ' ', $message->industry)) }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            

            
            <!-- Message Meta -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2 text-primary"></i>Message Info
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label text-muted small">Received</label>
                        <div>{{ $message->created_at->format('F j, Y \\a\\t g:i A') }}</div>
                        <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label text-muted small">Privacy Agreement</label>
                        <div>
                            @if($message->privacy_agreement)
                                <span class="badge bg-success">
                                    <i class="fas fa-check"></i> Agreed
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    <i class="fas fa-times"></i> Not Agreed
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.message-content {
    line-height: 1.6;
}

.contact-info .form-label {
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.card {
    transition: all 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

@media (max-width: 768px) {
    .d-flex.gap-2 {
        flex-direction: column;
    }
    
    .d-flex.gap-2 .btn {
        margin-bottom: 0.5rem;
    }
}
</style>
@endpush