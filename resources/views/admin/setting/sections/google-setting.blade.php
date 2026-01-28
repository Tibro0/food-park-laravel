<div class="tab-pane fade {{ Session::has('setting_list_style') && Session::get('setting_list_style') == 'section_seven' ? 'show active' : '' }}"
    id="google-setting" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="card-body border">
            <form action="{{ route('admin.google-setting.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Google Client ID <span class="text-danger">*</span></label>
                    <input name="google_client_id" type="text"
                        class="form-control @error('google_client_id') is-invalid @enderror"
                        value="{{ config('settings.google_client_id') }}">
                    @error('google_client_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Google Client Secret <span class="text-danger">*</span></label>
                    <input name="google_client_secret" type="text"
                        class="form-control @error('google_client_secret') is-invalid @enderror"
                        value="{{ config('settings.google_client_secret') }}">
                    @error('google_client_secret')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Google Redirect Url <span class="text-danger">*</span></label>
                    <input name="google_redirect_url" type="text"
                        class="form-control @error('google_redirect_url') is-invalid @enderror"
                        value="{{ config('settings.google_redirect_url') }}">
                    @error('google_redirect_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
            </form>
        </div>
    </div>
</div>
