<?php require_once 'templates/front/header.php' ?>

<?php if (isset($article->title)) { ?>
    <img class="d-block w-100" src="data/img/<?= $article->icon ?>"><br><br>
    <h2 class="text-center"><?= $article->title ?></h2>
    <p class="text-center">Дата публикации: <?= $article->date ?></p>
    <p class="text-center">Автор статьи: <?= $article->user->name ?></p>
    <p class="text-center"><?= $article->text ?></p>
<?php } else {
    echo "<h2>Ошибка, страница не найдена </h2>";
} ?><br><br>

<?php require_once 'templates/front/footer.php' ?>