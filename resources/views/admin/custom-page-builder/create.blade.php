@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Create Custom Page</title>
    <!-- Summernote-->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Custom Page Builder</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Page</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.custom-page-builder.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Page Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Page Contents</label>
                        <textarea name="content" class="form-control summernote">{{ old('content') }}</textarea>
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
@endpush
