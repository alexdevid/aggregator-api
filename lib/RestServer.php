<?php

namespace Alexdevid;

/**
 * @author Alexander Devid <kerdevid@gmail.com>
 * @since 1.0
 */
class RestServer
{

	/**
	 * @var \Alexdevid\Request
	 */
	private $request;

	/**
	 * @var \Alexdevid\Response
	 */
	private $response;

	/**
	 * @var string Controller namespace
	 */
	public $controllerNamespace = "";
	public $testing = true;

	/**
	 *
	 */
	public function __construct()
	{
		$this->request = new Request;
		$this->response = new Response;
	}

	/**
	 * @return \Alexdevid\Request
	 */
	public function getRequest()
	{
		return $this->request;
	}

	/**
	 * @return \Alexdevid\Response
	 */
	public function getResponse()
	{
		return $this->response;
	}

	/**
	 * @return ControllerClassName or Null
	 */
	public function getController()
	{
		$controllerName = '\\' . $this->controllerNamespace . '\\' . ucfirst(explode('/', $this->request->uri)[1]) . 'Controller';
		return class_exists($controllerName) ? new $controllerName($this->request) : NULL;
	}

	public function processRequest()
	{
		$actionName = strtolower($this->request->method);
		$this->response->content = $this->getController()->$actionName();
		$this->response->send($this->testing);
	}

	/**
	 * @param string $uri Full request url
	 * @return boolean
	 */
	public function isRestRequest($uri = NULL)
	{
		if ($uri) {
			return strpos($uri, $this->request->prefix) ? true : false;
		} else {
			return strpos(filter_input(INPUT_SERVER, 'REQUEST_URI'), $this->request->prefix) ? true : false;
		}
	}

}
