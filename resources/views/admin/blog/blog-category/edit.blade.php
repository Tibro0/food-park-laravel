@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Update Blog Category</title>
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Update Blog Categories</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Blog Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.blog-category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ $category->name ?? old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option @selected($category->status === 1) value="1">Active</option>
                            <option @selected($category->status === 0) value="0">Inactive</option>
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
