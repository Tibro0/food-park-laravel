<div class="tab-pane fade {{ Session::has('setting_list_style') && Session::get('setting_list_style') == 'section_one' ? 'show active' : '' }} {{ !Session::has('setting_list_style') ? 'show active' : '' }}" id="general-setting" role="tabpanel" aria-labelledby="general-setting">
    <div class="card">
        <div class="card-body border">
            <form action="{{ route('admin.general-setting.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Site Name <span class="text-danger">*</span></label>
                    <input name="site_name" value="{{ config('settings.site_name') }}" type="text"
                        class="form-control @error('site_name') is-invalid @enderror">
                    @error('site_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Site Email</label>
                            <input name="site_email" type="text"
                                class="form-control @error('site_email') is-invalid @enderror"
                                value="{{ config('settings.site_email') }}">
                            @error('site_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Site Phone</label>
                            <input name="site_phone" type="text"
                                class="form-control @error('site_phone') is-invalid @enderror"
                                value="{{ config('settings.site_phone') }}">
                            @error('site_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Default Currency <span class="text-danger">*</span></label>
                    <select name="site_default_currency"
                        class="select2 form-control @error('site_default_currency') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach (config('currencys.currency_list') as $currency)
                            <option @selected(config('settings.site_default_currency') === $currency) value="{{ $currency }}">{{ $currency }}
                            </option>
                        @endforeach
                    </select>
                    @error('site_default_currency')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Currency Icon <span class="text-danger">*</span></label>
                            <input name="site_currency_icon" value="{{ config('settings.site_currency_icon') }}"
                                type="text" class="form-control @error('site_currency_icon') is-invalid @enderror">
                            @error('site_currency_icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Currency Icon Position</label>
                            <select name="site_currency_icon_position"
                                class="select2 form-control @error('site_currency_icon_position') is-invalid @enderror">
                                <option @selected(config('settings.site_currency_icon_position') === 'right') value="right">Right</option>
                                <option @selected(config('settings.site_currency_icon_position') === 'left') value="left">Left</option>
                            </select>
                            @error('site_currency_icon_position')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
