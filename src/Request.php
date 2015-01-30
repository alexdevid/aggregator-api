<?php

namespace Alexdevid;

/**
 * Description of Request
 *
 * @author alexdevid
 */
class Request
{

	const DEFAULT_PREFIX = 'api';

	/**
	 * @var string Method verb (GET, POST, PUT, DELETE)
	 */
	public $method = NULL;

	/**
	 * @var string Prefix to use before uri (/api/category/34 - api - is prefix)
	 */
	public $prefix = self::DEFAULT_PREFIX;

	/**
	 * @var string Current request uri
	 */
	public $uri = '';

	/**
	 * @var integer Current resource id (/api/category/34 - 34 is id)
	 */
	public $id = NULL;

	/**
	 * @var array Current POST/PUT data
	 */
	public $data = NULL;

	public function __construct()
	{

	}

	/**
	 * @param string $uri
	 */
	public function setUri($uri = NULL)
	{
		$this->uri = ($uri) ? : str_replace($this->prefix . '/', '', filter_input(INPUT_SERVER, "REQUEST_URI"));
		return $this;
	}

	/**
	 * @param string $method
	 */
	public function setMethod($method = NULL)
	{
		$this->method = ($method) ? : str_replace($this->prefix . '/', '', filter_input(INPUT_SERVER, "REQUEST_METHOD"));
		return $this;
	}

	/**
	 *
	 * @param string $prefix
	 */
	public function setPrefix($prefix = NULL)
	{
		$this->prefix = ($prefix) ? : self::DEFAULT_PREFIX;
		return $this;
	}

	/**
	 * @param array $data
	 */
	public function setData(array $data = [])
	{
		$this->data = $data ? : NULL;
		return $this;
	}

	/**
	 * @param integer $id
	 */
	public function setId($id = NULL)
	{
		$this->id = $id ? : NULL;
		return $this;
	}

	/**
	 *
	 * @return \Alexdevid\Request
	 */
	public function getIdFromUri()
	{

		$uriArray = explode('/', $this->uri);
		if ($uriArray[0] == "") {
			unset($uriArray[0]);
			$uriArray = array_values($uriArray);
		}
		if (count($uriArray) > 1) {
			return $uriArray[1];
		}
		return NULL;
	}

	/**
	 *
	 * @return array
	 */
	public function substractData()
	{
		$data = [];

		if ($this->method == 'PUT') {
			parse_str(file_get_contents("php://input"), $data);
		}
		if ($this->method == 'POST') {
			$data = $_POST;
		}

		return $data;
	}

}
