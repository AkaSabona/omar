@extends('layouts.admin')

@section('title', 'Portfolio Cards Management')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-1 text-dark fw-bold">Portfolio Cards Management</h1>
                    <p class="text-muted mb-0">Manage your portfolio showcase cards</p>
                </div>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCardModal">
                        <i class="fas fa-plus me-2"></i>Add Portfolio Card
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

    <!-- Portfolio Cards List -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-th-large me-2 text-primary"></i>Portfolio Cards
                    </h5>
                </div>
                <div class="card-body">
                    @if($portfolioCards->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="50">Order</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Video URL</th>
                                        <th width="100">Image</th>
                                        <th width="100">Status</th>
                                        <th width="150">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($portfolioCards as $card)
                                        <tr data-card-id="{{ $card->id }}">
                                            <td>
                                                <span class="badge bg-secondary">{{ $card->position }}</span>
                                            </td>
                                            <td>
                                                <strong>{{ $card->title }}</strong>
                                            </td>
                                            <td>{{ Str::limit($card->description, 50) }}</td>
                                            <td>
                                                @if($card->youtube_url)
                                                    <a href="{{ $card->youtube_url }}" target="_blank">{{ Str::limit($card->youtube_url, 30) }}</a>
                                                @else
                                                    <span class="text-muted">—</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($card->image)
                                                    <img src="{{ asset('storage/' . $card->image) }}" alt="{{ $card->title }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                                @else
                                                    <span class="badge bg-secondary">No Image</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($card->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="editCard({{ $card->id }})">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <form action="{{ route('admin.portfolio-cards.delete', $card->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this portfolio card?')">
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
                            <i class="fas fa-th-large fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No portfolio cards found</h5>
                            <p class="text-muted">Start by adding your first portfolio card.</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCardModal">
                                <i class="fas fa-plus me-2"></i>Add Portfolio Card
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Add Card Modal -->
    <div class="modal fade" id="addCardModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus me-2"></i>Add Portfolio Card
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.portfolio-cards.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="title" class="form-label">Card Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">Portfolio Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="youtube_url" class="form-label">YouTube Video URL (optional)</label>
                                <input type="url" class="form-control" id="youtube_url" name="youtube_url" placeholder="https://www.youtube.com/watch?v=...">
                                <div class="form-text">Provide full YouTube URL or share link. We'll extract the video ID automatically.</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Portfolio Card</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Card Modal -->
    <div class="modal fade" id="editCardModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit me-2"></i>Edit Portfolio Card
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editCardForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="edit_title" class="form-label">Card Title</label>
                                <input type="text" class="form-control" id="edit_title" name="title" required>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_image" class="form-label">Portfolio Image</label>
                                <div id="current_image_preview" class="mb-2" style="display: none;">
                                    <img id="current_image" src="" alt="Current Image" class="img-thumbnail" style="max-width: 150px; max-height: 150px;">
                                    <div class="form-text">Current image</div>
                                </div>
                                <input type="file" class="form-control" id="edit_image" name="image" accept="image/*">
                                <div class="form-text">Leave empty to keep current image</div>
                            </div>
                            <div class="col-12">
                                <label for="edit_description" class="form-label">Description</label>
                                <textarea class="form-control" id="edit_description" name="description" rows="4" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="edit_youtube_url" class="form-label">YouTube Video URL (optional)</label>
                                <input type="url" class="form-control" id="edit_youtube_url" name="youtube_url" placeholder="https://www.youtube.com/watch?v=...">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Card</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function editCard(cardId) {
    // Find the card data from the page
    const cardElement = document.querySelector(`[data-card-id="${cardId}"]`);
    const title = cardElement.querySelector('strong').textContent.trim();
    const description = cardElement.querySelectorAll('td')[2].textContent.trim();
    const youtubeCell = cardElement.querySelectorAll('td')[3];
    const youtubeLink = youtubeCell.querySelector('a');
    const youtubeUrl = youtubeLink ? youtubeLink.getAttribute('href') : '';
    const imageElement = cardElement.querySelector('img');
    
    // Populate the edit form
    document.getElementById('edit_title').value = title;
    document.getElementById('edit_description').value = description;
    document.getElementById('edit_youtube_url').value = youtubeUrl;
    document.getElementById('editCardForm').action = `/admin/portfolio-cards/${cardId}`;
    
    // Show current image if exists
    if (imageElement && imageElement.src) {
        document.getElementById('current_image').src = imageElement.src;
        document.getElementById('current_image_preview').style.display = 'block';
    } else {
        document.getElementById('current_image_preview').style.display = 'none';
    }
    
    // Show the modal
    new bootstrap.Modal(document.getElementById('editCardModal')).show();
}
</script>
@endsection