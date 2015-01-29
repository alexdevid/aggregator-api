<?php

use Alexdevid\RestServer;

/**
 * Description of RestGuzzleTest
 *
 * @author alexdevid
 */
class RestGuzzleTest extends \PHPUnit_Framework_TestCase
{

	public $client = null;

	public function setUp()
	{
		$this->domain = 'http://aggregator.alexdevid.ru/api/';
		$this->client = new GuzzleHttp\Client();
	}

	public function testGetAll()
	{
		$response = $this->client->get($this->domain . 'category');
		$data = json_decode($response->getBody(true), true);
		$this->assertArrayHasKey('system_name', $data[0]);
	}

	public function testGetById()
	{
		$response = $this->client->get($this->domain . 'category/21');
		$data = json_decode($response->getBody(true), true);
		$this->assertArrayHasKey('system_name', $data);
	}

	public function testPost()
	{

	}

	public function testPut()
	{

	}

	public function testDelete()
	{

	}
}
