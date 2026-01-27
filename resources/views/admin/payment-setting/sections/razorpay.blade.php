<div class="tab-pane fade {{ Session::has('payment_gateway_list_style') && Session::get('payment_gateway_list_style') == 'section_three' ? 'show active' : '' }}"
    id="razorpay-setting" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="card-body border">
            <form action="{{ route('admin.razorpay-setting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Razorpay Status</label>
                    <select name="razorpay_status"
                        class="select3 form-control @error('razorpay_status') is-invalid @enderror">
                        <option @selected(@$paymentGateway['razorpay_status'] == 1) value="1">Active</option>
                        <option @selected(@$paymentGateway['razorpay_status'] == 0) value="0">Inactive</option>
                    </select>
                    @error('razorpay_status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Razorpay Country Name <span class="text-danger">*</span></label>
                    <select name="razorpay_country"
                        class="select3 form-control @error('razorpay_country') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach (config('country_list') as $key => $country)
                            <option @selected(@$paymentGateway['razorpay_country'] === $key) value="{{ $key }}">{{ $country }}
                            </option>
                        @endforeach
                    </select>
                    @error('razorpay_country')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Razorpay Currency <span class="text-danger">*</span></label>
                    <select name="razorpay_currency"
                        class="select3 form-control @error('razorpay_currency') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach (config('currencys.currency_list') as $currency)
                            <option @selected(@$paymentGateway['razorpay_currency'] === $currency) value="{{ $currency }}">{{ $currency }}
                            </option>
                        @endforeach
                    </select>
                    @error('razorpay_currency')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Currency Rate ( Per {{ config('settings.site_default_currency') }} ) <span
                            class="text-danger">*</span></label>
                    <input name="razorpay_rate" type="text"
                        class="form-control @error('razorpay_rate') is-invalid @enderror"
                        value="{{ @$paymentGateway['razorpay_rate'] ?? old('razorpay_rate') }}">
                    @error('razorpay_rate')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Razorpay Key <span class="text-danger">*</span></label>
                    <input name="razorpay_api_key" type="text"
                        class="form-control @error('razorpay_api_key') is-invalid @enderror"
                        value="{{ @$paymentGateway['razorpay_api_key'] ?? old('razorpay_api_key') }}">
                    @error('razorpay_api_key')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Razorpay Secret Key <span class="text-danger">*</span></label>
                    <input name="razorpay_secret_key" type="text"
                        class="form-control @error('razorpay_secret_key') is-invalid @enderror"
                        value="{{ @$paymentGateway['razorpay_secret_key'] ?? old('razorpay_secret_key') }}">
                    @error('razorpay_secret_key')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Razorpay Logo</label>
                    <div id="image-preview-3" class="image-preview razorpay-preview">
                        <label for="image-upload-3" id="image-label-3">Choose File</label>
                        <input type="file" name="razorpay_logo" id="image-upload-3" />
                        <input type="hidden" name="old_razorpay_logo_image"
                            value="{{ @$paymentGateway['razorpay_logo'] }}">
                    </div>
                    @error('razorpay_logo')
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
            $('.razorpay-preview').css({
                'background-image': 'url({{ asset(@$paymentGateway['razorpay_logo']) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })

            if (jQuery().select2) {
                $(".select3").select2();
            }

            $.uploadPreview({
                input_field: "#image-upload-3", // Default: .image-upload
                preview_box: "#image-preview-3", // Default: .image-preview
                label_field: "#image-label-3", // Default: .image-label
                label_default: "Choose File", // Default: Choose File
                label_selected: "Change File", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });
        })
    </script>
@endpush
