<?php

namespace Alexdevid;

/**
 * @author Alexander Devid <kerdevid@gmail.com>
 * @since 1.0
 */
class RestServer
{

	public $request;
	public $controllersNamespace;
	public $modelsNamespace;
	public $modelsDir;
	public $prefix = 'api';
	public $db = [];

	/**
	 * @var Kernel application instance
	 */
	public static $app = null;

	/**
	 * @inheritdoc
	 */
	public function __construct($config)
	{

		RestServer::$app = $this;

		foreach ($config as $key => $value) {
			$this->$key = $value;
		}

		$this->initConnection();

		new Rest;

		if (!$this->request) {
			$this->end();
		}
	}

	/**
	 * @return \App\Kernel
	 */
	private function initConnection()
	{
		\ActiveRecord\Config::initialize(function($cfg) {
			$cfg->set_model_directory($this->modelsDir);
			$cfg->set_connections([
				'development' => 'mysql://' . $this->db['username'] . ':' . $this->db['password'] . '@' . $this->db['host'] . '/' . $this->db['name'] . '?charset=utf8',
				'production' => 'mysql://' . $this->db['username'] . ':' . $this->db['password'] . '@' . $this->db['host'] . '/' . $this->db['name'] . '?charset=utf8',
			]);
		});
		return $this;
	}

	/**
	 *
	 * @return type
	 */
	public function end()
	{
		return die();
	}

}
