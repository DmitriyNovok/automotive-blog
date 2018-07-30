<?php require_once 'templates/admin/header_crud.php';?>
    <br>
<?php if (isset($article->title)) { ?>
    <div class="container">
        <h1>Вы действительно хотите удалить статью <?= $article->title ?>?</h1>
        <form action="admin.php" method="post" id="article-delete-form">

            <input type="hidden" name="article_id" value="<?= $article->id ?>">
            <input type="hidden" name="dispatch" value="article_delete">
            <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Удалить статью">

        </form>
    </div>
<?php } else {
    echo "<h2 class='text-center'>Такой статьи нет!</h2>";
}