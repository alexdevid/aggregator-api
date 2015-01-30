<?php

use Alexdevid\RestServer;
use Alexdevid\Request;
use Alexdevid\Response;

/**
 * Description of RestServerTest
 * @author alexdevid
 */
class RestServerTest extends \PHPUnit_Framework_TestCase
{

	public $server = null;

	public function setUp()
	{
		$this->server = new RestServer;
	}

	/**
	 * @runInSeparateProcess
	 */
	public function testServerInit()
	{
		$this->assertTrue($this->server instanceof RestServer);
	}

	/**
	 * @runInSeparateProcess
	 */
	public function testServerRequestInit()
	{
		$this->assertTrue($this->server->getRequest() instanceof Request);
	}

	/**
	 * @runInSeparateProcess
	 */
	public function testServerResponseInit()
	{
		$this->assertTrue($this->server->getResponse() instanceof Response);
	}

	/**
	 * @runInSeparateProcess
	 */
	public function testIsRestRequest()
	{
		$this->assertTrue($this->server->isRestRequest('/' . $this->server->getRequest()->prefix . '/category'));
	}

	/**
	 * @runInSeparateProcess
	 * @outputBuffering disabled
	 */
	public function testGetController()
	{
		$this->server->getRequest()->setUri('/category/21');
		$this->server->controllerNamespace = 'Controllers';
		$this->assertTrue(is_subclass_of($this->server->getController(), '\Alexdevid\RestController') );
	}

	/**
	 * @runInSeparateProcess
	 */
	public function testProcessRequest()
	{
		$this->server->getRequest()->setUri('/category/21');
		$this->server->controllerNamespace = 'Controllers';
		$this->server->getRequest()->setMethod('GET');
		$this->server->processRequest();
	}

}
