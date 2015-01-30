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

## Usage
Somewhere in the begining of your script add this:
```php
<?php

$server = new Alexdevid\RestServer
$server->run();
```

Then add Controllers

#### Controllers
Controllers should extend ```Alexdevid\RestController``` class and it methods:
```php
public function get();
public function post();
public function put();
public function delete();
```
Each method is responsible for its own request method.
Look ```examples``` folder for more info

#### Testing

You can run PHPUnit tests in tests folder
