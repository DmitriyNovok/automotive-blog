<?php require_once 'templates/admin/header_crud.php';?>

<br>
<h2 class="text-center">Добавить новую статью</h2>
<form action="admin.php" method="post" id="article-create-form">
    <div class="container">
        <div class="form-group">
            <label>Название статьи</label>
            <input type="text" class="form-control" name="article_title">
        </div>

        <div class="form-group">
            <label>Текст статьи</label>
            <input type="text" class="form-control" name="article_text">
        </div>

        <div class="form-group">
            <label>Дата публикации</label>
            <input type="date" class="form-control" name="article_date">
        </div>

        <label>Автор</label>
        <select class="form-control" name="user_id">
            <?php foreach ($users as $user) { ?>
                <option value="<?= $user->id ?>"> <?= $user->name ?></option>
            <?php } ?>
        </select><br>

        <input type="hidden" name="dispatch" value="article_create">
        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Добавить">
    </div>
</form>

<?php require_once 'templates/admin/footer_admin.php';?>