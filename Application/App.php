<?php

namespace Application;

/**
 * Description of App
 *
 * @author alexdevid
 */
class App
{

	public $router = null;
	public $config = null;

	public function __construct($config)
	{
		$this->config = json_decode(json_encode($config), FALSE);
		$dbConfig = $this->setConnection();
		$this->router = new Router();
		$dbConfig->set_model_directory(__DIR__ . '/../Models/');
	}


	private function setConnection()
	{
		$username = $this->config->db->username;
		$password = ($this->config->db->password) ? ':' . $this->config->db->password : '';
		$dbname = $this->config->db->dbname;

		$cfg = \ActiveRecord\Config::instance();
		//$cfg->set_model_directory(__DIR__ . '/../Models/')
		$cfg->set_connections(
				[
					'development' => 'mysql://' . $username . $password . '@localhost/' . $dbname . '?charset=utf8',
					'production' => 'mysql://' . $username . $password . '@localhost/' . $dbname . '?charset=utf8',
				]
		);


		return $cfg;
	}

}
