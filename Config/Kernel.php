<?php

use Respect\Rest\Router;

/**
 * Description of Kernel
 *
 * @author alexdevid
 */
class Kernel
{

	public $config = null;
	public $router = null;

	public function __construct()
	{
		$this->parseConfig()->autoload();
		$this->router = new Router;

		$this->initRoutes()->initConnection();
	}

	private function parseConfig()
	{
		$configFile = __DIR__ . DIRECTORY_SEPARATOR . 'config.json';
		$config = file_get_contents($configFile);
		$this->config = json_decode($config);
		return $this;
	}

	private function autoload()
	{
		require_once __DIR__ . '/../vendor/autoload.php';
		spl_autoload_extensions(".php");
		spl_autoload_register();
		return $this;
	}

	private function initRoutes()
	{
		$this->router->get('/', function() {
			return 'Hello World';
		});

		foreach($this->config->routes as $route) {
			$this->router->get($route->route, '\Controllers\\' . ucfirst($route->controller) . 'Controller');
		}

	}

}
