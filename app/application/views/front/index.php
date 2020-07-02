<?php require_once 'templates/front/header.php' ?>

<div class="container-fluid p-0">
    <img class="d-block w-100" src="public/web/img/cars2.jpg"><br><br>
    <div class="text-center">
        <h1>Автомобильный Блог</h1>
        <p>Все об авто — новости, статьи, фото.</p>
    </div>
</div>
<br><br>

<div class="container-fluid p-0">
    <div class="container">
        <h2>Опубликованные статьи:</h2>
        <div class="row">
            <?php foreach ($articles as $article) : ?>
               <?php require 'templates/front/article_preview.php'; ?>
            <?php endforeach ?>
        </div>
    </div>
</div><br><br><br><br>

<?php require_once 'templates/front/footer.php' ?>