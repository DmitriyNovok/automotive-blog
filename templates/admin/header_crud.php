<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Blog Cars</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar bg-light sticky-top">
        <div class="container">
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

                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li class="nav-item active">
                            <a href="index.php?dispatch=logout" class="nav-link">Выйти</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</header>