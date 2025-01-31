@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Setting</title>
    <!-- select2 css-->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/select2/dist/css/select2.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Settings</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Settings</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-2">
                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#general-setting"
                                    role="tab" aria-controls="home" aria-selected="true">General Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab4" data-toggle="tab" href="#logo-setting" role="tab"
                                    aria-controls="home" aria-selected="true">Logo Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab4" data-toggle="tab" href="#appearance-setting"
                                    role="tab" aria-controls="home" aria-selected="true">Appearance Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#mail-setting" role="tab"
                                    aria-controls="contact" aria-selected="false">Mail Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="" data-toggle="tab" href="#seo-setting" role="tab"
                                    aria-controls="contact" aria-selected="false">Seo Settings</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-10">
                        <div class="tab-content no-padding" id="myTab2Content">
                            <!-- General Settings include links Start -->
                            @include('admin.setting.sections.general-setting')
                            <!-- General Settings include links End -->
                            <!-- Logo Settings include links Start -->
                            @include('admin.setting.sections.logo-setting')
                            <!-- Logo Settings include links End -->
                            <!-- Appearance Settings include links Start -->
                            @include('admin.setting.sections.appearance-setting')
                            <!-- Appearance Settings include links End -->
                            <!-- Mail Settings include links Start -->
                            @include('admin.setting.sections.mail-setting')
                            <!-- Mail Settings include links End -->
                            <!-- SEO Settings include links Start -->
                            @include('admin.setting.sections.seo-setting')
                            <!-- SEO Settings include links End -->
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
@endpush
