<?php

$articles = Article::get_all_articles(10);
$users = User::get_all_users();

require_once 'views/admin/admin.php';
