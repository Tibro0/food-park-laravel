@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Update Why Choose Us</title>
    <!-- iconpicker css link -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-iconpicker.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Update Why Choose Us Section</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Why Choose Us Section</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.why-choose-us.update', $whyChooseUs->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Icon <span class="text-danger">*</span></label>
                        <br>
                        <button class="btn btn-primary" role="iconpicker" name="icon"
                            data-icon="{{ $whyChooseUs->icon ?? old('icon') }}"></button>
                        @error('icon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" value="{{ $whyChooseUs->title ?? old('title') }}"
                            class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Short Description <span class="text-danger">*</span></label>
                        <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror">{{ $whyChooseUs->short_description ?? old('short_description') }}</textarea>
                        @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option @selected($whyChooseUs->status === 1) value="1">Active</option>
                            <option @selected($whyChooseUs->status === 0) value="0">InActive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('admin-js')
    <!-- iconpicker js link -->
    <script src="{{ asset('admin/assets/js/bootstrap-iconpicker.js') }}"></script>
@endpush
