<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $user = new User();
    $user->create($_REQUEST['user_name'], $_REQUEST['user_email'], $_REQUEST['user_password']);

    header("Location: admin.php?dispatch=index");
} else {
    require_once 'views/admin/user_create.php';
}