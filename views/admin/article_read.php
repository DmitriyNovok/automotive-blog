<? require_once 'templates/admin/header_crud.php';?>

<?php  if (isset($article->title)) { ?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><?= $article->title ?></h1>
            <img class="d-block w-25" src="data/img/<?= $article->image ?>"><br>
            <p>Автор статьи: <?= $article->user->name ?></p>
            <p>Дата публикации: <?= $article->date ?></p>
            <p><?= $article->text ?></p>
        </div>
    </div>
<?php } else {
    echo "<h2 class='text-center'>Ошибка, страница не найдена </h2>";
} ?>

<?php require_once 'templates/admin/footer_admin.php';?>