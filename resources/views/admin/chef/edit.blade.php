@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Update Chef</title>
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Chefs</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Chef</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.chefs.update', $chef->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                            <input type="hidden" name="old_image" value="{{ $chef->image }}" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $chef->name }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $chef->title }}" class="form-control">
                    </div>

                    <br>
                    <h5>Social Links</h5>
                    <div class="form-group">
                        <label>Facebook <code>(Leave empty for hide)</code></label>
                        <input type="text" name="fb" value="{{ $chef->fb }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Linkedin <code>(Leave empty for hide)</code></label>
                        <input type="text" name="in" value="{{ $chef->in }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>X <code>(Leave empty for hide)</code></label>
                        <input type="text" name="x" value="{{ $chef->x }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Web <code>(Leave empty for hide)</code></label>
                        <input type="text" name="web" value="{{ $chef->web }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Show at Home</label>
                        <select name="show_at_home" class="form-control">
                            <option @selected($chef->show_at_home === 0) value="0">No</option>
                            <option @selected($chef->show_at_home === 1) value="1">Yes</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option @selected($chef->status === 1) value="1">Active</option>
                            <option @selected($chef->status === 0) value="0">Inactive</option>
                        </select>
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
                'background-image': 'url({{ asset($chef->image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
@endpush
