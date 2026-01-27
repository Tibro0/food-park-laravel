<div class="tab-pane fade {{ Session::has('payment_gateway_list_style') && Session::get('payment_gateway_list_style') == 'section_two' ? 'show active' : '' }}" id="stripe-setting" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="card-body border">
            <form action="{{ route('admin.stripe-setting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Stripe Status</label>
                    <select name="stripe_status"
                        class="select3 form-control @error('stripe_status') is-invalid @enderror">
                        <option @selected(@$paymentGateway['stripe_status'] == 1) value="1">Active</option>
                        <option @selected(@$paymentGateway['stripe_status'] == 0) value="0">Inactive</option>
                    </select>
                    @error('stripe_status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Stripe Country Name <span class="text-danger">*</span></label>
                    <select name="stripe_country"
                        class="select3 form-control @error('stripe_country') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach (config('country_list') as $key => $country)
                            <option @selected(@$paymentGateway['stripe_country'] === $key) value="{{ $key }}">{{ $country }}
                            </option>
                        @endforeach
                    </select>
                    @error('stripe_country')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Stripe Currency <span class="text-danger">*</span></label>
                    <select name="stripe_currency"
                        class="select3 form-control @error('stripe_currency') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach (config('currencys.currency_list') as $currency)
                            <option @selected(@$paymentGateway['stripe_currency'] === $currency) value="{{ $currency }}">{{ $currency }}
                            </option>
                        @endforeach
                    </select>
                    @error('stripe_currency')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Currency Rate ( Per {{ config('settings.site_default_currency') }} ) <span class="text-danger">*</span></label>
                    <input name="stripe_rate" type="text"
                        class="form-control @error('stripe_rate') is-invalid @enderror"
                        value="{{ @$paymentGateway['stripe_rate'] ?? old('stripe_rate') }}">
                    @error('stripe_rate')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Stripe Key <span class="text-danger">*</span></label>
                    <input name="stripe_api_key" type="text"
                        class="form-control @error('stripe_api_key') is-invalid @enderror"
                        value="{{ @$paymentGateway['stripe_api_key'] ?? old('stripe_api_key') }}">
                    @error('stripe_api_key')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Stripe Secret Key <span class="text-danger">*</span></label>
                    <input name="stripe_secret_key" type="text"
                        class="form-control @error('stripe_secret_key') is-invalid @enderror"
                        value="{{ @$paymentGateway['stripe_secret_key'] ?? old('stripe_secret_key') }}">
                    @error('stripe_secret_key')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Stripe Logo</label>
                    <div id="image-preview-2" class="image-preview stripe-preview">
                        <label for="image-upload-2" id="image-label-2">Choose File</label>
                        <input type="file" name="stripe_logo" id="image-upload-2" />
                        <input type="hidden" name="old_stripe_logo_image"
                            value="{{ @$paymentGateway['stripe_logo'] }}">
                    </div>
                    @error('stripe_logo')
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
            $('.stripe-preview').css({
                'background-image': 'url({{ asset(@$paymentGateway['stripe_logo']) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })

            if (jQuery().select2) {
                $(".select3").select2();
            }

            $.uploadPreview({
                input_field: "#image-upload-2", // Default: .image-upload
                preview_box: "#image-preview-2", // Default: .image-preview
                label_field: "#image-label-2", // Default: .image-label
                label_default: "Choose File", // Default: Choose File
                label_selected: "Change File", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });
        })
    </script>
@endpush
