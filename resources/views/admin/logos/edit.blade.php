@extends('layouts.admin')

@section('title', 'Edit Logo')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Edit Logo: {{ $logo->title }}</h3>
                    <div>
                        <a href="{{ route('admin.logos.show', $logo) }}" class="btn btn-info me-2">
                            <i class="fas fa-eye me-2"></i>View
                        </a>
                        <a href="{{ route('admin.logos.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Logos
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.logos.update', $logo) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('title') is-invalid @enderror" 
                                           id="title" 
                                           name="title" 
                                           value="{{ old('title', $logo->title) }}" 
                                           required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" 
                                              name="description" 
                                              rows="3" 
                                              required>{{ old('description', $logo->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="start_date" class="form-label">Start Date</label>
                                            <input type="text" 
                                                   class="form-control @error('start_date') is-invalid @enderror" 
                                                   id="start_date" 
                                                   name="start_date" 
                                                   value="{{ old('start_date', $logo->start_date) }}" 
                                                   placeholder="e.g., 2020-01">
                                            @error('start_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="end_date" class="form-label">End Date</label>
                                            <input type="text" 
                                                   class="form-control @error('end_date') is-invalid @enderror" 
                                                   id="end_date" 
                                                   name="end_date" 
                                                   value="{{ old('end_date', $logo->end_date) }}" 
                                                   placeholder="e.g., 2023-12">
                                            @error('end_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="read_more" class="form-label">Read More Content</label>
                                    <textarea class="form-control @error('read_more') is-invalid @enderror" 
                                              id="read_more" 
                                              name="read_more" 
                                              rows="4" 
                                              placeholder="Additional details about this logo/client...">{{ old('read_more', $logo->read_more) }}</textarea>
                                    @error('read_more')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Popup Content Section -->
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <h5 class="mb-0">Popup Content (View Content Modal)</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="popup_title" class="form-label">Popup Title</label>
                                            <input type="text" 
                                                   class="form-control @error('popup_title') is-invalid @enderror" 
                                                   id="popup_title" 
                                                   name="popup_title" 
                                                   value="{{ old('popup_title', $logo->popup_title) }}" 
                                                   placeholder="e.g., Energizer - Powering Innovation">
                                            @error('popup_title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                            <label for="popup_description" class="form-label">Popup Description</label>
                            <textarea class="form-control summernote @error('popup_description') is-invalid @enderror" 
                                      id="popup_description" 
                                      name="popup_description" 
                                      rows="8" 
                                      placeholder="Brief description of the work done for this client...">{{ old('popup_description', $logo->popup_description) }}</textarea>
                            @error('popup_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Use the rich text editor to format content, add images, and create multi-column layouts. Use the Layout buttons in the toolbar to insert 2, 3, or 4 column layouts for better content organization.</small>
                        </div>


                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="position" class="form-label">Position <span class="text-danger">*</span></label>
                                            <input type="number" 
                                                   class="form-control @error('position') is-invalid @enderror" 
                                                   id="position" 
                                                   name="position" 
                                                   value="{{ old('position', $logo->position) }}" 
                                                   min="1" 
                                                   required>
                                            @error('position')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" 
                                                       type="checkbox" 
                                                       id="is_active" 
                                                       name="is_active" 
                                                       value="1" 
                                                       {{ old('is_active', $logo->is_active) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_active">
                                                    Active
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Logo Image</label>
                                    <input type="file" 
                                           class="form-control @error('image') is-invalid @enderror" 
                                           id="image" 
                                           name="image" 
                                           accept="image/*">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Supported formats: JPG, PNG, GIF, SVG (Max: 2MB)</small>
                                </div>

                                @if($logo->image)
                                    <div class="mb-3">
                                        <label class="form-label">Current Image</label>
                                        <div class="text-center position-relative">
                                            <img src="{{ asset('storage/' . $logo->image) }}" 
                                                 alt="{{ $logo->title }}" 
                                                 class="img-fluid rounded" 
                                                 style="max-height: 200px; cursor: pointer; transition: transform 0.3s ease;" 
                                                 id="current-logo-image">
                                            
                                            <!-- Image Alignment Panel -->
                                            <div id="image-controls" class="mt-3" style="display: none;">
                                                <div class="card border-primary">
                                                    <div class="card-header bg-primary text-white text-center">
                                                        <h6 class="mb-0"><i class="fas fa-align-center me-2"></i>Image Alignment</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row text-center">
                                                            <div class="col-4">
                                                                <button type="button" class="btn btn-outline-primary btn-sm w-100" onclick="alignImage('left')">
                                                                    <i class="fas fa-align-left"></i><br>Left
                                                                </button>
                                                            </div>
                                                            <div class="col-4">
                                                                <button type="button" class="btn btn-outline-primary btn-sm w-100" onclick="alignImage('center')">
                                                                    <i class="fas fa-align-center"></i><br>Center
                                                                </button>
                                                            </div>
                                                            <div class="col-4">
                                                                <button type="button" class="btn btn-outline-primary btn-sm w-100" onclick="alignImage('right')">
                                                                    <i class="fas fa-align-right"></i><br>Right
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3 text-center">
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="toggleImageControls()">
                                                                <i class="fas fa-times"></i> Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <div id="image-preview" class="text-center" style="display: none;">
                                        <label class="form-label">New Image Preview</label>
                                        <img id="preview-img" src="" alt="Preview" class="img-fluid rounded" style="max-height: 200px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.logos.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-times me-2"></i>Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Update Logo
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
/* TinyMCE custom styles */
.tox-tinymce {
    border: 1px solid #ddd;
    border-radius: 4px;
}

.tox .tox-editor-header {
    border-bottom: 1px solid #ddd;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .tox-tinymce {
        min-width: 100% !important;
        margin-bottom: 15px;
    }
}
</style>
@endpush

@push('scripts')
<!-- TinyMCE JS (Offline) -->
<script src="{{ asset('dashboard/tinymce/tinymce.min.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize TinyMCE
    tinymce.init({
        selector: '#popup_description',
        height: 300,
        menubar: false,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks fontsize | ' +
            'bold italic underline strikethrough | forecolor backcolor | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | ' +
            'link image media table | ' +
            'code fullscreen preview | removeformat help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        
        // Image upload configuration
        images_upload_url: '{{ route("admin.logos.upload-image") }}',
        images_upload_handler: function (blobInfo, progress) {
            return new Promise(function (resolve, reject) {
                var xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '{{ route("admin.logos.upload-image") }}');
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                
                xhr.upload.onprogress = function (e) {
                    progress(e.loaded / e.total * 100);
                };
                
                xhr.onload = function() {
                    if (xhr.status < 200 || xhr.status >= 300) {
                        reject('HTTP Error: ' + xhr.status);
                        return;
                    }
                    
                    var json;
                    try {
                        json = JSON.parse(xhr.responseText);
                    } catch (e) {
                        reject('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    
                    if (!json || typeof json.location != 'string') {
                        reject('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    
                    resolve(json.location);
                };
                
                xhr.onerror = function() {
                    reject('Image upload failed');
                };
                
                var formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            });
        },
        
        // Additional configurations
        paste_data_images: true,
        automatic_uploads: true,
        file_picker_types: 'image',
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            
            input.onchange = function() {
                var file = this.files[0];
                if (!file) return;
                
                // Use the same upload handler for file picker
                var blobInfo = tinymce.activeEditor.editorUpload.blobCache.create({
                    id: 'file' + (new Date()).getTime(),
                    blob: file,
                    base64: null
                });
                
                tinymce.activeEditor.editorUpload.blobCache.add(blobInfo);
                
                // Upload the file using our handler
                tinymce.activeEditor.uploadImages(function() {
                    // After upload, call the callback with the blob URI
                    cb(blobInfo.blobUri(), { title: file.name });
                });
            };
            
            input.click();
        }
    });
    
    // Image preview functionality
    const imageInput = document.getElementById('image');
    if (imageInput) {
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const previewImg = document.getElementById('preview-img');
            const imagePreview = document.getElementById('image-preview');
            
            if (file && previewImg && imagePreview) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else if (imagePreview) {
                imagePreview.style.display = 'none';
            }
        });
    }
});

// Image Alignment Functions
// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing image alignment controls...');
    
    // Check if image exists
    const image = document.getElementById('current-logo-image');
    if (image) {
        console.log('Image found, adding click listener');
        image.addEventListener('click', function() {
            console.log('Image clicked!');
            toggleImageControls();
        });
    } else {
        console.log('Image not found!');
    }
});

function toggleImageControls() {
    console.log('toggleImageControls called');
    const controls = document.getElementById('image-controls');
    const image = document.getElementById('current-logo-image');
    
    if (!controls || !image) {
        console.error('Controls or image not found!');
        return;
    }
    
    if (controls.style.display === 'none' || controls.style.display === '') {
        controls.style.display = 'block';
        image.style.boxShadow = '0 0 20px rgba(0,123,255,0.5)';
        image.style.border = '3px solid #007bff';
        console.log('Controls shown');
    } else {
        controls.style.display = 'none';
        image.style.boxShadow = 'none';
        image.style.border = 'none';
        console.log('Controls hidden');
    }
}

function alignImage(alignment) {
    console.log('Aligning image:', alignment);
    const imageContainer = document.querySelector('#current-logo-image').parentElement;
    
    if (!imageContainer) {
        console.error('Image container not found!');
        return;
    }
    
    // Remove existing alignment classes
    imageContainer.classList.remove('text-left', 'text-center', 'text-right');
    
    // Apply new alignment
    switch(alignment) {
        case 'left':
            imageContainer.classList.add('text-left');
            break;
        case 'center':
            imageContainer.classList.add('text-center');
            break;
        case 'right':
            imageContainer.classList.add('text-right');
            break;
    }
    
    console.log('Image aligned to:', alignment);
    
    // Add visual feedback
    const image = document.getElementById('current-logo-image');
    image.style.transition = 'all 0.3s ease';
}
</script>
@endpush
@endsection