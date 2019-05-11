<?php
$articles = Article::getArticlesAll(12,true);
require_once 'views/front/articles.php';