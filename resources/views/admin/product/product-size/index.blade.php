@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Product Variants</title>
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Products Variants ({{ $product->name }})</h1>
        </div>
        <div>
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary my-3">Go Back</a>
        </div>
        <div class="row">
            <!-- Product Size -->
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Create Product Size</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product-size.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror">
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price <span class="text-danger">*</span></label>
                                        <input type="text" name="price"
                                            class="form-control @error('price') is-invalid @enderror">
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="card card-primary">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sizes as $size)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $size->name }}</td>
                                        <td>{{ currencyPosition($size->price) }}</td>
                                        <td>
                                            <a href="{{ route('admin.product-size.destroy', $size->id) }}""
                                                class="btn btn-danger mx-2" id="delete"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                @if (count($sizes) === 0)
                                    <tr>
                                        <td colspan='4' class="text-center bg-primary text-white">No Data Found!
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Product Options -->
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Create Product Options</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product-option.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror">
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price <span class="text-danger">*</span></label>
                                        <input type="text" name="price"
                                            class="form-control @error('price') is-invalid @enderror">
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="card card-primary">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($options as $option)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $option->name }}</td>
                                        <td>{{ currencyPosition($option->price) }}</td>
                                        <td>
                                            <a href="{{ route('admin.product-option.destroy', $option->id) }}""
                                                class="btn btn-danger mx-2" id="delete"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                @if (count($options) === 0)
                                    <tr>
                                        <td colspan='4' class="text-center bg-primary text-white">No Data Found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('admin-js')
    <!-- delete alert -->
    <script src="{{ asset('admin/assets/js/sweetalert2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('body').on('click', '#delete', function(event) {
                event.preventDefault();
                let deleteUrl = $(this).attr('href');
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
                            type: 'DELETE',
                            url: deleteUrl,
                            success: function(data) {
                                if (data.status == 'success') {
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    )
                                    window.location.reload();
                                } else if (data.status == 'error') {
                                    Swal.fire(
                                        'Cant Delete',
                                        data.message,
                                        'error'
                                    )
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        })
                    }
                })
            })
        })
    </script>
@endpush
