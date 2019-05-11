<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = new User();
    $user->create($_POST['user_name'], $_POST['user_email'], password_hash($_POST['user_password'], PASSWORD_DEFAULT));
    var_dump($_POST['user_email']);
    header("Location: admin.php?dispatch=index");
} else {
    require_once 'views/admin/user_create.php';
}