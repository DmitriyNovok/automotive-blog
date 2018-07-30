<?php require_once 'templates/admin/header_crud.php';?>
    <br>
    <h2 class="text-center">Редактировать статью</h2>
<?php if (isset($article->title)) { ?>

    <form action="admin.php" method="post" id="article-update-form">
        <div class="container">
            <div class="form-group">
                <label>Название статьи</label>
                <input type="text" class="form-control" value="<?= $article->title ?>" name="article_title">
            </div>

            <div class="form-group">
                <label>Текст статьи</label>
                <textarea class="form-control" rows="4" name="article_text"><?= $article->text ?></textarea>
                <input type="hidden" name="article_id" value="<?= $article->id ?>">
            </div>

            <div class="form-group">
                <label>Дата публикации</label>
                <input type="date" class="form-control" value="<?= $article->date ?>" name="article_date">
            </div>

            <div class="form-group">
                <label>Автор</label>
                <select class="form-control" name="user_id">
                    <?php foreach ($users as $user) { ?>
                        <option <?=($user->id == $article->user->id ? 'selected' : '') ?> value="<?= $user->id ?>"> <?= $user->name ?></option>
                    <?php } ?>
                </select><br>
            </div>
            <input type="hidden" name="dispatch" value="article_update">
            <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Сохранить">
        </div>
    </form>

<?php } else {
    echo "<h2 class='text-center'>Такой статьи нет!</h2>";
} ?>

<?php require_once 'templates/admin/footer_admin.php';?>