@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | App Download Section</title>
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>App Download Section</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Section</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.app-download.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Image</label>
                                <div id="image-preview" class="image-preview image-preview-1">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="image" id="image-upload" />
                                    <input type="hidden" name="old_image" value="{{ @$appSection->image }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ @$appSection->title }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="short_description" class="form-control">{{ @$appSection->short_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Play Store Link <code>(Leave empty for hide)</code></label>
                        <input type="text" name="play_store_link" class="form-control"
                            value="{{ @$appSection->play_store_link }}">
                    </div>
                    <div class="form-group">
                        <label>Apple Store Link <code>(Leave empty for hide)</code></label>
                        <input type="text" name="apple_store_link" class="form-control"
                            value="{{ @$appSection->apple_store_link }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('admin-js')
    <!-- image-preview js -->
    <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script>
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });

        $(document).ready(function() {
            $('.image-preview-1').css({
                'background-image': 'url({{ asset(@$appSection->image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
@endpush
