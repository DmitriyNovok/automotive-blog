<?php
$articles = Article::getArticlesAll(10);
$users = User::getUsersAll();
require_once 'views/admin/admin.php';