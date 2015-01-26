<?php

namespace Controllers;

use Respect\Rest\Routable;

/**
 * Description of CategoriesController
 *
 * @author alexdevid
 */
class CategoryController implements Routable
{

	public function get($id)
	{
		return "OLOLO YOU GET BY ID !" . $id;
	}

	public function delete($id)
	{

	}

	public function put($id)
	{

	}

}
