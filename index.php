<?php
session_start();

require_once 'loader.php';

$dispatch = $_REQUEST['dispatch'];

require_once 'controllers/front/' . $dispatch . '.php';
