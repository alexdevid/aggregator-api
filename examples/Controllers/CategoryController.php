<?php

namespace Controllers;

use Alexdevid\RestController;

/**
 * Description of CategoriesController
 *
 * @author alexdevid
 */
class CategoryController extends RestController
{

	public function get()
	{
		if ($this->request->id) {
			$data = '{"name" : "boobs", "system_name": "tits", "id": 21}';
		} else {
			$data = '[{"name" : "boobs", "system_name": "tits", "id": 21}]';
		}
		return $this->response($data, 200);
	}

	public function delete()
	{
		return $this->response("1", 200);
	}

	public function put()
	{
		return $this->response(json_encode($this->request->data), 200);
	}

	public function post()
	{
		return $this->response(json_encode($this->request->data), 201);
	}

}
