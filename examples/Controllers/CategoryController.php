<?php

namespace Controllers;

use Models\Category;
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
			$data = "gettin resource by ID";
		} else {
			$data = "gettin all resources";
		}
		return $this->response($data);
	}

	public function delete()
	{

	}

	public function put()
	{

	}

	public function post()
	{

	}

}
