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
	const TEST = "TEST";

	public function test()
	{
		echo 'HEOOLSDAD';
	}

    public function get($id)
    {
        return Category::find_by_pk($id, [])->to_json();
    }

    public function delete($id)
    {

    }

    public function put($id)
    {

    }

}
