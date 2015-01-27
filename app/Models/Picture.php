<?php

namespace Models;

use ActiveRecord\Model;

/**
 * Description of Picture
 *
 * @author alexdevid
 */
class Picture extends Model
{

	static $table_name = 'picture';
	static $belongs_to = array(
		array('category')
	);

}
