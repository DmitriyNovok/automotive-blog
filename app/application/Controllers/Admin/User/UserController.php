<?php

namespace controller\admin\User;

use UserModel;

class UserController
{
    public static function create()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            (new UserModel())->create($_POST['user_name'], $_POST['user_email'], password_hash($_POST['user_password'], PASSWORD_DEFAULT));
            var_dump($_POST['user_email']);
            header("Location: Admin.php?dispatch=index");
        } else {
            require_once 'views/Admin/user_create.php';
        }
    }

    public static function remove()
    {
        if (isset($_REQUEST['id'])) {
            (new UserModel())->load($_REQUEST['id']);
            require_once 'views/Admin/user_delete.php';
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $user = new UserModel();
            $user->load($_REQUEST['user_id']);
            $user->delete();

            header("Location: Admin.php?dispatch=index");
        }
    }

    public static function update()
    {
        if (isset($_REQUEST['id'])) {
            $user = new UserModel();
            $user->load($_REQUEST['id']);

            require_once 'views/Admin/user_update.php';
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $user = new UserModel();
            $user->load($_REQUEST['user_id']);
            $user->update($_POST['user_name'], $_POST['user_email'], $_POST['user_password']);
            header("Location: Admin.php?dispatch=index");
        }
    }

    public static function view()
    {
        if ($_REQUEST['id']) {
            $user = new UserModel();
            $user->load($_REQUEST['id']);
            $count_articles = $user->getCountArticles();

            require_once 'views/Admin/user_read.php';
        }
    }
}