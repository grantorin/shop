jQuery(function ($) {

    /**
     * File uploader
     */
    $('.js-uploadFile').on('change', function() {
        var str = $(this).val(), name;

        (str.lastIndexOf('\\'))
            ? name = str.lastIndexOf('\\') + 1
            : name = str.lastIndexOf('/') + 1;

        // $(this).next('[name=image]').val(str.slice(name));
        $('[for=' + $(this).attr('id') + ']').text(str.slice(name));
    });

    /**
     * Get data form
     * @param obj_form
     * @return object
     */
    function getData(obj_form) {
        var hData = {};
        $('input, textarea, select, checkbox', obj_form).each(function () {
            if (this.name && this.name != '') {
                if (this.type === 'checkbox' && !this.checked) return;
                hData[this.name] = this.value;
                // console.log('hData[' + this.name + '] = ' + hData[this.name]); // TODO remove to deployment
            }
        });
        return hData;
    }


    /**
     * New Category Add
     */
    $('#btnNewCat').on('click', function() {
        var postData = getData('#catBox');
        console.log(postData);  // TODO remove to deployment
        $.ajax({
            type: 'POST',
            url: '/admin/addnewcat/',
            dataType: 'json',
            data: postData,
            success: function (data) {
                console.log(data); // TODO remove to deployment
                if (data['success']) {
                    alert(data['message']); // TODO replace to modal deployment

                    $('#cat').val('');
                } else {
                    alert(data['message']); // TODO replace to modal deployment
                }
            },
            // TODO remove to deployment
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);
                $('.main').after(jqXHR.responseText);
            }
        })
    });

    /**
     * New Product Add
     */
    $('#btnAddProduct').on('click', function(e) {
        e.preventDefault();
        var postData = new FormData($('#newProductBox').get(0));
        console.log(postData);  // TODO remove to deployment
        // return;
        $.ajax({
            type: 'POST',
            url: '/admin/addproduct/',
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            data: postData,
            success: function (data) {
                console.log(data); // TODO remove to deployment
                if (data['success']) {
                    alert(data['message']); // TODO replace to modal deployment
                        $('#newProdImage, ' +
                        '[name=newProdName],' +
                        '[name=newProdPrice],' +
                        '[name=newProdCatList],' +
                        '[name=newProdDescription]').val('');
                    location.reload();
                } else {
                    alert(data['message']); // TODO replace to modal deployment
                }
            },
            // TODO remove to deployment
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);
                $('.main').after(jqXHR.responseText);
            }
        })
    });

    /**
     * Update Product
     */
    $('.btnUpdateProduct').on('click', function() {
        var postData = getData('#prodBox_' + $(this).data('id'));
        var postData2 = getData('#prodBox_' + $(this).data('id') + ' + tr');
        for (var key in postData2) {
            postData[key] = postData2[key];
        }
        console.log(postData);  // TODO remove to deployment
        // return;
        $.ajax({
            type: 'POST',
            url: '/admin/updateproduct/',
            dataType: 'json',
            data: postData,
            success: function (data) {
                console.log(data); // TODO remove to deployment
                if (data['success']) {
                    alert(data['message']); // TODO replace to modal deployment

                    location.reload();
                } else {
                    alert(data['message']); // TODO replace to modal deployment
                }
            },
            // TODO remove to deployment
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);
                $('.main').after(jqXHR.responseText);
            }
        })
    });


    /**
     * New Category Add
     */
    $('.btnUpdateCat').on('click', function() {
        var thisID = $(this).data('item');
        var postData = getData('#catBox_' + thisID);
        postData.catID = thisID;
        console.log(postData);  // TODO remove to deployment

        $.ajax({
            type: 'POST',
            url: '/admin/updatecategory/',
            dataType: 'json',
            data: postData,
            success: function (data) {
                console.log(data); // TODO remove to deployment
                if (data['success']) {
                    alert(data['message']); // TODO replace to modal deployment

                    location.reload();
                } else {
                    alert(data['message']); // TODO replace to modal deployment
                }
            },
            // TODO remove to deployment
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);
                $('.main').after(jqXHR.responseText);
            }
        })
    });


    /**
     * Set Order status and date payment
     */
    $('.btnSetStatusDate').on('click', function() {
        var orderBox = $('#date_' + $(this).data('id'));
        var postData = getData('#date_' + $(this).data('id'));
        console.log(postData);  // TODO remove to deployment
        // return;
        $.ajax({
            type: 'POST',
            url: '/admin/setorderstatus/',
            dataType: 'json',
            data: postData,
            success: function (data) {
                console.log(data); // TODO remove to deployment
                if (data['success']) {
                    alert(data['message']); // TODO replace to modal deployment
                    $('.date-payment', orderBox).text(data['date-payment'] + ' 00:00:00');
                } else {
                    alert(data['message']); // TODO replace to modal deployment
                }
            },
            // TODO remove to deployment
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);
                $('.main').after(jqXHR.responseText);
            }
        })
    });


});