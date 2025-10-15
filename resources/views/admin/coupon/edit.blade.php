@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Update Coupon</title>
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Update Coupon</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Coupon</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.coupon.update', $coupon->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ $coupon->name ?? old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Coupon Code <span class="text-danger">*</span></label>
                        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                            value="{{ $coupon->code ?? old('code') }}">
                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Coupon Quantity <span class="text-danger">*</span></label>
                        <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                            value="{{ $coupon->quantity ?? old('quantity') }}">
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Minumum Purchase Price <span class="text-danger">*</span></label>
                        <input type="text" name="min_purchase_amount"
                            class="form-control @error('min_purchase_amount') is-invalid @enderror"
                            value="{{ $coupon->min_purchase_amount ?? old('min_purchase_amount') }}">
                        @error('min_purchase_amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Expire Date <span class="text-danger">*</span></label>
                        <input type="date" name="expire_date" class="form-control @error('expire_date') is-invalid @enderror" value="{{ $coupon->expire_date ?? old('expire_date') }}">
                        @error('expire_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Discount Type</label>
                        <select name="discount_type" class="form-control @error('discount_type') is-invalid @enderror">
                            <option @selected($coupon->discount_type === 'percent') value="percent">Percent</option>
                            <option @selected($coupon->discount_type === 'amount') value="amount">Amount
                                ({{ config('settings.site_currency_icon') }})</option>
                        </select>
                        @error('discount_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Discount Amount <span class="text-danger">*</span></label>
                        <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" value="{{ $coupon->discount ?? old('discount') }}">
                        @error('discount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option @selected($coupon->status === 1) value="1">Active</option>
                            <option @selected($coupon->status === 0) value="0">Inactive</option>
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
