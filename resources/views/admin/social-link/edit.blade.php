@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Update Social Link</title>
    <!-- Bootstrap iconpicker css link -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-iconpicker.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Social Link</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Link</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.social-link.update', $link->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Icon</label>
                        <br>
                        <button class="btn btn-secondary" role="iconpicker" name="icon"
                            data-icon="{{ $link->icon }}"></button>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $link->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" name="link" value="{{ $link->link }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option @selected($link->status === 1) value="1">Yes</option>
                            <option @selected($link->status === 0) value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('admin-js')
    <!-- Bootstrap iconpicker js link -->
    <script src="{{ asset('admin/assets/js/bootstrap-iconpicker.js') }}"></script>
@endpush
