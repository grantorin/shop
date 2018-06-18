jQuery(function ($) {

    /**
     * Add to cart products item
     */
    $('.btnAddCart').on('click', function () {
        var prodID = $(this).data('product');
        if(!prodID) return;

        console.log('js - addToCart()');

        $.ajax({
            type: 'POST',
            url: '/cart/addtocart/' + prodID + '/',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if (data['success']) {
                    $('#cartCntItems').html(data['cntItems']);

                    $('#btnAddCart_' + prodID).hide();
                    $('#removeCart_' + prodID).show();
                }
            }
        })
    });

    /**
     * Remove from cart products item
     */
    $('.btnRemoveCart').on('click', function () {
        var prodID = $(this).data('product');
        if(!prodID) return;

        console.log('js - removeFromCart()');

        $.ajax({
            type: 'POST',
            url: '/cart/removefromcart/' + prodID + '/',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if (data['success']) {
                    $('#cartCntItems').html(data['cntItems']);

                    $('#btnAddCart_' + prodID).show();
                    $('#removeCart_' + prodID).hide();
                    $('#rowProduct_' + prodID).remove();
                }
            }
        })
    });

    /**
     * Calculate price item product
     */
    $('.js-conversionPrice').on('change', function () {
        var sum = +$(this).val() || 1;
        var price = +$(this).data('price');
        $('#itemPrice_' + $(this).data('prodid')).html(sum * price);
    });

});
