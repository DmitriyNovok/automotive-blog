<?php

$articles = Article::get_all_articles(3,true);

require_once 'views/front/index.php';