<?php

use Alexdevid\RestServer;
use Alexdevid\Request;
use Alexdevid\Response;

/**
 * Description of RestServerTest
 *
 * @author alexdevid
 */
class RestServerTest extends \PHPUnit_Framework_TestCase
{

	public $server = null;

	public function setUp()
	{
		$this->server = new RestServer;
	}

	public function testServerInit()
	{
		$this->assertTrue($this->server instanceof RestServer);
	}

	public function testServerRequestInit()
	{
		$this->assertTrue($this->server->getRequest() instanceof Request);
	}

	public function testServerResponseInit()
	{
		$this->assertTrue($this->server->getResponse() instanceof Response);
	}

	public function testIsRestRequest()
	{
		$this->assertTrue($this->server->isRestRequest('/' . $this->server->getRequest()->prefix . '/category'));
	}

	public function testGetController()
	{
		$this->server->getRequest()->setUri('/category/21');
		$this->server->controllerNamespace = 'Controllers';
		$this->assertTrue($this->server->getController() instanceof \Controllers\CategoryController);
	}

	public function testProcessRequest()
	{
		$this->server->getRequest()->setUri('/category/21');
		$this->server->controllerNamespace = 'Controllers';
		$this->server->getRequest()->setMethod('GET');
		$this->server->processRequest();
	}

}
