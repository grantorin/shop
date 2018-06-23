jQuery(function ($) {

    /**
     * Get data form
     * @param obj_form
     * @return object
     */
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
                    // $('#userBox, .btnOrderBox').show();
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