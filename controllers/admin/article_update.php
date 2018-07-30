<?php

if (isset($_REQUEST['id'])) {
    $article = new Article();
    $article->load($_REQUEST['id']);
    $users = User::get_all_users();

    require_once 'views/admin/article_update.php';
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $article = new Article();
    $article->load($_REQUEST['article_id']);
    $article->update($_POST['article_title'], $_POST['article_text'], $_POST['article_date'], $_POST['user_id']);

    header("Location: admin.php?dispatch=index");
}