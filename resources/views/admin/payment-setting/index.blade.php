@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Payment Gateway</title>
    <!-- select2 css-->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/select2/dist/css/select2.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Payment Gateway</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Gateways</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-2">
                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#paypal-setting"
                                    role="tab" aria-controls="home" aria-selected="true">Paypal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#stripe-setting"
                                    role="tab" aria-controls="profile" aria-selected="false">Stripe</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#razorpay-setting"
                                    role="tab" aria-controls="contact" aria-selected="false">Razorpay</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-10">
                        <div class="tab-content no-padding" id="myTab2Content">
                            <!-- paypal include link start -->
                            @include('admin.payment-setting.sections.paypal')
                            <!-- paypal include link end -->
                            <!-- stripe include link start -->
                            @include('admin.payment-setting.sections.stripe')
                            <!-- stripe include link end -->
                            <!-- razorpay include link start -->
                            @include('admin.payment-setting.sections.razorpay')
                            <!-- razorpay include link end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('admin-js')
    <!--select2 JS -->
    <script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- image-preview js -->
    <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script>
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>
@endpush
