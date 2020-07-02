<?php
session_start();

if ($_SESSION['user_id']) {
    require_once 'loader.php';
    $dispatch = $_REQUEST['dispatch'];
    if ($_REQUEST['dispatch'] == NULL) {
        header('Location: Admin.php?dispatch=index');
    }
    require_once 'Controllers/Admin/' . $dispatch . '.php';
} else {
    unset($_REQUEST);
    header('Location: index.php?dispatch=index');
}