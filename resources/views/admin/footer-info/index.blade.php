@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Footer Info</title>
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Update Footer Info</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Footer Info</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.footer-info.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Short Info</label>
                        <textarea name="short_info" class="form-control">{{ @$footerInfo->short_info }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" value="{{ @$footerInfo->address }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{ @$footerInfo->phone }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="{{ @$footerInfo->email }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Copyright</label>
                        <input type="text" name="copyright" value="{{ @$footerInfo->copyright }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
