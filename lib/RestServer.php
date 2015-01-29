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

}
