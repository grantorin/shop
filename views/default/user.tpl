<h2 class="h4 text-center">Ваши регистрационные данные</h2>
<div id="userData">
    <div class="row mb-2">
        <div class="col-md-6 col-lg-8">Логин (email)</div>
        <div class="col-md-6 col-lg-4">{$arUser['email']}</div>
    </div>
    <!-- /.row -->
    <div class="row mb-2">
        <div class="col-md-6 col-lg-8">Имя</div>
        <div class="col-md-6 col-lg-4"><input type="text" name="name" class="form-control" value="{$arUser['name']}"></div>
    </div>
    <!-- /.row -->
    <div class="row mb-2">
        <div class="col-md-6 col-lg-8">Тел</div>
        <div class="col-md-6 col-lg-4"><input type="tel" name="phone" class="form-control" value="{$arUser['phone']}"></div>
    </div>
    <!-- /.row -->
    <div class="row mb-2">
        <div class="col-md-6 col-lg-8">Адресc</div>
        <div class="col-md-6 col-lg-4"><textarea name="address" class="form-control">{$arUser['adress']}</textarea></div>
    </div>
    <!-- /.row -->
    <div class="row mb-2">
        <div class="col-md-6 col-lg-8">Новый пароль</div>
        <div class="col-md-6 col-lg-4"><input type="password" name="pwd1" class="form-control"></div>
    </div>
    <!-- /.row -->
    <div class="row mb-2">
        <div class="col-md-6 col-lg-8">Повтор пароля</div>
        <div class="col-md-6 col-lg-4"><input type="password" name="pwd2" class="form-control"></div>
    </div>
    <!-- /.row -->
    <div class="row mb-2">
        <div class="col-md-6 col-lg-8">Текущий пароль</div>
        <div class="col-md-6 col-lg-4"><input type="password" name="curPwd" class="form-control"></div>
    </div>
    <!-- /.row -->
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary" id="btnUpdate">Update</button>
    </div>
</div>