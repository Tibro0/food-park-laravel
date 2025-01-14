<script>
    /** Show Loader*/
    function showLoader() {
        $('.overlay-container').removeClass('d-none');
        $('.overlay').addClass('active');
    }

    /** Hide Loader*/
    function hideLoader() {
        $('.overlay').removeClass('active');
        $('.overlay-container').addClass('d-none');
    }

    /** lode product model **/
    function loadProductModal(productId) {
        $.ajax({
            method: 'GET',
            url: '{{ route('load-product-modal', ':productId') }}'.replace(':productId', productId),
            beforeSend: function() {
                showLoader();
            },
            success: function(response) {
                $('.load_product_modal_body').html(response);
                $('#cartModal').modal('show');

            },
            error: function(xhr, status, error) {
                console.error(error);
            },
            complete: function() {
                hideLoader();
            }
        })
    }
</script>
