@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Create Banner Slider</title>
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Banner Slider</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Banner Slider</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.banner-slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Sub Title</label>
                        <input type="text" name="sub_title" value="{{ old('sub_title') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Url</label>
                        <input type="text" name="url" value="{{ old('url') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
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
    </script>
@endpush
