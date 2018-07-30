<?php

$articles = Article::get_all_articles(12,true);

require_once 'views/front/articles.php';