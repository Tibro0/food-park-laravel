@push('admin-css')
    <!-- colorpicker Css link -->
    <link rel="stylesheet"
        href="{{ asset('admin/assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
@endpush
<div class="tab-pane fade {{ Session::has('setting_list_style') && Session::get('setting_list_style') == 'section_three' ? 'show active' : '' }}" id="appearance-setting" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="card-body border">
            <form action="{{ route('admin.appearance-setting.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Site Color <span class="text-danger">*</span></label>
                                <input type="text" class="form-control colorpickerinput @error('site_color') is-invalid @enderror" name="site_color"
                                    value="{{ config('settings.site_color') }}">
                                @error('site_color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

@push('admin-js')
    <!-- colorpicker Js link -->
    <script src="{{ asset('admin/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script>
        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });
    </script>
@endpush
