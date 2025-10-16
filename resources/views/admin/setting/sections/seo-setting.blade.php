@push('admin-css')
    <!-- tagsinput Css Link -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush
<div class="tab-pane fade show" id="seo-setting" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="card-body border">
            <form action="{{ route('admin.seo-setting.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Seo Title <span class="text-danger">*</span></label>
                    <input name="seo_title" type="text" class="form-control @error('seo_title') is-invalid @enderror"
                        value="{{ config('settings.seo_title') }}">
                    @error('seo_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Seo Description <span class="text-danger">*</span></label>
                    <textarea name="seo_description" class="form-control @error('seo_description') is-invalid @enderror">{{ config('settings.seo_description') }}</textarea>
                    @error('seo_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Seo Keywords</label>
                    <input type="text" name="seo_keywords"
                        class="form-control inputtags @error('seo_keywords') is-invalid @enderror"
                        value="{{ config('settings.seo_keywords') }}">
                    @error('seo_keywords')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

@push('admin-js')
    <!-- tagsinput Js Link -->
    <script src="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script>
        $(".inputtags").tagsinput('items');
    </script>
@endpush
