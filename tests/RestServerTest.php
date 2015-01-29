<?php

use Alexdevid\RestServer;

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
		$this->server = new RestServer();
	}

	public function testServerInit()
	{
		
	}

}
