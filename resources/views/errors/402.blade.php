@extends('frontend.layouts.master')

@push('frontend-css')
    <title>FoodPark || 402 Page</title>
@endpush

@section('frontend-content')
    <!--=============================BREADCRUMB START==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>402 Page</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">home</a></li>
                        <li><a href="javascript:;">402 Page</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================BREADCRUMB END==============================-->

    <!--============================402 PAGE START==============================-->
    <section class="fp__payment_page mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>402 - Payment Required</h2>
                    <p>You need to make a payment to access this page.</p>
                    <a class="common_btn mt-4" href="{{ route('dashboard') }}">Go to Home</a>
                </div>
            </div>
        </div>
    </section>
    <!--============================402 PAGE END==============================-->
@endsection
