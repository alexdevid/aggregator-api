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
			$data = "getting resource by ID " . $this->request->id;
		} else {
			$data = "getting all resources";
		}
		return $this->response($data, 200);
	}

	// @codeCoverageIgnoreStart
	public function delete()
	{

	}

	public function put()
	{

	}

	public function post()
	{

	}

	// @codeCoverageIgnoreEnd
}
