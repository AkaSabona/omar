@extends('layouts.admin')

@section('title', 'View Experience')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-1 text-dark fw-bold">Experience Details</h1>
                    <p class="text-muted mb-0">{{ $experience->company_name }} - {{ $experience->position }}</p>
                </div>
                <div>
                    <a href="{{ route('admin.experiences.edit', $experience) }}" class="btn btn-primary me-2">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.experiences.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Main Details -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-briefcase me-2 text-primary"></i>Experience Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Company Name</label>
                            <p class="fw-bold">{{ $experience->company_name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Position</label>
                            <p class="fw-bold">{{ $experience->position }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Year</label>
                            <p class="fw-bold">{{ $experience->year }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Duration</label>
                            <p class="fw-bold">{{ $experience->duration }}</p>
                        </div>
                    </div>
                    
                    @if($experience->description)
                    <div class="mb-3">
                        <label class="form-label text-muted">Description</label>
                        <p>{{ $experience->description }}</p>
                    </div>
                    @endif
                    
                    <hr class="my-4">
                    
                    <h6 class="mb-3">Logo Settings</h6>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-muted">Background Class</label>
                            <p class="fw-bold">
                                <span class="badge {{ $experience->logo_class }}">{{ $experience->logo_class }}</span>
                            </p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-muted">Icon</label>
                            <p class="fw-bold">
                                @if($experience->logo_icon)
                                    <i class="{{ $experience->logo_icon }} me-2"></i>{{ $experience->logo_icon }}
                                @else
                                    <span class="text-muted">No icon</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-muted">Text</label>
                            <p class="fw-bold">{{ $experience->logo_text ?: 'No text' }}</p>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <h6 class="mb-3">Interactive Settings</h6>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-muted">Clickable</label>
                            <p class="fw-bold">
                                @if($experience->is_clickable)
                                    <span class="badge bg-success"><i class="fas fa-check me-1"></i>Yes</span>
                                @else
                                    <span class="badge bg-secondary"><i class="fas fa-times me-1"></i>No</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-muted">Order Position</label>
                            <p class="fw-bold">{{ $experience->order_position }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-muted">Status</label>
                            <p class="fw-bold">
                                @if($experience->is_active)
                                    <span class="badge bg-success"><i class="fas fa-eye me-1"></i>Active</span>
                                @else
                                    <span class="badge bg-warning"><i class="fas fa-eye-slash me-1"></i>Inactive</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    
                    @if($experience->target_logos && count($experience->target_logos) > 0)
                    <div class="mb-3">
                        <label class="form-label text-muted">Target Logos</label>
                        <div>
                            @foreach($experience->target_logos as $logo)
                                <span class="badge bg-info me-1">{{ $logo }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            
            <!-- Actions -->
            <div class="card border-0 shadow-sm mt-3">
                <div class="card-header bg-white">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-cogs me-2 text-secondary"></i>Actions
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.experiences.edit', $experience) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Edit Experience
                        </a>
                        
                        <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST" class="d-inline" 
                              onsubmit="return confirm('Are you sure you want to delete this experience? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash me-2"></i>Delete
                            </button>
                        </form>
                        
                        @if($experience->is_active)
                            <form action="{{ route('admin.experiences.update', $experience) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="is_active" value="0">
                                <input type="hidden" name="company_name" value="{{ $experience->company_name }}">
                                <input type="hidden" name="position" value="{{ $experience->position }}">
                                <input type="hidden" name="year" value="{{ $experience->year }}">
                                <input type="hidden" name="duration" value="{{ $experience->duration }}">
                                <input type="hidden" name="logo_class" value="{{ $experience->logo_class }}">
                                <input type="hidden" name="order_position" value="{{ $experience->order_position }}">
                                <button type="submit" class="btn btn-warning">
                                    <i class="fas fa-eye-slash me-2"></i>Deactivate
                                </button>
                            </form>
                        @else
                            <form action="{{ route('admin.experiences.update', $experience) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="is_active" value="1">
                                <input type="hidden" name="company_name" value="{{ $experience->company_name }}">
                                <input type="hidden" name="position" value="{{ $experience->position }}">
                                <input type="hidden" name="year" value="{{ $experience->year }}">
                                <input type="hidden" name="duration" value="{{ $experience->duration }}">
                                <input type="hidden" name="logo_class" value="{{ $experience->logo_class }}">
                                <input type="hidden" name="order_position" value="{{ $experience->order_position }}">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-eye me-2"></i>Activate
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Preview -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-eye me-2 text-info"></i>Timeline Preview
                    </h6>
                </div>
                <div class="card-body">
                    <div class="timeline-item-preview">
                        <div class="d-flex align-items-center mb-3">
                            <div class="timeline-year me-3">
                                <span class="badge bg-info">{{ $experience->year }}</span>
                            </div>
                            <div class="logo-circle {{ $experience->logo_class }}" 
                                 style="width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                @if($experience->logo_icon)
                                    <i class="{{ $experience->logo_icon }} text-white fs-5"></i>
                                @elseif($experience->logo_text)
                                    <span class="text-white fw-bold">{{ $experience->logo_text }}</span>
                                @endif
                            </div>
                        </div>
                        <h5 class="mb-2">{{ $experience->company_name }}</h5>
                        <p class="mb-2 text-muted">{{ $experience->position }}</p>
                        <p class="mb-2 text-muted small">{{ $experience->duration }}</p>
                        @if($experience->description)
                            <p class="mt-3 small">{{ $experience->description }}</p>
                        @endif
                        
                        @if($experience->is_clickable)
                            <div class="mt-3">
                                <span class="badge bg-primary"><i class="fas fa-mouse-pointer me-1"></i>Clickable</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mt-3">
                <div class="card-header bg-white">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2 text-info"></i>Information
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="border-end">
                                <h6 class="mb-1">Created</h6>
                                <p class="small text-muted mb-0">{{ $experience->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <h6 class="mb-1">Updated</h6>
                            <p class="small text-muted mb-0">{{ $experience->updated_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                    
                    @if($experience->is_clickable && $experience->target_logos && count($experience->target_logos) > 0)
                    <hr class="my-3">
                    <div class="alert alert-info small">
                        <i class="fas fa-lightbulb me-2"></i>
                        <strong>Interactive:</strong> When clicked, this experience will highlight {{ count($experience->target_logos) }} logo(s) in the clients section.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection