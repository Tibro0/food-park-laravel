@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Product Review</title>
    <!-- dataTables css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dataTables-bootstrap4.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Product Review</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Product Reviews</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">Create new</a>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
@endsection

@push('admin-js')
    <!-- dataTables js -->
    <script src="{{ asset('admin/assets/js/jquery-dataTables.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dataTables-bootstrap4.js') }}"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
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
    <!-- Review Status Change -->
    <script>
        $(document).ready(function() {
            $('body').on('change', '.review_status', function() {
                let status = $(this).val();
                let id = $(this).data('id');
                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.product-reviews.update') }}',
                    data: {
                        _token: "{{ csrf_token() }}",
                        status: status,
                        id: id
                    },
                    success: function(response) {
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {

                    }
                })
            })
        })
    </script>
@endpush
