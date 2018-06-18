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
                }
            }
        })
    })



});
