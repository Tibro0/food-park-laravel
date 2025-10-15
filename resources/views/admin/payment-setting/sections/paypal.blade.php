<div class="tab-pane fade show active" id="paypal-setting" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="card-body border">
            <form action="{{ route('admin.paypal-setting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Paypal Status</label>
                    <select name="paypal_status"
                        class="select2 form-control @error('paypal_status') is-invalid @enderror">
                        <option @selected(@$paymentGateway['paypal_status'] == 1) value="1">Active</option>
                        <option @selected(@$paymentGateway['paypal_status'] == 0) value="0">Inactive</option>
                    </select>
                    @error('paypal_status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Paypal Account Mode</label>
                    <select name="paypal_account_mode"
                        class="select2 form-control @error('paypal_account_mode') is-invalid @enderror">
                        <option @selected(@$paymentGateway['paypal_account_mode'] === 'sandbox') value="sandbox">Sandbox</option>
                        <option @selected(@$paymentGateway['paypal_account_mode'] === 'live') value="live">Live</option>
                    </select>
                    @error('paypal_account_mode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Paypal Country Name <span class="text-danger">*</span></label>
                    <select name="paypal_country"
                        class="select2 form-control @error('paypal_country') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach (config('country_list') as $key => $country)
                            <option @selected(@$paymentGateway['paypal_country'] === $key) value="{{ $key }}">{{ $country }}
                            </option>
                        @endforeach
                    </select>
                    @error('paypal_country')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Paypal Currency Name <span class="text-danger">*</span></label>
                    <select name="paypal_currency"
                        class="select2 form-control @error('paypal_currency') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach (config('currencys.currency_list') as $currency)
                            <option @selected(@$paymentGateway['paypal_currency'] === $currency) value="{{ $currency }}">{{ $currency }}
                            </option>
                        @endforeach
                    </select>
                    @error('paypal_currency')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Currency Rate ( Per {{ config('settings.site_default_currency') }} ) <span class="text-danger">*</span></label>
                    <input name="paypal_rate" type="text"
                        class="form-control @error('paypal_rate') is-invalid @enderror"
                        value="{{ @$paymentGateway['paypal_rate'] }}">
                    @error('paypal_rate')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Paypal Client Id <span class="text-danger">*</span></label>
                    <input name="paypal_api_key" type="text"
                        class="form-control @error('paypal_api_key') is-invalid @enderror"
                        value="{{ @$paymentGateway['paypal_api_key'] }}">
                    @error('paypal_api_key')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Paypal Secret Key <span class="text-danger">*</span></label>
                    <input name="paypal_secret_key" type="text"
                        class="form-control @error('paypal_secret_key') is-invalid @enderror"
                        value="{{ @$paymentGateway['paypal_secret_key'] }}">
                    @error('paypal_secret_key')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Paypal App Id <span class="text-danger">*</span></label>
                    <input name="paypal_app_id" type="text"
                        class="form-control @error('paypal_app_id') is-invalid @enderror"
                        value="{{ @$paymentGateway['paypal_app_id'] }}">
                    @error('paypal_app_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Paypal Logo</label>
                    <div id="image-preview" class="image-preview paypal-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="paypal_logo" id="image-upload" />
                        <input type="hidden" name="old_paypal_logo_image"
                            value="{{ @$paymentGateway['paypal_logo'] }}">
                    </div>
                    @error('paypal_logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

@push('admin-js')
    <script>
        $(document).ready(function() {
            $('.paypal-preview').css({
                'background-image': 'url({{ asset(@$paymentGateway['paypal_logo']) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
@endpush
