<?php

namespace Application;

/**
 * Description of Router
 *
 * @author alexdevid
 */
class Router
{

	public $requestUri = null;
	public $routesArray = null;
	public $requestMethod = null;
	public $controller = null;
	public static $test = 'TEST';

	public function __construct()
	{
		$this->init();
	}

	/**
	 *
	 */
	public function init()
	{
		$this->requestUri = $_SERVER['REQUEST_URI'];
		$this->requestMethod = $_SERVER['REQUEST_METHOD'];
		$this->routesArray = $this->getRoutesArray();

		$modelName = $this->getModelName();
		if (class_exists($modelName)) {
			echo $this->renderAction($modelName);
		} else {
			throw new \Exception('Model ' . $modelName . ' does not exist.');
		}
	}

	protected function renderAction($modelName)
	{
		if ($this->issetRouteParams()) {
			if ($this->requestMethod === 'GET') {
				echo $this->response($modelName::find_by_pk($this->routesArray[1], []));
			}
			if ($this->requestMethod === 'POST') {
				echo 'Method POST not implemented yet';
			}
			if ($this->requestMethod === 'PUT') {
				echo 'Method PUT not implemented yet';
			}
			if ($this->requestMethod === 'DELETE') {
				echo 'Method DELETE not implemented yet';
			}
		} else {
			if ($this->requestMethod === 'GET') {
				echo $this->responseArray($modelName::find('all'));
			}
		}
	}

	private function getRoutesArray()
	{
		$routes = explode('/', $this->requestUri);
		unset($routes[0]);
		return array_values($routes);
	}

	private function getModelName()
	{
		return "\Models\\" . ucfirst($this->routesArray[0]);
	}

	protected function responseArray($models)
	{
		$response = "[";
		$counter = 0;
		foreach ($models as $model) {
			$response .= $model->to_json();
			$counter++;
			$response .= ($counter == count($models)) ? "" : ",";
		}
		$response .= "]";
		return $response;
	}

	protected function response($model)
	{
		return $model->to_json();
	}

	protected function issetRouteParams()
	{
		return array_key_exists(1, $this->routesArray);
	}

}
