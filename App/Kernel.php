<?php

namespace App;

use Respect\Rest\Router;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\ClassLoader;
use ActiveRecord\Config as DbConfig;

/**
 * @author Alexander Devid <kerdevid@gmail.com>
 * @since 1.0
 */
class Kernel
{

    /**
     * @var stdObject config params derivered from config.yml file 
     */
    public $config = null;

    /**
     * @var Respect\Rest\Router the main application router 
     */
    public $router = null;
    
    public static $app = null;

    /**
     * @inheritdoc
     */
    public function __construct()
    {
        $this->router = new Router;

        $this->parseConfig()
                ->initConnection()
                ->initRoutes();
        
        Kernel::$app = $this;
    }

    /**
     * Parse config from config.yml file
     * After this config can be accesible via $this->config
     * @return \App\Kernel
     */
    private function parseConfig()
    {
        $configFile = __DIR__ . DIRECTORY_SEPARATOR . 'config/config.yml';
        $config = Yaml::parse(file_get_contents($configFile), true, true);
        $this->config = json_decode(json_encode($config));
        return $this;
    }

    /**
     * Router initialization
     * 
     * @todo 
     * @return \App\Kernel
     */
    private function initRoutes()
    {
        $this->router->get('/', function() {
            return 'Hello World ';
        });

        foreach ($this->config->routes as $route) {
            $controllerName = '\Controllers\\' . ucfirst($route->controller) . 'Controller';
            $this->router->any($route->route, $controllerName);
        }
        return $this;
    }

    /**
     * 
     * @return \App\Kernel
     */
    private function initConnection()
    {
        DbConfig::initialize(function($cfg) {
            $cfg->set_model_directory(__DIR__ . '/../Models');
            $cfg->set_connections(
                    [
                        'development' => 'mysql://' . $this->config->db->username . $this->config->db->password . '@' . $this->config->db->host . '/' . $this->config->db->name . '?charset=utf8',
                        'production' => 'mysql://' . $this->config->db->username . $this->config->db->password . '@' . $this->config->db->host . '/' . $this->config->db->name . '?charset=utf8',
            ]);
        });
        return $this;
    }

}
