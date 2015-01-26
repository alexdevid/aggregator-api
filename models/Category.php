<?php

/**
 * Description of Category
 *
 * @author alexdevid
 */
class Category extends ActiveRecord\Model
{
	static $table_name = 'category';

	static $has_many = array(
		array('picture', 'through' => 'category_id')
	);

}
