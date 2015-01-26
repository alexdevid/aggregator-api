<?php

require_once __DIR__ . '/vendor/autoload.php';
$config = require_once __DIR__ . DIRECTORY_SEPARATOR . 'Config/main.php';
spl_autoload_extensions(".php");
spl_autoload_register();

$app = new Application\App($config);
