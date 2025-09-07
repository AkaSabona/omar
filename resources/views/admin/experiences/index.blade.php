@extends('layouts.admin')

@section('title', 'Manage Experiences')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-1 text-dark fw-bold">Experience Management</h1>
                    <p class="text-muted mb-0">Manage professional experience timeline entries</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.experiences.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add Experience
                    </a>
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

    <!-- Experiences List -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-briefcase me-2 text-primary"></i>Experience Entries
                    </h5>
                </div>
                <div class="card-body">
                    @if($experiences->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="50">Order</th>
                                        <th>Company</th>
                                        <th>Position</th>
                                        <th>Year</th>
                                        <th>Duration</th>
                                        <th width="100">Clickable</th>
                                        <th width="100">Status</th>
                                        <th width="150">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="sortable-experiences">
                                    @foreach($experiences as $experience)
                                        <tr data-id="{{ $experience->id }}">
                                            <td>
                                                <span class="badge bg-secondary">{{ $experience->order_position }}</span>
                                                <i class="fas fa-grip-vertical ms-2 text-muted" style="cursor: move;"></i>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="logo-circle {{ $experience->logo_class }} me-3" style="width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                        @if($experience->logo_icon)
                                                            <i class="{{ $experience->logo_icon }} text-white"></i>
                                                        @elseif($experience->logo_text)
                                                            <span class="text-white fw-bold">{{ $experience->logo_text }}</span>
                                                        @endif
                                                    </div>
                                                    <strong>{{ $experience->company_name }}</strong>
                                                </div>
                                            </td>
                                            <td>{{ $experience->position }}</td>
                                            <td><span class="badge bg-info">{{ $experience->year }}</span></td>
                                            <td>{{ $experience->duration }}</td>
                                            <td>
                                                @if($experience->is_clickable)
                                                    <span class="badge bg-success">Yes</span>
                                                @else
                                                    <span class="badge bg-secondary">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($experience->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.experiences.edit', $experience) }}" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this experience?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
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
                            <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No experiences found</h5>
                            <p class="text-muted">Start by adding your first professional experience.</p>
                            <a href="{{ route('admin.experiences.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Add Experience
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Make table sortable
    const sortable = new Sortable(document.getElementById('sortable-experiences'), {
        animation: 150,
        handle: '.fa-grip-vertical',
        onEnd: function(evt) {
            const positions = {};
            document.querySelectorAll('#sortable-experiences tr').forEach((row, index) => {
                const id = row.getAttribute('data-id');
                if (id) {
                    positions[id] = index + 1;
                }
            });
            
            // Send AJAX request to update positions
            fetch('{{ route("admin.experiences.positions") }}', {
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
                    // Update order badges
                    document.querySelectorAll('#sortable-experiences tr').forEach((row, index) => {
                        const badge = row.querySelector('.badge.bg-secondary');
                        if (badge) {
                            badge.textContent = index + 1;
                        }
                    });
                }
            })
            .catch(error => {
                console.error('Error updating positions:', error);
                alert('Error updating order. Please refresh the page.');
            });
        }
    });
});
</script>
@endpush