<?php

if (isset($_REQUEST['id'])) {
    $user = new User();
    $user->load($_REQUEST['id']);

    require_once 'views/admin/user_update.php';
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = new User();
    $user->load($_REQUEST['user_id']);
    $user->update($_POST['user_name'], $_POST['user_email'], $_POST['user_password']);
    header("Location: admin.php?dispatch=index");
}