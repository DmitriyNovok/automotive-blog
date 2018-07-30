<?php

if ($_REQUEST['id']) {
    $user = new User();
    $user->load($_REQUEST['id']);
    $count_articles = $user->get_count_articles();

    require_once 'views/admin/user_read.php';
}