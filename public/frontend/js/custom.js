$(document).ready(function() {

    loadcart();
    loadwishlist()

    function loadcart()
    {
        $.ajax({
            method: "GET",
            url: "/load-cart-data",
            success: function(response){
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
                
            }
        });
    }

    function loadwishlist()
    {
        $.ajax({
            method: "GET",
            url: "/load-wishlist-count",
            success: function(response){
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
                
            }
        });
    }

    $('.addToCartBtn').click(function(e) {
        e.preventDefault();

        var service_id = $(this).closest('.service_data').find('.servc_id').val();
        var service_qty = $(this).closest('.service_data').find('.qty-input').val();
        var checkin_date = $(this).closest('.service_data').find('.checkin_date').val();
        var checkout_date = $(this).closest('.service_data').find('.checkout_date').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'service_id': service_id,
                'service_qty': service_qty,
                'checkin_date': checkin_date,
                'checkout_date': checkout_date,
            },
            success: function(response) {
                swal("",response.status, "success");
                loadcart()
            }
        });
    });

    $('.addToWishlist').click(function(e) {
        e.preventDefault();

        var service_id = $(this).closest('.service_data').find('.servc_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'service_id': service_id,
            },
            success: function(response) {
                swal("",response.status, "success");
                loadwishlist();
            }
        });
    });

    $(document).on('click','.increment-btn', function(e) {
        e.preventDefault();


        var inc_value = $(this).closest('.service_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.service_data').find('.qty-input').val(value);
        }
    });

    
    $(document).on('click','.decrement-btn', function(e) {
        e.preventDefault();

        var dec_value = $(this).closest('.service_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.service_data').find('.qty-input').val(value);
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(document).on('click','.delete-cart-item', function(e) {
           e.preventDefault();


           var servc_id = $(this).closest('.service_data').find('.servc_id').val();
           $.ajax({
               method: "POST",
               url: "delete-cart-item",
               data: {
                   'servc_id': servc_id,
               },
               success: function(response){
                   //window.location.reload(),
                   loadcart();
                   $('.cartitems').load(location.href + " .cartitems"); 
                   swal("", response.status, "success");
               }
           });
    });

    $(document).on('click','.remove-wishlist-item', function(e) {
        e.preventDefault();


        var servc_id = $(this).closest('.service_data').find('.servc_id').val();
        $.ajax({
            method: "POST",
            url: "delete-wishlist-item",
            data: {
                'servc_id': servc_id,
            },
            success: function(response){
                //window.location.reload(),
                loadwishlist()
                $('.wishlistitems').load(location.href + " .wishlistitems");
                swal("", response.status, "success");
            }
        });
 });
    
    $(document).on('click','.changeQuantity', function(e) {
        e.preventDefault();

        var servc_id = $(this).closest('.service_data').find('.servc_id').val();
        var qty = $(this).closest('.service_data').find('.qty-input').val();
        data = {
            'servc_id' : servc_id,
            'servc_qty' : qty,
        }
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function(response){
                $('.cartitems').load(location.href + " .cartitems");
                //window.location.reload();
                
            }
        });
    });

    $(document).on('click','.delete-order-item', function(e) {
        e.preventDefault();


        var id = $(this).closest('.service_data').find('.id').val();
        $.ajax({
            method: "POST",
            url: "delete-order-item",
            data: {
                'id': id,
            },
            success: function(response){
                //window.location.reload(),
                loadcart();
                $('.orderitems').load(location.href + " .orderitems"); 
                swal("", response.status, "success");
            }
        });
 });
});