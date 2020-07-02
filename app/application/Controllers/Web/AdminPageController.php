<?php

namespace controller\admin\Web;

use Article;
use UserModel;

class AdminPageController
{
    public static function view()
    {
        $articles = Article::getArticlesAll(10);
        $users = UserModel::getUsersAll();
        require_once 'views/Admin/Admin.php';
    }
}