@extends('layouts.admin')

@section('title', 'Deleted Messages')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-1 text-dark fw-bold">Deleted Messages</h1>
                    <p class="text-muted mb-0">Manage soft-deleted contact form submissions</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Messages
                    </a>
                    @if($deletedCount > 0)
                        <span class="badge bg-danger fs-6">{{ $deletedCount }} deleted</span>
                    @endif
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

    <!-- Deleted Messages List -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-trash me-2 text-danger"></i>Deleted Contact Messages
                    </h5>
                </div>
                <div class="card-body p-0">
                    @if($messages->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Project Type</th>
                                        <th>Deleted Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($messages as $message)
                                        <tr class="table-danger">
                                            <td>
                                                <div class="fw-bold">{{ $message->name }}</div>
                                                @if($message->company)
                                                    <small class="text-muted">{{ $message->company }}</small>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="mailto:{{ $message->email }}" class="text-decoration-none">
                                                    {{ $message->email }}
                                                </a>
                                                @if($message->phone)
                                                    <br><small class="text-muted">{{ $message->phone }}</small>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="fw-semibold">{{ Str::limit($message->subject, 30) }}</div>
                                                <small class="text-muted">{{ Str::limit($message->message, 50) }}</small>
                                            </td>
                                            <td>
                                                @if($message->project_type)
                                                    <span class="badge bg-info">{{ ucfirst(str_replace('_', ' ', $message->project_type)) }}</span>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="small">{{ $message->deleted_at->format('M d, Y') }}</div>
                                                <div class="small text-muted">{{ $message->deleted_at->format('h:i A') }}</div>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <form action="{{ route('admin.messages.restore', $message->id) }}" 
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" 
                                                                class="btn btn-sm btn-outline-success" 
                                                                title="Restore Message">
                                                            <i class="fas fa-undo"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.messages.force-delete', $message->id) }}" 
                                                          method="POST" class="d-inline" 
                                                          onsubmit="return confirm('Are you sure you want to permanently delete this message? This action cannot be undone!')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-sm btn-outline-danger" 
                                                                title="Permanently Delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        @if($messages->hasPages())
                            <div class="card-footer bg-white">
                                {{ $messages->links() }}
                            </div>
                        @endif
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-trash fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No deleted messages</h5>
                            <p class="text-muted">Deleted messages will appear here and can be restored or permanently deleted.</p>
                            <a href="{{ route('admin.messages.index') }}" class="btn btn-primary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Messages
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.table-danger {
    --bs-table-bg: rgba(220, 53, 69, 0.1);
}

.btn-group .btn {
    border-radius: 0.375rem;
    margin-right: 2px;
}

.btn-group .btn:last-child {
    margin-right: 0;
}

@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.875rem;
    }
    
    .btn-group {
        flex-direction: column;
    }
    
    .btn-group .btn {
        margin-right: 0;
        margin-bottom: 2px;
    }
}
</style>
@endpush