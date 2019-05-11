<?php

if ($_REQUEST['id']) {
    $user = new User();
    $user->load($_REQUEST['id']);
    $count_articles = $user->getCountArticles();

    require_once 'views/admin/user_read.php';
}