<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="public/web/css/custom.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <title>Автомобильный блог</title>
</head>
<body>
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="index.php?dispatch=index" class="navbar-brand">
                <img class="logo" src="public/web/img/logo.png" alt="logo">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="index.php?dispatch=index" class="nav-link">Главная</a>
                    </li>
                    <li class="nav-item active">
                        <a href="index.php?dispatch=articles" class="nav-link">Статьи</a>
                    </li>

                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li class="nav-item active">
                            <a href="admin.php?dispatch=index" class="nav-link">Административная панель</a>
                        </li>
                    <?php } ?>

                   <?php if ((isset($_SESSION['user_id']))) { ?>
                        <li class="nav-item active">
                            <a href="index.php?dispatch=logout" class="nav-link">Выйти</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item active">
                            <a href="index.php?dispatch=login" class="nav-link" data-toggle="modal" data-target="#Avtoriz">Войти</a>
                        </li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<?php require_once 'templates/front/auth.php';?>

<?php require_once 'templates/front/notification.php';?>