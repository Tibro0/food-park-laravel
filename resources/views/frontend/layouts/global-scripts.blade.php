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

    /** Add to Wishlist **/
    function addToWishlist(productId) {
        $.ajax({
            method: 'GET',
            url: '{{ route('wishlist.store', ':productId') }}'.replace(':productId', productId),
            beforeSend: function() {
                showLoader()
            },
            success: function(response) {
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function(index, value) {
                    toastr.error(value);
                })
                hideLoader()
            },
            complete: function() {
                hideLoader()
            }
        })
    }

    /** Update sidebar cart**/
    function updateSidebarCart(callback = null) {
        $.ajax({
            method: 'GET',
            url: '{{ route('get-cart-products') }}',
            success: function(response) {
                $('.cart_contents').html(response);
                let cartTotal = $('#cart_total').val();
                let cartCount = $('#cart_product_count').val();
                $('.cart_subtotal').text("{{ currencyPosition(':cartTotal') }}".replace(':cartTotal',
                    cartTotal));
                $('.cart_count').text(cartCount);

                if (callback && typeof callback === 'function') {
                    callback();
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        })
    }

    /** Remove cart product from sidebar*/
    function removeProductFromSidebar($rowId) {
        $.ajax({
            method: 'GET',
            url: '{{ route('cart-product-remove', ':rowId') }}'.replace(':rowId', $rowId),
            beforeSend: function() {
                showLoader();
            },
            success: function(responce) {
                if (responce.status === 'success') {
                    updateSidebarCart(function() {
                        toastr.success(responce.message);
                        hideLoader();
                    })
                }
            },
            error: function(xhr, status, error) {
                let errorMessage = xhr.responseJSON.message;
                toastr.error(errorMessage);
            },

        })
    }

    /** get current cart total amount*/
    function getCartTotal() {
        return parseInt("{{ cartTotal() }}");
    }
</script>
