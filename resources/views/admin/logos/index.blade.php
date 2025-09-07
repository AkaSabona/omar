@extends('layouts.admin')

@section('title', 'Logo Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Logo Management</h3>
                    <a href="{{ route('admin.logos.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add New Logo
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($logos->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Position</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Date Range</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="sortable-logos">
                                    @foreach($logos as $logo)
                                        <tr data-id="{{ $logo->id }}">
                                            <td>
                                                <span class="badge bg-secondary">{{ $logo->position }}</span>
                                                <i class="fas fa-grip-vertical ms-2 text-muted" style="cursor: move;"></i>
                                            </td>
                                            <td>
                                                @if($logo->image)
                                                    <img src="{{ asset('storage/' . $logo->image) }}" 
                                                         alt="{{ $logo->title }}" 
                                                         class="img-thumbnail" 
                                                         style="width: 50px; height: 50px; object-fit: cover;">
                                                @else
                                                    <div class="bg-light d-flex align-items-center justify-content-center" 
                                                         style="width: 50px; height: 50px; border-radius: 4px;">
                                                        <i class="fas fa-image text-muted"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <strong>{{ $logo->title }}</strong>
                                            </td>
                                            <td>
                                                <span class="text-muted">{{ Str::limit($logo->description, 50) }}</span>
                                            </td>
                                            <td>
                                                @if($logo->start_date || $logo->end_date)
                                                    <small class="text-muted">
                                                        {{ $logo->start_date }} - {{ $logo->end_date }}
                                                    </small>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($logo->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.logos.show', $logo) }}" 
                                                       class="btn btn-sm btn-outline-info" 
                                                       title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.logos.edit', $logo) }}" 
                                                       class="btn btn-sm btn-outline-primary" 
                                                       title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.logos.destroy', $logo) }}" 
                                                          method="POST" 
                                                          class="d-inline" 
                                                          onsubmit="return confirm('Are you sure you want to delete this logo?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-sm btn-outline-danger" 
                                                                title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-image fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No logos found</h5>
                            <p class="text-muted">Create your first logo to get started.</p>
                            <a href="{{ route('admin.logos.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Add New Logo
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sortableElement = document.getElementById('sortable-logos');
    if (sortableElement) {
        new Sortable(sortableElement, {
            handle: '.fa-grip-vertical',
            animation: 150,
            onEnd: function(evt) {
                const positions = Array.from(sortableElement.children).map((row, index) => {
                    return row.dataset.id;
                });
                
                fetch('{{ route("admin.logos.positions") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ positions: positions })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update position badges
                        Array.from(sortableElement.children).forEach((row, index) => {
                            const badge = row.querySelector('.badge');
                            badge.textContent = index + 1;
                        });
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    }
});
</script>
@endpush
@endsection