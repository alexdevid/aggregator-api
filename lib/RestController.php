<?php

namespace Alexdevid;

/**
 * Description of RestController
 *
 * @author alexdevid
 */
abstract class RestController
{

	public $request;

	public function __construct($request)
	{
		$this->request = $request;
	}

	/**
	 * Custom function used to serialize data passed from Controller
	 * @param type $data Data passed from controller
	 * @return string
	 * @json
	 */
	public function response($data)
	{
		return $data;
	}

	// @codeCoverageIgnoreStart
	abstract public function get();

	abstract public function post();

	abstract public function put();

	abstract public function delete();
	// @codeCoverageIgnoreEnd
}
