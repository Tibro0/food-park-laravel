@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Update Testimonial</title>
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Testimonials</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Testimonial</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                            <input type="hidden" name="old_image" value="{{ $testimonial->image }}" />
                        </div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ $testimonial->name ?? old('name') }}"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" value="{{ $testimonial->title ?? old('title') }}"
                            class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Rating</label>
                        <select name="rating" class="form-control @error('rating') is-invalid @enderror">
                            <option @selected($testimonial->rating === 1) value="1">1</option>
                            <option @selected($testimonial->rating === 2) value="2">2</option>
                            <option @selected($testimonial->rating === 3) value="3">3</option>
                            <option @selected($testimonial->rating === 4) value="4">4</option>
                            <option @selected($testimonial->rating === 5) value="5">5</option>
                        </select>
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Review <span class="text-danger">*</span></label>
                        <textarea name="review" class="form-control @error('review') is-invalid @enderror">{{ $testimonial->review ?? old('review') }}</textarea>
                        @error('review')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Show at Home</label>
                        <select name="show_at_home" class="form-control @error('show_at_home') is-invalid @enderror">
                            <option @selected($testimonial->show_at_home === 0) value="0">No</option>
                            <option @selected($testimonial->show_at_home === 1) value="1">Yes</option>
                        </select>
                        @error('show_at_home')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option @selected($testimonial->status === 1) value="1">Active</option>
                            <option @selected($testimonial->status === 0) value="0">Inactive</option>
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
    <script>
        $(document).ready(function() {
            $('.image-preview').css({
                'background-image': 'url({{ asset($testimonial->image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
@endpush
