@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Create Why Choose Us</title>
    <!-- iconpicker css link -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-iconpicker.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Why Choose Us Section</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Why Choose Us Section</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.why-choose-us.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Icon</label>
                        <br>
                        <button class="btn btn-primary" role="iconpicker" name="icon"></button>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea name="short_description" class="form-control">{{ old('short_description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                        </select>
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
