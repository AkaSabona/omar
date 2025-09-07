@extends('layouts.admin')

@section('title', 'Add Experience')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-1 text-dark fw-bold">Add New Experience</h1>
                    <p class="text-muted mb-0">Create a new professional experience entry</p>
                </div>
                <div>
                    <a href="{{ route('admin.experiences.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-plus me-2 text-primary"></i>Experience Details
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.experiences.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="company_name" class="form-label">Company Name *</label>
                                <input type="text" class="form-control @error('company_name') is-invalid @enderror" 
                                       id="company_name" name="company_name" value="{{ old('company_name') }}" required>
                                @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="position" class="form-label">Position *</label>
                                <input type="text" class="form-control @error('position') is-invalid @enderror" 
                                       id="position" name="position" value="{{ old('position') }}" required>
                                @error('position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="year" class="form-label">Year *</label>
                                <input type="text" class="form-control @error('year') is-invalid @enderror" 
                                       id="year" name="year" value="{{ old('year') }}" placeholder="e.g., 2022" required>
                                @error('year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="duration" class="form-label">Duration *</label>
                                <input type="text" class="form-control @error('duration') is-invalid @enderror" 
                                       id="duration" name="duration" value="{{ old('duration') }}" placeholder="e.g., Jan 2022 - Dec 2023" required>
                                @error('duration')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3" placeholder="Brief description of the role...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <hr class="my-4">
                        
                        <h6 class="mb-3">Logo Settings</h6>
                        
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="logo_class" class="form-label">Logo Background Class *</label>
                                <select class="form-select @error('logo_class') is-invalid @enderror" id="logo_class" name="logo_class" required>
                                    <option value="bg-primary" {{ old('logo_class') == 'bg-primary' ? 'selected' : '' }}>Primary (Blue)</option>
                                    <option value="bg-success" {{ old('logo_class') == 'bg-success' ? 'selected' : '' }}>Success (Green)</option>
                                    <option value="bg-warning" {{ old('logo_class') == 'bg-warning' ? 'selected' : '' }}>Warning (Yellow)</option>
                                    <option value="bg-danger" {{ old('logo_class') == 'bg-danger' ? 'selected' : '' }}>Danger (Red)</option>
                                    <option value="bg-info" {{ old('logo_class') == 'bg-info' ? 'selected' : '' }}>Info (Cyan)</option>
                                    <option value="bg-secondary" {{ old('logo_class') == 'bg-secondary' ? 'selected' : '' }}>Secondary (Gray)</option>
                                    <option value="bg-dark" {{ old('logo_class') == 'bg-dark' ? 'selected' : '' }}>Dark</option>
                                </select>
                                @error('logo_class')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="logo_icon" class="form-label">Logo Icon (FontAwesome)</label>
                                <input type="text" class="form-control @error('logo_icon') is-invalid @enderror" 
                                       id="logo_icon" name="logo_icon" value="{{ old('logo_icon') }}" placeholder="e.g., fas fa-building">
                                @error('logo_icon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Leave empty to use text instead</small>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="logo_text" class="form-label">Logo Text</label>
                                <input type="text" class="form-control @error('logo_text') is-invalid @enderror" 
                                       id="logo_text" name="logo_text" value="{{ old('logo_text') }}" placeholder="e.g., H" maxlength="3">
                                @error('logo_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Used if no icon is provided</small>
                            </div>
                        </div>
                        
                        <hr class="my-4">
                        
                        <h6 class="mb-3">Interactive Settings</h6>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_clickable" name="is_clickable" value="1" {{ old('is_clickable') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_clickable">
                                        Make this experience clickable
                                    </label>
                                </div>
                                <small class="form-text text-muted">When clicked, it will scroll to logos section</small>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="order_position" class="form-label">Order Position *</label>
                                <input type="number" class="form-control @error('order_position') is-invalid @enderror" 
                                       id="order_position" name="order_position" value="{{ old('order_position', 1) }}" min="1" required>
                                @error('order_position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Target Logos (for highlighting)</label>
                            <div class="row">
                                @php
                                    $selectedLogos = old('target_logos', []);
                                    if (is_string($selectedLogos)) {
                                        $selectedLogos = explode(',', $selectedLogos);
                                    }
                                @endphp
                                @forelse($logos as $logo)
                                    @php
                                        $logoId = strtolower(str_replace(' ', '-', $logo->title)) . '-logo';
                                    @endphp
                                    <div class="col-md-4 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" 
                                                   id="logo_{{ $logoId }}" name="target_logos[]" 
                                                   value="{{ $logoId }}" 
                                                   {{ in_array($logoId, $selectedLogos) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="logo_{{ $logoId }}">
                                                {{ $logo->title }}
                                            </label>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <p class="text-muted">No active logos available. <a href="{{ route('admin.logos.create') }}">Add a logo</a> first.</p>
                                    </div>
                                @endforelse
                            </div>
                            @error('target_logos')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Select which logos should be highlighted when this experience is clicked</small>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Active (visible on website)
                                </label>
                            </div>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Save Experience
                            </button>
                            <a href="{{ route('admin.experiences.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2 text-info"></i>Help & Tips
                    </h6>
                </div>
                <div class="card-body">
                    <h6>Logo Settings:</h6>
                    <ul class="small">
                        <li><strong>Icon:</strong> Use FontAwesome classes like "fas fa-building"</li>
                        <li><strong>Text:</strong> Short text (1-3 characters) if no icon</li>
                        <li><strong>Background:</strong> Choose a color that fits your design</li>
                    </ul>
                    
                    <h6 class="mt-3">Interactive Features:</h6>
                    <ul class="small">
                        <li><strong>Clickable:</strong> Makes the timeline item clickable</li>
                        <li><strong>Target Logos:</strong> Logo IDs to highlight when clicked</li>
                        <li><strong>Order:</strong> Controls the display order in timeline</li>
                    </ul>
                    
                    <div class="alert alert-info small mt-3">
                        <i class="fas fa-lightbulb me-2"></i>
                        <strong>Tip:</strong> For Birdmilk-like functionality, enable "clickable" and specify target logo IDs.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection