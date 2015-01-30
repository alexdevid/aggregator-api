<?php

use Alexdevid\RestServer;
use Alexdevid\Response;

/**
 * Description of ResponseTest
 * @runInSeparateProcess
 * @author alexdevid
 */
class ResponseTest extends \PHPUnit_Framework_TestCase
{

	public $server = null;
	public $response = null;

	public function setUp()
	{
		$this->server = new RestServer;
		$this->response = $this->server->getResponse();
	}

	/**
	 * @runInSeparateProcess
	 */
	public function testDefaultResponseStatus()
	{
		$this->assertEquals($this->response->status, Response::$statuses[Response::DEFAULT_RESPONSE_CODE]);
	}

	/**
	 * @runInSeparateProcess
	 */
	public function testSetResponseStatus()
	{
		$this->response->setStatus('Not Modified');
		$this->assertEquals($this->response->status, 'Not Modified');
	}

	/**
	 * @runInSeparateProcess
	 */
	public function testDefaultStatusCode()
	{
		$this->assertEquals($this->response->code, Response::DEFAULT_RESPONSE_CODE);
	}

	/**
	 * @runInSeparateProcess
	 */
	public function testSetStatusCode()
	{
		$this->response->setCode(304);
		$this->assertEquals($this->response->code, 304);
		$this->assertEquals($this->response->status, Response::$statuses[304]);
	}

	/**
	 * @runInSeparateProcess
	 */
	public function tesetSetAllowedMethods()
	{
		$methods = ['GET', 'PUT'];
		$this->response->setAllowedMethods($methods);
		$this->assertEquals($this->response->allowedMethods, $methods);
	}

	/**
	 * @runInSeparateProcess
	 */
	public function testGetAllowedMethodsString()
	{
		$methods = ['GET', 'PUT'];
		$this->response->setAllowedMethods($methods);
		$this->assertEquals($this->response->getAllowedMethodsString(), 'GET, PUT');
	}

}
