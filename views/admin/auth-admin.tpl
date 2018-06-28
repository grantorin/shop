<!doctype html>
<html lang="ru">
<head>
    {* Required meta tags *}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {*https://google.github.io/material-design-icons/#icon-font-for-the-web*}
    {*https://material.io/tools/icons/?search=info&icon=shopping_cart&style=baseline*}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {* Bootstrap CSS *}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="{$templateWebPath}css/admin.css">

    <title>{$titlePage}</title>
</head>
<body>
<div class="container-fluid h-100">

    <main class="main d-flex h-100 justify-content-center align-items-center">

        <!-- User auth -->
        <form method="post" action="/admin/login/" class="border p-3 my-3 bg-light" style="max-width: 300px">
            <h6>Авторизация</h6>
            <label class="sr-only" for="useremailAuth">E-mail</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 612 612"><path d="M573.75 57.375H38.25C17.136 57.375 0 74.511 0 95.625v420.75c0 21.133 17.136 38.25 38.25 38.25h535.5c21.133 0 38.25-17.117 38.25-38.25V95.625c0-21.114-17.117-38.25-38.25-38.25zM554.625 497.25H57.375V204.657l224.03 187.999c7.134 5.967 15.874 8.97 24.595 8.97 8.74 0 17.461-3.003 24.595-8.97l224.03-187.999V497.25zm0-367.487L306 338.379 57.375 129.763V114.75h497.25v15.013z"/></svg></div>
                </div>
                <input type="email" name="email" class="form-control" id="useremailAuth" placeholder="E-mail*" required>
            </div>
            <label class="sr-only" for="pwd">Password</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 516 516"><path d="M353.812 0C263.925 0 191.25 72.675 191.25 162.562c0 19.125 3.825 38.25 9.562 57.375L0 420.75v95.625h95.625V459H153v-57.375h57.375l86.062-86.062c17.213 5.737 36.338 9.562 57.375 9.562 89.888 0 162.562-72.675 162.562-162.562S443.7 0 353.812 0zm47.813 172.125c-32.513 0-57.375-24.862-57.375-57.375s24.862-57.375 57.375-57.375S459 82.237 459 114.75s-24.862 57.375-57.375 57.375z"/></svg></div>
                </div>
                <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Password*" required>
            </div>

            <div class="d-flex justify-content-end">
                <button id="btnAuth" type="submit" class="btn btn-primary mb-2">Login</button>
            </div>
        </form>

    </main>

</div>
{*/.container-fluid*}

{* Optional JavaScript *}
{* jQuery first, then Popper.js, then Bootstrap JS *}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
{*<script>*}
    {*/***}
     {** Auth User*}
     {**/*}
    {*$('#btnAuth').on('click', function() {*}
        {*var postData = {};*}
        {*postData.email = $('#useremailAuth').val();*}
        {*postData.pwd = $('#pwd').val();*}
        {*console.log(postData);*}
        {*$.ajax({*}
            {*type: 'POST',*}
            {*url: '/user/login/',*}
            {*dataType: 'json',*}
            {*data: postData,*}
            {*success: function (data) {*}
                {*console.log(data); // TODO remove to deployment*}
                {*if (data['success']) {*}

                    {*$('#authBox').hide();*}
                    {*$('#userName').html(data['displayName']);*}
                    {*$('#userBox, #userData, #shippingBoxOrder, .btnOrderBox').show();*}

                    {*$('[name=name]').val(data['name']);*}
                    {*$('[name=phone]').val(data['phone']);*}
                    {*$('[name=address]').val(data['address']);*}
                {*} else {*}
                    {*alert(data['message']); // TODO replace to modal deployment*}
                {*}*}
            {*},*}
            {*// TODO remove to deployment*}
            {*error: function (jqXHR, textStatus, errorThrown) {*}
                {*console.log(jqXHR, textStatus, errorThrown);*}
                {*$('.main').after(jqXHR.responseText);*}
            {*}*}
        {*})*}
    {*});*}
{*</script>*}
</body>
</html>