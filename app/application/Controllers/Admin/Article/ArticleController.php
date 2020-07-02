<?php

namespace controllers\admin\Article;

use UserModel;
use Article;

class ArticleController
{
    public static function create()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $article = new Article();
            $article->create($_POST['article_title'], $_POST['article_text'], $_POST['article_date'], $_POST['user_id']);
            header("Location: Admin.php?dispatch=index");
        } else {
            $users = UserModel::getUsersAll();
            require_once 'views/Admin/ArticleController.php';
        }
    }

    public static function remove()
    {
        if (isset($_REQUEST['id'])) {
            $article = new Article();
            $article->load($_REQUEST['id']);

            require_once 'views/Admin/article_delete.php';
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $article = new Article();
            $article->load($_REQUEST['article_id']);
            $article->delete();

            header("Location: Admin.php?dispatch=index");
        }
    }

    public static function update()
    {
        if (isset($_REQUEST['id'])) {
            $article = new Article();
            $article->load($_REQUEST['id']);
            $users = UserModel::getUsersAll();
            require_once 'views/Admin/article_update.php';
        }
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $article = new Article();
            $article->load($_REQUEST['article_id']);
            $article->update($_POST['article_title'], $_POST['article_text'], $_POST['article_date'], $_POST['user_id']);
            header("Location: Admin.php?dispatch=index");
        }
    }

    public static function view()
    {
        if (isset($_REQUEST['id'])) {
            $article = new Article();
            $article->load($_REQUEST['id']);

            require_once 'views/Admin/article_read.php';
        }
    }
}
