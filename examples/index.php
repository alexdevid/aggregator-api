<?php

require_once 'vendor/autoload.php';

/**
 * Use your autoload function for this;
 */
require_once 'Controllers/CategoryController.php';
require_once 'Controllers/PictureController.php';
require_once 'Models/Picture.php';
require_once 'Models/Category.php';

use Alexdevid\RestServer;

$rest = new RestServer([
	'controllersNamespace' => 'Controllers',
	'modelsNamespace' => 'Models',
	'modelsDir' => __DIR__ . DIRECTORY_SEPARATOR . 'Models',
	'prefix' => 'api',
	'db' => [
		'name' => 'aggr',
		'username' => 'root',
		'password' => '',
		'host' => 'localhost'
	]
]);
