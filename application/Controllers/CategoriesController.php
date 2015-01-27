<?php

namespace Controllers;

use Models\Category;

/**
 * Description of CategoriesController
 *
 * @author alexdevid
 */
class CategoriesController extends RestController
{

    public function get()
    {
        return $this->responseArray(Category::find('all'));
    }

}
