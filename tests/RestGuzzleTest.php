<?php

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
		$this->domain = 'http://test.example.com/api/';
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
		$data = [
			'name' => 'test'
		];
		$response = $this->client->post($this->domain . 'category/21', ["json" => $data]);

		$this->assertEquals(201, $response->getStatusCode());
		$responseData = json_decode($response->getBody(true), true);
	}

	public function testPut()
	{
		$data = [
			'name' => 'test',
			'system_name' => 'test2'
		];
		$response = $this->client->put($this->domain . 'category', ["json" => $data]);

		$this->assertEquals(200, $response->getStatusCode());
		$responseData = json_decode($response->getBody(true), true);

	}

	public function testDelete()
	{
		$response = $this->client->delete($this->domain . 'category/21');
		$this->assertEquals(200, $response->getStatusCode());

	}

}
