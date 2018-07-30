<?php
session_start();

if ($_SESSION['user_id']) {
    require_once 'loader.php';
    $dispatch = $_REQUEST['dispatch'];
    require_once 'controllers/admin/' . $dispatch . '.php';
} else {
    unset($_REQUEST);
    header('Location: index.php?dispatch=index');
}