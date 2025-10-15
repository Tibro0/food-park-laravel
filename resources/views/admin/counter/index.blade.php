@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Counter</title>
    <!-- Bootstrap iconpicker css link -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-iconpicker.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Counter</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Counter</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.counter.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Background</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="background" id="image-upload" />
                            <input type="hidden" name="old_background" id="image-upload"
                                value="{{ @$counter->background }}" />
                        </div>
                        @error('background')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <h6>Counter One</h6>
                    <hr>
                    <div class="form-group">
                        <label>Counter Icon One <span class="text-danger">*</span></label>
                        <br>
                        <button class="btn btn-secondary" role="iconpicker" name="counter_icon_one"
                            data-icon="{{ @$counter->counter_icon_one ?? old('counter_icon_one') }}"></button>
                        @error('counter_icon_one')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Counter count One <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('counter_count_one') is-invalid @enderror"
                            name="counter_count_one" value="{{ @$counter->counter_count_one ?? old('counter_count_one') }}">
                        @error('counter_count_one')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Counter count Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('counter_name_one') is-invalid @enderror"
                            name="counter_name_one" value="{{ @$counter->counter_name_one ?? old('counter_name_one') }}">
                        @error('counter_name_one')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <h6>Counter Two</h6>
                    <hr>
                    <div class="form-group">
                        <label>Counter Icon Two <span class="text-danger">*</span></label>
                        <br>
                        <button class="btn btn-secondary" role="iconpicker" name="counter_icon_two"
                            data-icon="{{ @$counter->counter_icon_two ?? old('counter_icon_two') }}"></button>
                        @error('counter_icon_two')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Counter count Two <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('counter_count_two') is-invalid @enderror"
                            name="counter_count_two"
                            value="{{ @$counter->counter_count_two ?? old('counter_count_two') }}">
                        @error('counter_count_two')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Counter count Name Two <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('counter_name_two') is-invalid @enderror"
                            name="counter_name_two" value="{{ @$counter->counter_name_two ?? old('counter_name_two') }}">
                        @error('counter_name_two')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <h6>Counter Three</h6>
                    <hr>
                    <div class="form-group">
                        <label>Counter Icon Three <span class="text-danger">*</span></label>
                        <br>
                        <button class="btn btn-secondary" role="iconpicker" name="counter_icon_three"
                            data-icon="{{ @$counter->counter_icon_three ?? old('counter_icon_three') }}"></button>
                        @error('counter_icon_three')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Counter Count Three <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('counter_count_three') is-invalid @enderror"
                            name="counter_count_three"
                            value="{{ @$counter->counter_count_three ?? old('counter_count_three') }}">
                        @error('counter_count_three')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Counter count Name There <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('counter_name_three') is-invalid @enderror"
                            name="counter_name_three"
                            value="{{ @$counter->counter_name_three ?? old('counter_name_three') }}">
                        @error('counter_name_three')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <h6>Counter Four</h6>
                    <hr>
                    <div class="form-group">
                        <label>Counter Icon Four <span class="text-danger">*</span></label>
                        <br>
                        <button class="btn btn-secondary" role="iconpicker" name="counter_icon_four"
                            data-icon="{{ @$counter->counter_icon_four ?? old('counter_icon_four') }}"></button>
                        @error('counter_icon_four')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Counter Count Four <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('counter_count_four') is-invalid @enderror"
                            name="counter_count_four"
                            value="{{ @$counter->counter_count_four ?? old('counter_count_four') }}">
                        @error('counter_count_four')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Counter count Name Four <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('counter_name_four') is-invalid @enderror"
                            name="counter_name_four"
                            value="{{ @$counter->counter_name_four ?? old('counter_name_four') }}">
                        @error('counter_name_four')
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
    <script src="{{ asset('admin/assets/js/bootstrap-iconpicker.js') }}"></script>
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
                'background-image': 'url({{ asset(@$counter->background) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
@endpush
