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
                        <textarea name="short_info" class="form-control @error('short_info') is-invalid @enderror">{{ @$footerInfo->short_info }}</textarea>
                        @error('short_info')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" value="{{ @$footerInfo->address ?? old('address') }}"
                            class="form-control @error('address') is-invalid @enderror">
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{ @$footerInfo->phone ?? old('phone') }}"
                            class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="{{ @$footerInfo->email ?? old('email') }}"
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Copyright</label>
                        <input type="text" name="copyright" value="{{ @$footerInfo->copyright ?? old('copyright') }}"
                            class="form-control @error('copyright') is-invalid @enderror">
                        @error('copyright')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
