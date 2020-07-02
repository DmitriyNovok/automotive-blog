<?php

use cubinx\Core;
use cubinx\Loader;

session_start();

ini_set('max_execution_time', 0);
\ini_set('memory_limit', '-1');

require __DIR__.'../../../vendor/autoload.php';
require_once Core::class;
