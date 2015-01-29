<?php

namespace Components;

/**
 * Description of RestController
 *
 * @author alexdevid
 */
abstract class RestController
{

	public $request;
	public $response;
	public $responseStatus;

	public function __construct($request)
	{
		$this->request = $request;
	}

	final public function getResponseStatus()
	{
		return $this->responseStatus;
	}

	final public function getResponse()
	{
		return $this->response;
	}

	public function checkAuth()
	{
		return true;
	}

	// @codeCoverageIgnoreStart
	abstract public function get($id = null);

	abstract public function post($id);

	abstract public function put();

	abstract public function delete($id);
	// @codeCoverageIgnoreEnd
}
