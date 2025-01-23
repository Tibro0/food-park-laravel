@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Create Blog</title>
    <!-- Summernote-->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">
    <!-- select2 css-->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/select2/dist/css/select2.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Create Blog</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Blog</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label>Category</label>
                        <select name="category" class="form-control select2">
                            <option value="">Select</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control summernote">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Seo Title</label>
                        <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title') }}">
                    </div>

                    <div class="form-group">
                        <label>Seo Description</label>
                        <textarea name="seo_description" class="form-control">{{ old('seo_description') }}</textarea>
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
    <!-- Summernote js-->
    <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <!--select2 JS -->
    <script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
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
