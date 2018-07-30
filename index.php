<?php
session_start();

require_once 'loader.php';

$dispatch = $_REQUEST['dispatch'];
if ($_REQUEST['dispatch'] == NULL) {
    header('Location: index.php?dispatch=index');
} else {
    require_once 'controllers/front/' . $dispatch . '.php';
}