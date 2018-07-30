<?php

if (isset($_REQUEST['id'])) {
    $article = new Article();
    $article->load($_REQUEST['id']);

    require_once 'views/admin/article_delete.php';
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $article = new Article();
    $article->load($_REQUEST['article_id']);
    $article->delete();

    header("Location: admin.php?dispatch=index");
}