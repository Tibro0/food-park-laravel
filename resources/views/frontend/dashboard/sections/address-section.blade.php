<div class="tab-pane fade {{ Session::has('user_dashboard_list_style') && Session::get('user_dashboard_list_style') == 'section_two' ? 'show active' : '' }}" id="v-pills-address" role="tabpanel" aria-labelledby="v-pills-address-tab">
    <div class="fp_dashboard_body address_body">
        <h3>address <a class="dash_add_new_address"><i class="far fa-plus"></i> add new
            </a>
        </h3>
        <div class="fp_dashboard_address">
            <!-- Show User Address Start -->
            <div class="fp_dashboard_existing_address">
                <div class="row">
                    @foreach ($userAddresses as $address)
                        <div class="col-md-6">
                            <div class="fp__checkout_single_address">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <span class="icon">
                                            @if ($address->type === 'home')
                                                <i class="fas fa-home"></i>
                                            @elseif($address->type === 'office')
                                                <i class="far fa-car-building"></i>
                                            @endif
                                            {{ $address->type }}
                                        </span>
                                        <span class="address">{{ $address->address }},
                                            {{ $address->deliveryArea?->area_name }} </span>
                                    </label>
                                </div>
                                <ul>
                                    <li><a class="dash_edit_btn show_edit_section"
                                            data-class="edit_section_{{ $address->id }}"><i
                                                class="far fa-edit"></i></a></li>
                                    <li><a href="{{ route('address.destroy', $address->id) }}" class="dash_del_icon"
                                            id="delete"><i class="fas fa-trash-alt"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Show User Address End -->
            <!-- Add User Address Start -->
            <div class="fp_dashboard_new_address ">
                <form action="{{ route('address.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <h4>add new address</h4>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="fp__check_single_form">
                                <select class="nice-select" name="area">
                                    <option value="">Select Area</option>
                                    @foreach ($deliveryAreas as $area)
                                        <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" placeholder="First Name" name="first_name">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" placeholder="Last Name" name="last_name">
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" placeholder="Phone" name="phone">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" placeholder="Email" name="email">
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="fp__check_single_form">
                                <textarea cols="3" rows="4" placeholder="Address" name="address"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="fp__check_single_form check_area">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1"
                                        value="home">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        home
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2"
                                        value="office">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        office
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" class="common_btn cancel_new_address">cancel</button>
                            <button type="submit" class="common_btn">save
                                address</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Add User Address End -->
            <!-- Edit User Address Start -->
            @foreach ($userAddresses as $address)
                <div class="fp_dashboard_edit_address edit_section_{{ $address->id }}">
                    <form action="{{ route('address.update', $address->id) }}" method="Post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <h4>Edit Address</h4>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="fp__check_single_form">
                                    <select class="nice-select" name="area">
                                        <option value="">Select Area</option>
                                        @foreach ($deliveryAreas as $area)
                                            <option @selected($address->delivery_area_id === $area->id) value="{{ $area->id }}">
                                                {{ $area->area_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="fp__check_single_form">
                                    <input type="text" placeholder="First Name" name="first_name"
                                        value="{{ $address->first_name }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="fp__check_single_form">
                                    <input type="text" placeholder="Last Name" name="last_name"
                                        value="{{ $address->last_name }}">
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="fp__check_single_form">
                                    <input type="text" placeholder="Phone" name="phone"
                                        value="{{ $address->phone }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="fp__check_single_form">
                                    <input type="text" placeholder="Email" name="email"
                                        value="{{ $address->email }}">
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="fp__check_single_form">
                                    <textarea cols="3" rows="4" placeholder="Address" name="address">{!! $address->address !!}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="fp__check_single_form check_area">
                                    <div class="form-check">
                                        <input @checked($address->type === 'home') class="form-check-input" type="radio"
                                            name="type" id="flexRadioDefault1" value="home">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            home
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input @checked($address->type === 'office') class="form-check-input" type="radio"
                                            name="type" id="flexRadioDefault2" value="office">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            office
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="button" class="common_btn cancel_edit_address">cancel</button>
                                <button type="submit" class="common_btn">save
                                    address</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
            <!-- Edit User Address End -->
        </div>
    </div>
</div>

@push('frontend-js')
    <script>
        $(document).ready(function() {
            $('.show_edit_section').on('click', function() {
                let className = $(this).data('class');
                $('.fp_dashboard_edit_address').removeClass('d-block');
                $('.fp_dashboard_edit_address').removeClass('d-none');
                $('.fp_dashboard_existing_address').addClass('d-none');
                $('.' + className).addClass('d-block');
            })

            $('.cancel_edit_address').on('click', function() {
                $('.fp_dashboard_edit_address').addClass('d-none');
                $('.fp_dashboard_existing_address').removeClass('d-none');
            })
        })
    </script>
    <!-- delete alert -->
    <script src="{{ asset('admin/assets/js/sweetalert2.js') }}"></script>
    <script>
        /** Show sweet alert confirem message **/
        $(document).ready(function() {
            $('body').on('click', '#delete', function(e) {
                e.preventDefault()
                let url = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                if (response.status === 'success') {
                                    toastr.success(response.message)

                                    window.location.reload();

                                } else if (response.status === 'error') {
                                    toastr.error(response.message)
                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        })
                    }
                })
            })
        })
    </script>
@endpush
