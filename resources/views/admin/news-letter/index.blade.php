@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | All Subscribers</title>
    <!-- dataTables css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dataTables-bootstrap4.css') }}">
    <!-- Summernote-->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Subscribers</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Subscribers</h4>
                <div class="card-header-action">
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Send News
                        Letter</button>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
@endsection

@section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Send News Letter..</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.news-letter.send') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Subject <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject"
                                value="{{ old('subject') }}">
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Message <span class="text-danger">*</span></label>
                            <textarea name="message" class="summernote form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('admin-js')
    <!-- Summernote js-->
    <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <!-- dataTables js -->
    <script src="{{ asset('admin/assets/js/jquery-dataTables.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dataTables-bootstrap4.js') }}"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
