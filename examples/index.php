<?php
//require_once "vendor/autoload.php";
require_once "Controllers/CategoryController.php";

$server = new Alexdevid\RestServer;
$server->controllerNamespace = 'Controllers';
$server->run();


/**
 * curl -X PUT -H "Content-Type: application/json" -d '{"name":"xyz","system_name":"test2"}' http://db.local/api/category
 * curl -X POST -H "Content-Type: application/json" -d '{"username":"xyz","password":"xyz"}' http://db.local/api/category/21
 */