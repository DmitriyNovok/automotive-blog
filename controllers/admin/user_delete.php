<?php

if (isset($_REQUEST['id'])) {
    $user = new User();
    $user->load($_REQUEST['id']);

    require_once 'views/admin/user_delete.php';
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = new User();
    $user->load($_REQUEST['user_id']);
    $user->delete();

    header("Location: admin.php?dispatch=index");
}