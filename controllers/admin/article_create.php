<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $article = new Article();
    $article->create($_POST['article_title'], $_POST['article_text'], $_POST['article_date'], $_POST['user_id']);
    header("Location: admin.php?dispatch=index");
} else {
    $users = User::getUsersAll();
    require_once 'views/admin/article_create.php';
}