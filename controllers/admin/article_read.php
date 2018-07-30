<?php

if (isset($_REQUEST['id'])) {
    $article = new Article();
    $article->load($_REQUEST['id']);

    require_once 'views/admin/article_read.php';
}