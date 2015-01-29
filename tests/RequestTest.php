<?php

use Alexdevid\RestServer;
use Alexdevid\Request;

/**
 * Description of RequestTest
 *
 * @author alexdevid
 */
class RequestTest extends \PHPUnit_Framework_TestCase
{

	public $server = null;

	public function setUp()
	{
		$this->server = new RestServer;
	}

	public function testDefaultRequestPrefix()
	{
		$this->assertEquals($this->server->getRequest()->prefix, Request::DEFAULT_PREFIX);
	}

	public function testSetRequestPrefix()
	{
		$this->server->getRequest()->setPrefix('rest');
		$this->assertEquals($this->server->getRequest()->prefix, 'rest');
	}

	public function testDefaultRequestUri()
	{
		$this->assertEquals($this->server->getRequest()->uri, '');
	}

	public function testSetRequestUri()
	{
		$this->server->getRequest()->setUri('category');
		$this->assertEquals($this->server->getRequest()->uri, 'category');
	}

	public function testDefaultRequestMethod()
	{
		$this->assertNull($this->server->getRequest()->method);
	}

	public function testSetRequestMethod()
	{
		$this->server->getRequest()->setMethod('POST');
		$this->assertEquals($this->server->getRequest()->method, 'POST');

		$this->server->getRequest()->setMethod();
		$this->assertEquals($this->server->getRequest()->method, NULL);
	}

	public function testSetRequestId()
	{
		$this->server->getRequest()->setId(21);
		$this->assertEquals(21, $this->server->getRequest()->id);
	}

	public function testSetRequestData()
	{
		$data = ['name' => 'Test'];
		$this->server->getRequest()->setData($data);
		$this->assertEquals($data, $this->server->getRequest()->data);
	}

}
