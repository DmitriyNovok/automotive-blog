<?php

$articles = \app\application\Models\Article\ArticleModel::getArticlesAll(12,true);
require_once 'views/front/articles.php';