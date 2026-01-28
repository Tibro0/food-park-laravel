<div class="tab-pane fade {{ Session::has('setting_list_style') && Session::get('setting_list_style') == 'section_six' ? 'show active' : '' }}"
    id="github-setting" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="card-body border">
            <form action="{{ route('admin.github-setting.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Github Client ID <span class="text-danger">*</span></label>
                    <input name="github_client_id" type="text"
                        class="form-control @error('github_client_id') is-invalid @enderror"
                        value="{{ config('settings.github_client_id') }}">
                    @error('github_client_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Github Client Secret <span class="text-danger">*</span></label>
                    <input name="github_client_secret" type="text"
                        class="form-control @error('github_client_secret') is-invalid @enderror"
                        value="{{ config('settings.github_client_secret') }}">
                    @error('github_client_secret')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Github Redirect Url <span class="text-danger">*</span></label>
                    <input name="github_redirect_url" type="text"
                        class="form-control @error('github_redirect_url') is-invalid @enderror"
                        value="{{ config('settings.github_redirect_url') }}">
                    @error('github_redirect_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
            </form>
        </div>
    </div>
</div>
