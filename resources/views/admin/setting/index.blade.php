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
                                <a class="nav-link list-view {{ Session::has('setting_list_style') && Session::get('setting_list_style') == 'section_one' ? 'active' : '' }} {{ !Session::has('setting_list_style') ? 'active' : '' }}"
                                    data-id="section_one" id="home-tab4" data-toggle="tab" href="#general-setting"
                                    role="tab" aria-controls="home" aria-selected="true">General Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-view {{ Session::has('setting_list_style') && Session::get('setting_list_style') == 'section_two' ? 'active' : '' }}" data-id="section_two" id="home-tab4" data-toggle="tab" href="#logo-setting" role="tab"
                                    aria-controls="home" aria-selected="true">Logo Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-view {{ Session::has('setting_list_style') && Session::get('setting_list_style') == 'section_three' ? 'active' : '' }}" data-id="section_three" id="home-tab4" data-toggle="tab" href="#appearance-setting"
                                    role="tab" aria-controls="home" aria-selected="true">Appearance Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-view {{ Session::has('setting_list_style') && Session::get('setting_list_style') == 'section_four' ? 'active' : '' }}" data-id="section_four" id="contact-tab4" data-toggle="tab" href="#mail-setting" role="tab"
                                    aria-controls="contact" aria-selected="false">Mail Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-view {{ Session::has('setting_list_style') && Session::get('setting_list_style') == 'section_five' ? 'active' : '' }}" data-id="section_five" id="" data-toggle="tab" href="#seo-setting" role="tab"
                                    aria-controls="contact" aria-selected="false">Seo Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-view {{ Session::has('setting_list_style') && Session::get('setting_list_style') == 'section_six' ? 'active' : '' }}" data-id="section_six" id="" data-toggle="tab" href="#github-setting" role="tab"
                                    aria-controls="contact" aria-selected="false">Github Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-view {{ Session::has('setting_list_style') && Session::get('setting_list_style') == 'section_seven' ? 'active' : '' }}" data-id="section_seven" id="" data-toggle="tab" href="#google-setting" role="tab"
                                    aria-controls="contact" aria-selected="false">Google Settings</a>
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
                            <!-- Github Settings include links Start -->
                            @include('admin.setting.sections.github-setting')
                            <!-- Github Settings include links End -->
                            <!-- Google Settings include links Start -->
                            @include('admin.setting.sections.google-setting')
                            <!-- Google Settings include links End -->
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
    {{-- List Link Active --}}
    <script>
        $(document).ready(function() {
            $('.list-view').on('click', function() {
                let style = $(this).data('id');
                $.ajax({
                    method: "GET",
                    url: "{{ route('admin.setting-list-style') }}",
                    data: {
                        style: style
                    },
                    success: function(data) {

                    }
                });
            })
        });
    </script>
@endpush
