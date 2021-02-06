<?php

use cubinx\Core;

session_start();

ini_set('max_execution_time', 0);
\ini_set('memory_limit', '-1');

require __DIR__.'../../../vendor/autoload.php';

$core = new Core();
