<?php require_once 'templates/Admin/header_crud.php';?>

<?php if (isset($user->name)) { ?>
    <div class="container">
        <h1>Вы действительно хотите удалить пользователя <?= $user->name ?>?</h1>
        <form action="admin.php" method="post" id="user-delete-form">
            <input type="hidden" name="user_id" value="<?= $user->id ?>">
            <input type="hidden" name="dispatch" value="user_delete">
            <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Удалить">
        </form>
    </div>
<?php }  else {
    echo "<h2 class='text-center'>Такого пользователя нет!</h2>";
} ?>