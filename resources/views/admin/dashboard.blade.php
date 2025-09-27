@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Dashboard Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-1 text-dark fw-bold">Dashboard</h1>
                    <p class="text-muted mb-0">Manage your portfolio content and settings</p>
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

    <!-- Main Content Grid -->
    <div class="row g-4">
        <!-- Hero Section Management -->
        <div class="col-xl-8 col-lg-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-gradient-primary text-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">
                        <i class="fas fa-home me-2"></i>Hero Section Management
                    </h5>
                    <small class="opacity-75">Update your homepage hero content</small>
                </div>
                <div class="card-body p-2">
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
                    
                    <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-2">
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="hero_title" name="hero_title" style="height: 100px" required>{{ $heroData['title'] }}</textarea>
                                    <label for="hero_title"><i class="fas fa-heading me-2"></i>Hero Title</label>
                                </div>
                                <small class="form-text text-muted mt-1">You can use HTML tags like &lt;br&gt; and &lt;span&gt;</small>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="hero_subtitle" name="hero_subtitle" style="height: 80px" required>{{ $heroData['subtitle'] }}</textarea>
                                    <label for="hero_subtitle"><i class="fas fa-align-left me-2"></i>Hero Subtitle</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="hero_image" class="form-label fw-semibold">
                                    <i class="fas fa-image me-2 text-primary"></i>Upload New Image
                                </label>
                                <input type="file" class="form-control @error('hero_image') is-invalid @enderror" id="hero_image" name="hero_image" accept="image/*">
                                <small class="form-text text-muted">JPG, PNG, GIF, WEBP - Max 20MB</small>
                                @error('hero_image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    <i class="fas fa-eye me-2 text-info"></i>Current Image
                                </label>
                                <div class="border rounded p-3 bg-light text-center">
                                    <img src="{{ asset($heroData['image']) }}" alt="Current Hero Image" class="img-fluid rounded shadow-sm" style="max-width: 200px; max-height: 150px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end mt-3 pt-2 border-top">
                            <button type="submit" class="btn btn-primary btn-lg px-4">
                                <i class="fas fa-save me-2"></i>Update Hero Section
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar Controls -->
        <div class="col-xl-4 col-lg-5">
            <!-- Site Settings -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-gradient-warning text-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">
                        <i class="fas fa-edit me-2"></i>Site Settings
                    </h5>
                    <small class="opacity-75">Edit portfolio content</small>
                </div>
                <div class="card-body p-2">
                    <form action="{{ route('admin.site-settings.update') }}" method="POST">
                        @csrf
                        <div class="row g-2">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="projects_count" name="projects_count" value="{{ $siteSettings->projects_count ?? '' }}" required>
                                    <label for="projects_count"><i class="fas fa-project-diagram me-2"></i>Projects Count</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="avg_increase" name="avg_increase" value="{{ $siteSettings->avg_increase ?? '86%' }}" required>
                                    <label for="avg_increase"><i class="fas fa-chart-line me-2"></i>Clients</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="years_experience" name="years_experience" value="{{ $siteSettings->years_experience ?? '6+' }}" required>
                                    <label for="years_experience"><i class="fas fa-calendar-alt me-2"></i>Years Experience</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="profile_name" name="profile_name" value="{{ $siteSettings->profile_name ?? 'Omar Gamal' }}" required>
                                    <label for="profile_name"><i class="fas fa-user me-2"></i>Profile Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="profile_title" name="profile_title" value="{{ $siteSettings->profile_title ?? '' }}" required>
                                    <label for="profile_title"><i class="fas fa-briefcase me-2"></i>Profile Title</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">
                                    <i class="fas fa-tags me-2"></i>Profile Skills
                                </label>
                                <div id="skills-container">
                                    @if($siteSettings && $siteSettings->profile_skills)
                                        @foreach($siteSettings->profile_skills as $index => $skill)
                                            <div class="input-group mb-2 skill-input">
                                                <input type="text" class="form-control" name="profile_skills[]" value="{{ $skill }}" required>
                                                <button type="button" class="btn btn-outline-danger" onclick="removeSkill(this)">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="input-group mb-2 skill-input">
                                            <input type="text" class="form-control" name="profile_skills[]" value="Web Copy" required>
                                            <button type="button" class="btn btn-outline-danger" onclick="removeSkill(this)">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                        <div class="input-group mb-2 skill-input">
                                            <input type="text" class="form-control" name="profile_skills[]" value="Email Marketing" required>
                                            <button type="button" class="btn btn-outline-danger" onclick="removeSkill(this)">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                        <div class="input-group mb-2 skill-input">
                                            <input type="text" class="form-control" name="profile_skills[]" value="Content Strategy" required>
                                            <button type="button" class="btn btn-outline-danger" onclick="removeSkill(this)">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addSkill()">
                                    <i class="fas fa-plus me-1"></i>Add Skill
                                </button>
                            </div>
                            
                            <!-- Astronaut Section Fields -->
                            <div class="col-12 mt-4">
                                <hr class="my-3">
                                <h6 class="fw-semibold text-muted mb-3">
                                    <i class="fas fa-rocket me-2"></i>Professional Experience Section
                                </h6>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="astronaut_section_title" name="astronaut_section_title" value="{{ $siteSettings->astronaut_section_title ?? 'Exploring New Frontiers in Professional Experience' }}" required>
                                    <label for="astronaut_section_title"><i class="fas fa-heading me-2"></i>Section Title</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="astronaut_section_description" name="astronaut_section_description" style="height: 100px" required>{{ $siteSettings->astronaut_section_description ?? 'A journey of growth, learning, and delivering exceptional results across leading organizations - pushing boundaries like an astronaut explores space.' }}</textarea>
                                    <label for="astronaut_section_description"><i class="fas fa-align-left me-2"></i>Section Description</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-warning btn-lg text-white">
                                <i class="fas fa-save me-2"></i>Update Site Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Featured Client Work Section -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-gradient-success text-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">
                        <i class="fas fa-briefcase me-2"></i>Featured Client Work
                    </h5>
                    <small class="opacity-75">Edit section title and description</small>
                </div>
                <div class="card-body p-2">
                    <form action="{{ route('admin.featured-client-work.update') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="featured_title" name="featured_title" value="{{ $featuredClientWork->title ?? 'Featured Client Work' }}" required>
                                    <label for="featured_title"><i class="fas fa-heading me-2"></i>Section Title</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="featured_subtitle" name="featured_subtitle" style="height: 100px" required>{{ $featuredClientWork->subtitle ?? '' }}</textarea>
                                    <label for="featured_subtitle"><i class="fas fa-align-left me-2"></i>Section Description</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-save me-2"></i>Update Featured Work
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            {{-- Testimonials section moved to Reviews page --}}
            
        </div>
    </div>
</div>
@endsection

@section('portfolio-cards')
<div class="container-fluid">
    <!-- Portfolio Cards Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-1 text-dark fw-bold">Portfolio Cards</h1>
                    <p class="text-muted mb-0">Add, edit, and manage portfolio showcase cards</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-outline-primary" target="_blank">
                        <i class="fas fa-external-link-alt me-2"></i>Preview Site
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

    <!-- Portfolio Cards Management Section -->
    <div class="row">
        <div class="col-xl-10 col-lg-11 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-gradient-info text-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">
                        <i class="fas fa-th-large me-2"></i>Portfolio Cards Management
                    </h5>
                    <small class="opacity-75">Add, edit, and manage portfolio showcase cards</small>
                </div>
                <div class="card-body p-2">
                    <!-- Add New Card Form -->
                    <div class="mb-4">
                        <h6 class="fw-semibold mb-3">
                            <i class="fas fa-plus-circle me-2"></i>Add New Portfolio Card
                        </h6>
                        <form action="{{ route('admin.portfolio-cards.store') }}" method="POST" enctype="multipart/form-data" class="border rounded-3 p-3 bg-light">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="new_card_title" name="title" required>
                                        <label for="new_card_title"><i class="fas fa-heading me-2"></i>Card Title</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"><i class="fas fa-image me-2"></i>Portfolio Image</label>
                                    <input type="file" class="form-control" name="image" accept="image/*" required>
                                    <small class="text-muted">Upload an image for the portfolio card</small>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="new_card_description" name="description" style="height: 80px" required></textarea>
                                        <label for="new_card_description"><i class="fas fa-align-left me-2"></i>Card Description</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-info text-white">
                                        <i class="fas fa-plus me-2"></i>Add Portfolio Card
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Existing Cards List -->
                    <div class="mb-4">
                        <h6 class="fw-semibold mb-3">
                            <i class="fas fa-list me-2"></i>Existing Portfolio Cards
                        </h6>
                        <div id="portfolio-cards-list">
                            @forelse($portfolioCards as $card)
                                <div class="card mb-3 portfolio-card-item" data-card-id="{{ $card->id }}">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-md-8">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="badge {{ $card->background_class }} me-2">{{ $card->background_class }}</span>
                                                    <h6 class="mb-0 fw-semibold">{{ $card->title }}</h6>
                                                    @if(!$card->is_active)
                                                        <span class="badge bg-secondary ms-2">Inactive</span>
                                                    @endif
                                                </div>
                                                <p class="text-muted mb-2 small">{{ Str::limit($card->description, 100) }}</p>
                                                <small class="text-muted">Position: {{ $card->position }}</small>
                                            </div>
                                            <div class="col-md-4 text-end">
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="editCard({{ $card->id }})">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="toggleCardStatus({{ $card->id }}, {{ $card->is_active ? 'false' : 'true' }})">
                                                        <i class="fas fa-{{ $card->is_active ? 'eye-slash' : 'eye' }}"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteCard({{ $card->id }})">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Edit Form (Hidden by default) -->
                                        <div id="edit-form-{{ $card->id }}" class="mt-3" style="display: none;">
                                            <form action="{{ route('admin.portfolio-cards.update', $card->id) }}" method="POST" enctype="multipart/form-data" class="border-top pt-3">
                                                @csrf
                                                @method('PUT')
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" name="title" value="{{ $card->title }}" required>
                                                            <label><i class="fas fa-heading me-2"></i>Card Title</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label"><i class="fas fa-image me-2"></i>Portfolio Image</label>
                                                        <input type="file" class="form-control" name="image" accept="image/*">
                                                        <small class="text-muted">Leave empty to keep current image</small>
                                                        @if($card->image)
                                                            <div class="mt-2">
                                                                <img src="{{ asset('storage/' . $card->image) }}" alt="Current image" class="img-thumbnail" style="max-width: 100px;">
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <textarea class="form-control" name="description" style="height: 80px" required>{{ $card->description }}</textarea>
                                                            <label><i class="fas fa-align-left me-2"></i>Card Description</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input type="number" class="form-control" name="position" value="{{ $card->position }}" min="1" required>
                                                            <label><i class="fas fa-sort me-2"></i>Position</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 d-flex align-items-center">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ $card->is_active ? 'checked' : '' }}>
                                                            <label class="form-check-label">Active</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-success btn-sm me-2">
                                                            <i class="fas fa-save me-1"></i>Update Card
                                                        </button>
                                                        <button type="button" class="btn btn-secondary btn-sm" onclick="cancelEdit({{ $card->id }})">
                                                            <i class="fas fa-times me-1"></i>Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>No portfolio cards found. Add your first card above.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Live Preview Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-gradient-dark text-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0 fw-semibold">
                                <i class="fas fa-eye me-2"></i>Live Preview
                            </h5>
                            <small class="opacity-75">Real-time view of your portfolio</small>
                        </div>
                        <button class="btn btn-outline-light btn-sm" onclick="refreshPreview()">
                            <i class="fas fa-sync-alt me-1"></i>Refresh
                        </button>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="alert alert-info border-0 bg-info bg-opacity-10 mb-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-info-circle text-info me-3 fs-5"></i>
                            <div>
                                <strong>Live Updates:</strong> Changes will be reflected immediately after saving. 
                                Use the refresh button or "Preview Site" button above to see your latest changes.
                            </div>
                        </div>
                    </div>
                    <div class="position-relative">
                        <div class="bg-light rounded-3 p-2">
                            <iframe id="preview-iframe" src="{{ route('home') }}" width="100%" height="300" frameborder="0" class="border-0 rounded-2 shadow-sm"></iframe>
                        </div>
                        <div class="position-absolute top-0 start-0 bg-dark bg-opacity-75 text-white px-2 py-1 rounded-bottom-end small">
                            <i class="fas fa-desktop me-1"></i>Desktop Preview
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function refreshPreview() {
    const iframe = document.getElementById('preview-iframe');
    if (iframe) {
        iframe.src = iframe.src;
    }
}

function addSkill() {
    const container = document.getElementById('skills-container');
    const skillInput = document.createElement('div');
    skillInput.className = 'input-group mb-2 skill-input';
    skillInput.innerHTML = `
        <input type="text" class="form-control" name="profile_skills[]" placeholder="Enter skill" required>
        <button type="button" class="btn btn-outline-danger" onclick="removeSkill(this)">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(skillInput);
}

function removeSkill(button) {
    const skillInputs = document.querySelectorAll('.skill-input');
    if (skillInputs.length > 1) {
        button.closest('.skill-input').remove();
    } else {
        alert('At least one skill is required.');
    }
}

// Portfolio Cards Management Functions
function editCard(cardId) {
    const editForm = document.getElementById(`edit-form-${cardId}`);
    if (editForm) {
        editForm.style.display = editForm.style.display === 'none' ? 'block' : 'none';
    }
}

function cancelEdit(cardId) {
    const editForm = document.getElementById(`edit-form-${cardId}`);
    if (editForm) {
        editForm.style.display = 'none';
    }
}

function toggleCardStatus(cardId, newStatus) {
    if (confirm('Are you sure you want to change the status of this card?')) {
        // Create a form to submit the data properly
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/portfolio-cards/${cardId}`;
        form.style.display = 'none';
        
        // Add CSRF token
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.appendChild(csrfToken);
        
        // Add method override for PUT
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'PUT';
        form.appendChild(methodField);
        
        // Add is_active field
        const isActiveField = document.createElement('input');
        isActiveField.type = 'hidden';
        isActiveField.name = 'is_active';
        isActiveField.value = newStatus === 'true' ? '1' : '0';
        form.appendChild(isActiveField);
        
        // Get current card data and add other required fields
        const cardElement = document.querySelector(`[data-card-id="${cardId}"]`);
        if (cardElement) {
            const title = cardElement.querySelector('h6').textContent.trim();
            const description = cardElement.querySelector('p.text-muted').textContent.trim();
            const backgroundClass = cardElement.querySelector('.badge').textContent.trim();
            
            const titleField = document.createElement('input');
            titleField.type = 'hidden';
            titleField.name = 'title';
            titleField.value = title;
            form.appendChild(titleField);
            
            const descField = document.createElement('input');
            descField.type = 'hidden';
            descField.name = 'description';
            descField.value = description;
            form.appendChild(descField);
            
            const bgField = document.createElement('input');
            bgField.type = 'hidden';
            bgField.name = 'background_class';
            bgField.value = backgroundClass;
            form.appendChild(bgField);
        }
        
        document.body.appendChild(form);
        form.submit();
    }
}

function deleteCard(cardId) {
    if (confirm('Are you sure you want to delete this portfolio card? This action cannot be undone.')) {
        // Create a form to submit the delete request properly
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/portfolio-cards/${cardId}`;
        form.style.display = 'none';
        
        // Add CSRF token
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.appendChild(csrfToken);
        
        // Add method override for DELETE
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'DELETE';
        form.appendChild(methodField);
        
        document.body.appendChild(form);
        form.submit();
    }
}

// Auto-refresh preview iframe when form is submitted
document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            setTimeout(() => {
                const iframe = document.querySelector('iframe');
                if (iframe) {
                    iframe.src = iframe.src;
                }
            }, 1000);
        });
    });
});
</script>
@endpush