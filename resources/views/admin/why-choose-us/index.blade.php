@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Why Choose Us</title>
    <!-- dataTables css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dataTables-bootstrap4.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Why Choose Us</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="accordion">
                    <div class="accordion">
                        <div class="accordion-header collapsed bg-primary text-light p-3 " role="button"
                            data-toggle="collapse" data-target="#panel-body-1" aria-expanded="false">
                            <h4>Why Choose Us Section Titles..</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion">
                            <form action="{{ route('admin.why-choose-title.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Top Title</label>
                                    <input type="text" class="form-control" name="why_choose_top_title"
                                        value="{{ @$titles['why_choose_top_title'] }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Main Title</label>
                                    <input type="text" class="form-control" name="why_choose_main_title"
                                        value="{{ @$titles['why_choose_main_title'] }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Sub Title</label>
                                    <input type="text" class="form-control" name="why_choose_sub_title"
                                        value="{{ @$titles['why_choose_sub_title'] }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Items</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.why-choose-us.create') }}" class="btn btn-primary">
                        Create new
                    </a>
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
@endpush
