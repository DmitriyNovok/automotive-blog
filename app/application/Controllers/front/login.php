<?php
session_start();
require_once 'loader.php';
$user_id = UserModel::userExist($_REQUEST['email'], $_REQUEST['password']);
if ($user_id === false) {
    header('Location: index.php?dispatch=index&auth=0');
} else {
    $_SESSION['user_id'] = $user_id;
    header('Location: Admin.php?dispatch=index');
}