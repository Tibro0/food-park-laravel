@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Update Banner Slider</title>
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Update Banner Slider</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Banner Slider</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.banner-slider.update', $bannerSlider->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                            <input type="hidden" name="old_image" value="{{ $bannerSlider->banner }}" />
                        </div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ $bannerSlider->title ?? old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Sub Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('sub_title') is-invalid @enderror" name="sub_title"
                            value="{{ $bannerSlider->sub_title ?? old('sub_title') }}">
                        @error('sub_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Url <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('url') is-invalid @enderror" name="url"
                            value="{{ $bannerSlider->url ?? old('url') }}">
                        @error('url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option @selected($bannerSlider->status === 1) value="1">Active</option>
                            <option @selected($bannerSlider->status === 0) value="0">Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
        $(document).ready(function() {
            $('.image-preview').css({
                'background-image': 'url({{ asset($bannerSlider->banner) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
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
