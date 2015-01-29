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
	}

	/**
	 * @param string $method
	 */
	public function setMethod($method = NULL)
	{
		$this->method = ($method) ? : str_replace($this->prefix . '/', '', filter_input(INPUT_SERVER, "REQUEST_METHOD"));
	}

	/**
	 *
	 * @param string $prefix
	 */
	public function setPrefix($prefix = NULL)
	{
		$this->prefix = ($prefix) ? : self::DEFAULT_PREFIX;
	}

	/**
	 * @param array $data
	 */
	public function setData(array $data = [])
	{
		$this->data = $data ? : NULL;
	}

	/**
	 * @param integer $id
	 */
	public function setId($id = NULL)
	{
		$this->id = $id ? : NULL;
	}

}
