<?php

namespace Alexdevid;

class Rest
{

	private $request;
	private $response;
	private $prefix;

	/**
	 * Constructor
	 * calls processRequest internally
	 */
	public function __construct()
	{
		$this->prefix = RestServer::$app->prefix;
		$this->request = $this->getRequest();
		$this->controller = $this->getController();
		$this->processRequest();
	}

	public function processRequest()
	{
		switch ($this->request->method) {
			case 'GET':
				$this->response = $this->controller->get($this->request->resource_id);
				break;
			case 'POST':
				$this->controller->request->params = $_POST;
				$this->response = $this->controller->post($this->request->resource_id);
				break;
			case 'PUT':
				parse_str(file_get_contents('php://input'), $this->controller->request->params);
				$this->response = $this->controller->put();
				break;
			case 'DELETE':
				$this->response = $this->controller->delete($this->request->resource_id);
				break;
			default:
				break;
		}
		$this->response();
	}

	private function response()
	{
		$this->request->setHeaders();
		echo $this->response;
	}

	/**
	 * Function processing raw HTTP request headers & body
	 * and populates them to class variables.
	 */
	private function getRequest()
	{
		return new Request($this->prefix);
	}

	private function getController()
	{
		$controllerName = '\\' . RestServer::$app->controllersNamespace . '\\' . ucfirst($this->request->resource) . "Controller";

		//echo $controllerName; die();

		if (class_exists($controllerName)) {
			$controller = new $controllerName($this->request);
		} else {
			throw new \Exception("Controller does not exist " . $controllerName, "500");
		}
		return $controller;
	}

	/**
	 * Function implementating json response helper.
	 * Converts response array to json.
	 */
	public function jsonResponse()
	{
		return json_encode($this->response);
	}


}
