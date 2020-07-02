<?php

$articles = Article::getArticlesAll(3,true);

require_once 'views/front/index.php';