<?php require_once 'templates/admin/header_crud.php' ?>
<br>
<h2 class="text-center">Добавить нового пользователя</h2>

<form action="admin.php" method="post" id="user-create-form">
    <div class="container">
        <div class="form-group">
            <label>Имя пользователя</label>
            <input type="text" class="form-control" name="user_name">
        </div>

        <div class="form-group">
            <label>E-mail</label>
            <input type="email" class="form-control" name="user_email">
        </div>

        <div class="form-group">
            <label>Пароль</label>
            <input type="password" class="form-control" name="user_password">
        </div><br>

        <input type="hidden" name="dispatch" value="user_create">
        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Добавить">
    </div>
</form>
