@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-1 text-dark fw-bold">Messages</h1>
                    <p class="text-muted mb-0">Contact form submissions from your website</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.messages.deleted') }}" class="btn btn-outline-danger">
                        <i class="fas fa-trash me-2"></i>Deleted Messages
                    </a>
                    @if($unreadCount > 0)
                        <span class="badge bg-danger fs-6">{{ $unreadCount }} unread</span>
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

    <!-- Messages List -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-envelope me-2 text-primary"></i>Contact Messages
                    </h5>
                </div>
                <div class="card-body p-0">
                    @if($messages->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Status</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Project Type</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($messages as $message)
                                        <tr class="{{ !$message->is_read ? 'table-warning' : '' }}">
                                            <td>
                                                @if($message->is_read)
                                                    <span class="badge bg-success">
                                                        <i class="fas fa-check"></i> Read
                                                    </span>
                                                @else
                                                    <span class="badge bg-warning">
                                                        <i class="fas fa-exclamation"></i> Unread
                                                    </span>
                                                @endif
                                            </td>
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
                                                <div class="small">{{ $message->created_at->format('M d, Y') }}</div>
                                                <div class="small text-muted">{{ $message->created_at->format('h:i A') }}</div>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.messages.show', $message) }}" 
                                                       class="btn btn-sm btn-outline-primary" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <form action="{{ route('admin.messages.toggle-read', $message) }}" 
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" 
                                                                class="btn btn-sm btn-outline-secondary" 
                                                                title="{{ $message->is_read ? 'Mark as Unread' : 'Mark as Read' }}">
                                                            <i class="fas fa-{{ $message->is_read ? 'envelope' : 'envelope-open' }}"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.messages.destroy', $message) }}" 
                                                          method="POST" class="d-inline" 
                                                          onsubmit="return confirm('Are you sure you want to delete this message?')">
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
                        
                        <!-- Pagination -->
                        @if($messages->hasPages())
                            <div class="card-footer bg-white">
                                {{ $messages->links() }}
                            </div>
                        @endif
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No messages yet</h5>
                            <p class="text-muted">Contact form submissions will appear here.</p>
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
.table-warning {
    --bs-table-bg: rgba(255, 193, 7, 0.1);
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