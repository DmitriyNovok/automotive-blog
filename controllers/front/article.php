<?php

$article = new Article();
$article->load($_REQUEST['id']);

require_once 'views/front/Article.php';