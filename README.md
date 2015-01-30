# IF YOU SOMEHOW FOUND THIS, DONT USE IT, IT IS UNDER DEVELOPMENT

# PHP REST-Server
---
## Documentation @todo
* Installation
* Usage
* Docs

## Installation:
#### Using Composer:
* install [Composer](https://getcomposer.org/)
* ```composer require alexdevid/rest-server:dev-master```

#### Using Git:
* ```git clone https://github.com/alexdevid/rest-server.git```
* Then you should include it somehow in your script. E.g:
* ```require_once "rest-server/Server.php";```

#### Simple copy:
* Download this repository and copy files to folder called ```rest-server```
* Then you should include it somehow in your script. E.g:
* ```require_once "rest-server/Server.php";```

## Usage
Somewhere in the begining of your script add this:
```php
<?php
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
```

Then add Controllers and Models.

#### Controllers
Controllers should extend ```Alexdevid\RestController``` abastract class and it abstract methods:
```php
abstract public function get($id = null);
abstract public function post($id);
abstract public function put();
abstract public function delete($id);
```
Each method is responsible for its own request method.

#### Models
Models should extend ```ActiveRecord\Model``` class.
Please refer to this, if you don't know how to use it: https://github.com/jpfuentes2/php-activerecord
=======
abstract public function get();
abstract public function post();
abstract public function put();
abstract public function delete();
```
Each method is responsible for its own request method.


#### Testing

You can run PHPUnit tests in tests folder
