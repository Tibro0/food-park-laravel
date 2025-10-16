<div class="tab-pane fade show" id="mail-setting" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="card-body border">
            <form action="{{ route('admin.mail-setting.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Mail Driver <span class="text-danger">*</span></label>
                            <input name="mail_driver" type="text"
                                class="form-control @error('mail_driver') is-invalid @enderror"
                                value="{{ config('settings.mail_driver') }}">
                            @error('mail_driver')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Mail Host <span class="text-danger">*</span></label>
                            <input name="mail_host" type="text"
                                class="form-control @error('mail_host') is-invalid @enderror"
                                value="{{ config('settings.mail_host') }}">
                            @error('mail_host')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Mail Port <span class="text-danger">*</span></label>
                            <input name="mail_port" type="text"
                                class="form-control @error('mail_port') is-invalid @enderror"
                                value="{{ config('settings.mail_port') }}">
                            @error('mail_port')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mail Username <span class="text-danger">*</span></label>
                            <input name="mail_username" type="text"
                                class="form-control @error('mail_username') is-invalid @enderror"
                                value="{{ config('settings.mail_username') }}">
                            @error('mail_username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mail Password <span class="text-danger">*</span></label>
                            <input name="mail_password" type="text"
                                class="form-control @error('mail_password') is-invalid @enderror"
                                value="{{ config('settings.mail_password') }}">
                            @error('mail_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Mail Form Address <span class="text-danger">*</span></label>
                    <input name="mail_from_address" type="text" class="form-control"
                        value="{{ config('settings.mail_from_address') }}">
                </div>
                <div class="form-group">
                    <label>Mail Receive Address <span class="text-danger">*</span></label>
                    <input name="mail_receive_address" type="text" class="form-control"
                        value="{{ config('settings.mail_receive_address') }}">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
