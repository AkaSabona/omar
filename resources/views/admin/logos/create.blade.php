@extends('layouts.admin')

@section('title', 'Add New Logo')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Add New Logo</h3>
                    <a href="{{ route('admin.logos.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Logos
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.logos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('title') is-invalid @enderror" 
                                           id="title" 
                                           name="title" 
                                           value="{{ old('title') }}" 
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
                                              required>{{ old('description') }}</textarea>
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
                                                   value="{{ old('start_date') }}" 
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
                                                   value="{{ old('end_date') }}" 
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
                                              placeholder="Additional details about this logo/client...">{{ old('read_more') }}</textarea>
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
                                                   value="{{ old('popup_title') }}" 
                                                   placeholder="e.g., Energizer - Powering Innovation">
                                            @error('popup_title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                            <label for="popup_description" class="form-label">Popup Description</label>
                            <textarea class="form-control tinymce @error('popup_description') is-invalid @enderror" 
                                      id="popup_description" 
                                      name="popup_description" 
                                      rows="8" 
                                      placeholder="Brief description of the work done for this client...">{{ old('popup_description') }}</textarea>
                            @error('popup_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Use the rich text editor to format content, add images, and create layouts</small>
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
                                                   value="{{ old('position', 1) }}" 
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
                                                       {{ old('is_active', true) ? 'checked' : '' }}>
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

                                <div class="mb-3">
                                    <div id="image-preview" class="text-center" style="display: none;">
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
                                        <i class="fas fa-save me-2"></i>Create Logo
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
<!-- Bootstrap 3.4.1 CSS -->
<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
<style>
/* TinyMCE Custom Styles */
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
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap 3.4.1 JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- TinyMCE JS (Offline) -->
<script src="{{ asset('dashboard/tinymce/tinymce.min.js') }}"></script>
<script>
$(document).ready(function() {
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
    $('#image').on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-img').attr('src', e.target.result);
                $('#image-preview').show();
            };
            reader.readAsDataURL(file);
        } else {
            $('#image-preview').hide();
        }
    });
});


</script>
@endpush
@endsection