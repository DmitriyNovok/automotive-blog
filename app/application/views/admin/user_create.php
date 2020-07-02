<?php require_once 'templates/Admin/header_crud.php' ?>
<br>
<h2 class="text-center">Добавить нового пользователя</h2>

<form action="admin.php" method="post" id="user-create-form">
    <div class="container">
        <div class="form-group">
            <label for="user_name">Имя пользователя</label>
            <input id="user_name" type="text" class="form-control" name="user_name">
        </div>

        <div class="form-group">
            <label for="user_email">E-mail</label>
            <input id="user_email" type="email" class="form-control" name="user_email">
        </div>

        <div class="form-group">
            <label for="pass">Пароль</label>
            <input id="pass" type="password" class="form-control" name="user_password">
        </div><br>

        <input type="hidden" name="dispatch" value="user_create">
        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Добавить">
    </div>
</form>
