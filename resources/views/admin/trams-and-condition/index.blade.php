@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Trams and Conditions</title>
    <!-- Summernote-->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Trams and Conditions</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Trams and Conditions</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.trams-and-conditions.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Content <span class="text-danger">*</span></label>
                        <textarea name="content" class="summernote form-control @error('content') is-invalid @enderror">{!! @$tramsAndCondition->content ?? old('content') !!}</textarea>
                        @error('content')
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
    <!-- Summernote js-->
    <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
@endpush
