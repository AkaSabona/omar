@extends('layouts.admin')

@section('title', 'Logo Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Logo Details: {{ $logo->title }}</h3>
                    <div>
                        <a href="{{ route('admin.logos.edit', $logo) }}" class="btn btn-warning me-2">
                            <i class="fas fa-edit me-2"></i>Edit
                        </a>
                        <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fas fa-trash me-2"></i>Delete
                        </button>
                        <a href="{{ route('admin.logos.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Logos
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Title:</strong>
                                </div>
                                <div class="col-sm-9">
                                    {{ $logo->title }}
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Description:</strong>
                                </div>
                                <div class="col-sm-9">
                                    {{ $logo->description }}
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Start Date:</strong>
                                </div>
                                <div class="col-sm-9">
                                    {{ $logo->start_date ?: 'Not specified' }}
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>End Date:</strong>
                                </div>
                                <div class="col-sm-9">
                                    {{ $logo->end_date ?: 'Not specified' }}
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Position:</strong>
                                </div>
                                <div class="col-sm-9">
                                    {{ $logo->position }}
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Status:</strong>
                                </div>
                                <div class="col-sm-9">
                                    @if($logo->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Created:</strong>
                                </div>
                                <div class="col-sm-9">
                                    {{ $logo->created_at->format('M d, Y H:i') }}
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Last Updated:</strong>
                                </div>
                                <div class="col-sm-9">
                                    {{ $logo->updated_at->format('M d, Y H:i') }}
                                </div>
                            </div>
                            
                            @if($logo->read_more)
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <strong>Read More Content:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="border rounded p-3 bg-light">
                                            {!! nl2br(e($logo->read_more)) !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <div class="col-md-4">
                            @if($logo->image)
                                <div class="text-center">
                                    <h5>Logo Image</h5>
                                    <img src="{{ asset('storage/' . $logo->image) }}" 
                                         alt="{{ $logo->title }}" 
                                         class="img-fluid rounded shadow" 
                                         style="max-height: 300px;">
                                </div>
                            @else
                                <div class="text-center text-muted">
                                    <i class="fas fa-image fa-3x mb-3"></i>
                                    <p>No image uploaded</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the logo "<strong>{{ $logo->title }}</strong>"?</p>
                <p class="text-danger"><small><i class="fas fa-exclamation-triangle me-1"></i>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.logos.destroy', $logo) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Delete Logo
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection