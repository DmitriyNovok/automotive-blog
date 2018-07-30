<?php require_once 'templates/front/header.php' ?>

<div class="container-fluid p-0">
    <img class="d-block w-100" src="data/img/cars2.jpg"><br><br>
    <div class="text-center">
        <h1>Автомобильный Блог</h1>
        <p>Все об авто — новости, статьи, фото.</p>
    </div>
</div>
<br><br>

<div class="container-fluid p-0">
    <div class="container">
        <h2>Последние статьи:</h2>
        <div class="row text-center">
            <?php foreach ($articles as $article) {
                require 'templates/front/article_preview.php';
            } ?>
    </div>
</div><br><br><br><br>

<?php require_once 'templates/front/footer.php' ?>