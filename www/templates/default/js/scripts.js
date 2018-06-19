jQuery(function ($) {

    /**
     * Add to cart products item
     */
    $('.btnAddCart').on('click', function () {
        var prodID = $(this).data('product');
        if(!prodID) return;

        console.log('js - addToCart()'); // TODO remove to deployment

        $.ajax({
            type: 'POST',
            url: '/cart/addtocart/' + prodID + '/',
            dataType: 'json',
            success: function (data) {
                console.log(data); // TODO remove to deployment
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

        console.log('js - removeFromCart()'); // TODO remove to deployment

        $.ajax({
            type: 'POST',
            url: '/cart/removefromcart/' + prodID + '/',
            dataType: 'json',
            success: function (data) {
                console.log(data); // TODO remove to deployment
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

    function getData(obj_form) {
        var hData = {};
        $('input, textarea, select', obj_form).each(function () {
            if (this.name && this.name != '') {
                hData[this.name] = this.value;
                console.log('hData[' + this.name + '] = ' + hData[this.name]); // TODO remove to deployment
            }
        });
        return hData;
    }

    /**
     * Register New User
     */
    $('#btnRegisterNewUser').on('click', function() {
        var postData = getData('#registerBox');

        $.ajax({
            type: 'POST',
            url: '/user/register/',
            dataType: 'json',
            data: postData,
            success: function (data) {
                console.log(data); // TODO remove to deployment
                if (data['success']) {
                   alert(data['message']);

                    $('#registerBox').hide();
                    // $('#personalBox').show();
                } else {
                    alert(data['message']);
                }
            },
            // TODO remove to deployment
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);
                $('.main').after(jqXHR.responseText);
            }
        })
    })

});
