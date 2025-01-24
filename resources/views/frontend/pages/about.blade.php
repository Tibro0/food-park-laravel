@extends('frontend.layouts.master')

@push('frontend-css')
    <title>FoodPark || About Us</title>
@endpush

@section('frontend-content')
    <!--=============================BREADCRUMB START==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset('frontend/images/counter_bg.jpg') }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>about Us</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">home</a></li>
                        <li><a href="javascript:;">about us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================BREADCRUMB END==============================-->


    <!--=============================ABOUT PAGE START==============================-->
    <section class="fp__about_us mt_120 xs_mt_90">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-5 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__about_us_img">
                        <img src="images/about_chef.jpg" alt="about us" class="img-fluid w-100">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__section_heading mb_40">
                        <h4>About Company</h4>
                        <h2>Helathy Foods Provider</h2>
                        <span>
                            <img src="images/heading_shapes.png" alt="shapes" class="img-fluid w-100">
                        </span>
                    </div>
                    <div class="fp__about_us_text">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate aspernatur molestiae
                            minima pariatur consequatur voluptate sapiente deleniti soluta, animi ab necessitatibus
                            optio similique quasi fuga impedit corrupti obcaecati neque consequatur sequi.</p>
                        <ul>
                            <li>Delicious & Healthy Foods </li>
                            <li>Spacific Family & Kids Zone</li>
                            <li>Best Price & Offers</li>
                            <li>Made By Fresh Ingredients</li>
                            <li>Music & Other Facilities</li>
                            <li>Delicious & Healthy Foods </li>
                            <li>Spacific Family & Kids Zone</li>
                            <li>Best Price & Offers</li>
                            <li>Made By Fresh Ingredients</li>
                            <li>Delicious & Healthy Foods </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================ABOUT PAGE END==============================-->
@endsection
