<?php

namespace Models;

use ActiveRecord\Model;

/**
 * Description of Category
 *
 * @author alexdevid
 */
class Category extends Model
{

	static $table_name = 'category';
	static $has_many = array(
		array('picture', 'through' => 'category_id')
	);

}
