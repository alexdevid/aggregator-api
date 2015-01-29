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

}
