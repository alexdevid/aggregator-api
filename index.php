<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'App/Kernel.php';

spl_autoload_register(function ($pClassName) {
    spl_autoload(strtolower(str_replace("\\", "/", $pClassName)));
});

$app = new \App\Kernel();
