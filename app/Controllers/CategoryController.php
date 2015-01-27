<?php

namespace Controllers;

use Models\Category;

/**
 * Description of CategoriesController
 *
 * @author alexdevid
 */
class CategoryController extends RestController
{
    public function get($id = null)
    {
		if ($id) {
			$response = Category::find_by_pk($id, [])->to_json();
		} else {
			$response = $this->responseArray(Category::find('all'));
		}
		return $response;
    }

    public function delete($id)
    {

    }

    public function put($id)
    {

    }

}
