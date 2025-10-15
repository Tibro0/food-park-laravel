@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Create Delivery Area</title>
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Delivery Area</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Delivery Area</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.delivery-area.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Area Name <span class="text-danger">*</span></label>
                        <input type="text" name="area_name" value="{{ old('area_name') }}"
                            class="form-control @error('area_name') is-invalid @enderror">
                        @error('area_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Minimum Delivery Time <span class="text-danger">*</span></label>
                                <input type="text" name="min_delivery_time" value="{{ old('min_delivery_time') }}"
                                    class="form-control @error('min_delivery_time') is-invalid @enderror">
                                @error('min_delivery_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Maximum Delivery Time <span class="text-danger">*</span></label>
                                <input type="text" name="max_delivery_time" value="{{ old('max_delivery_time') }}"
                                    class="form-control @error('max_delivery_time') is-invalid @enderror">
                                @error('max_delivery_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Delivery Fee <span class="text-danger">*</span></label>
                                <input type="text" name="delivery_fee" value="{{ old('delivery_fee') }}"
                                    class="form-control @error('delivery_fee') is-invalid @enderror">
                                @error('delivery_fee')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
