@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Contact</title>
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Updated Contact</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Updated Contact</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.contact.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Phone One</label>
                        <input type="text" name="phone_one" value="{{ @$contact->phone_one ?? old('phone_one') }}" class="form-control @error('phone_one') is-invalid @enderror">
                        @error('phone_one')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Phone Two</label>
                        <input type="text" name="phone_two" value="{{ @$contact->phone_two ?? old('phone_two') }}" class="form-control @error('phone_two') is-invalid @enderror">
                        @error('phone_two')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email One</label>
                        <input type="text" name="mail_one" value="{{ @$contact->mail_one ?? old('mail_one') }}" class="form-control @error('mail_one') is-invalid @enderror">
                        @error('mail_one')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email Two</label>
                        <input type="text" name="mail_two" value="{{ @$contact->mail_two ?? old('mail_two') }}" class="form-control @error('mail_two') is-invalid @enderror">
                        @error('mail_two')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" value="{{ @$contact->address ?? old('address') }}" class="form-control @error('address') is-invalid @enderror">
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Google Map Link</label>
                        <input type="text" name="map_link" value="{{ @$contact->map_link ?? old('map_link') }}" class="form-control @error('map_link') is-invalid @enderror">
                        @error('map_link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
