@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Privacy Policy</title>
    <!-- Summernote-->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Privacy Policy</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Privacy Policy</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.privacy-policy.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="summernote" class="form-control">{!! @$privacyPolicy->content !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('admin-js')
    <!-- Summernote js-->
    <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
@endpush
