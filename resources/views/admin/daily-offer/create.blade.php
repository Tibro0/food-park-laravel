@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Create Daily Offer</title>
    <!-- select2 css-->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/select2/dist/css/select2.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Create Daily Offer</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Daily Offer</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.daily-offer.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Product</label>
                        <select name="product" class="form-control" id="product_search">
                            <option value="">Select</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('admin-js')
    <!--select2 JS -->
    <script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#product_search').select2({
                ajax: {
                    url: '{{ route('admin.daily-offer.search-product') }}',
                    data: function(params) {
                        var query = {
                            search: params.term,
                            type: 'public'
                        }

                        // Query parameters will be ?search=[term]&type=public
                        return query;
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(product) {
                                return {
                                    text: product.name,
                                    id: product.id,
                                    image_url: product.thumb_image
                                }
                            })
                        }
                    }
                },
                minimumInputLength: 3,
                templateResult: formatProduct,
                escapeMarkup: function(m) {
                    return m;
                }

            });

            function formatProduct(product) {
                var product = $('<span><img src="http://127.0.0.1:8000/' + product.image_url +
                    '" class="img-thumbnail" width="50" >  ' +
                    product.text + '</span>');
                return product;
            }
        })
    </script>
@endpush
