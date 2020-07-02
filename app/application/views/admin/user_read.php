<?php require_once 'templates/Admin/header_crud.php';?>

<?php  if ($user->name !== NULL) { ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h2> <?= $user->name ?></h2>
        <p>E-mail пользователя: <?= $user->email ?></p>
        <p>Количество опубликованных статей: <?= $count_articles ?></p>
    </div>
    <?php } else {
        echo "<h2>Ошибка, такого пользователя нет! </h2>";
    } ?>
