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

        <div class="card">
            <div class="card-body">
                <div id="accordion">
                    <div class="accordion">
                        <div class="accordion-header collapsed bg-primary text-light p-3 " role="button"
                            data-toggle="collapse" data-target="#panel-body-1" aria-expanded="false">
                            <h4>Send News Letter..</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion" style="">
                            <form action="{{ route('admin.news-letter.send') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control" name="subject" value="{{ old('subject') }}">
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="message" class="summernote">{{ old('message') }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Subscribers</h4>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
@endsection

@push('admin-js')
    <!-- Summernote js-->
    <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <!-- dataTables js -->
    <script src="{{ asset('admin/assets/js/jquery-dataTables.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dataTables-bootstrap4.js') }}"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
