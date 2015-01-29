<?php

namespace Alexdevid;

/**
 * Description of Request
 *
 * @author alexdevid
 */
class Request
{

	public $method;
	public $headers;
	public $request_uri;
	public $resource;
	public $resource_id;
	public $params;

	public function __construct($prefix)
	{
		$this->request_uri = isset($_SERVER["REQUEST_URI"]) ?: null;
		$this->method = isset($_SERVER["REQUEST_METHOD"]) ?: null;

		if (strpos($this->request_uri, $prefix) === false) {
			RestServer::$app->request = null;
		} else {
			RestServer::$app->request = $this;
		}

		$this->request_uri = str_replace($prefix . '/', '', $this->request_uri);
		$requestArray = explode('/', $this->request_uri);
		$this->resource = isset($requestArray[1]) ?: null;

		if (count($requestArray) > 2) {
			$this->resource_id = $requestArray[2];
		} else {
			$this->resource_id = null;
		}

		$this->headers = $this->getHeaders();
	}

	/**
	 * Function to get HTTP headers
	 */
	private function getHeaders()
	{
		if (function_exists('apache_request_headers')) {
			return apache_request_headers();
		}
		$headers = array();
		$keys = preg_grep('{^HTTP_}i', array_keys($_SERVER));
		foreach ($keys as $val) {
			$key = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($val, 5)))));
			$headers[$key] = $_SERVER[$val];
		}
		return $headers;
	}

	public function setHeaders()
	{
		//header("HTTP/1.1 $code $status");
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST, PUT');
	}

}
