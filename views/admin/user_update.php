<?php require_once 'templates/admin/header_crud.php';?>
<br>
<h2 class="text-center">Редактировать пользователя</h2>

<?php if (isset($user->name)) { ?>
    <form action="admin.php" method="post" id="user-update-form">
        <div class="container">
            <div class="form-group">
                <label>Имя пользователя</label>
                <input type="text" class="form-control" name="user_name" value="<?= $user->name ?>">
            </div>

            <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control" name="user_email" value="<?= $user->email ?>">
                <input type="hidden" name="user_id" value="<?= $user->id ?>">
            </div>

            <div class="form-group">
                <label>Пароль</label>
                <input type="password" class="form-control" name="user_password" value="<?= $user->password ?>">
            </div><br>


            <input type="hidden" name="dispatch" value="user_update">
            <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Сохранить">
        </div>
    </form>
<?php } else {
    echo "<h2 class='text-center'>Такого пользователя нет!</h2>";
} ?>
