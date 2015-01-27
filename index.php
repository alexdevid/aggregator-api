<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
spl_autoload_register(function($classname) {
	$classname = str_replace('\\', DIRECTORY_SEPARATOR, $classname);
	require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'app/' . $classname . '.php';
});
$app = new Kernel();
