<?php require_once 'templates/admin/header_crud.php';?>
    <br>
    <h2 class="text-center">Редактировать статью</h2>
<?php if (isset($article->title)) { ?>
    <form action="admin.php" method="post" id="article-update-form">
        <div class="container">
            <div class="form-group">
                <label for="name_article">Название статьи</label>
                <input id="name_article" type="text" class="form-control" value="<?= $article->title ?>" name="article_title"/>
            </div>

            <div class="form-group">
                <label for="text_article">Текст статьи</label>
                <textarea id="text_article" class="form-control" rows="4" name="article_text"><?= $article->text ?></textarea>
                <input type="hidden" name="article_id" value="<?= $article->id ?>"/>
            </div>

            <div class="form-group">
                <label for="date_publication">Дата публикации</label>
                <input id="date_publication" type="date" class="form-control" value="<?= $article->date ?>" name="article_date"/>
            </div>

            <div class="form-group">
                <label for="user_name">Автор</label>
                <select id="user_name" class="form-control" name="user_id">
                    <?php foreach ($users as $user) : ?>
                        <option <?=($user->id == $article->user->id ? 'selected' : '') ?> value="<?= $user->id ?>"> <?= $user->name ?></option>
                    <?php endforeach ?>
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