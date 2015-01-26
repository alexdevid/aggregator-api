<?php

class Picture extends ActiveRecord\Model
{
	static $table_name = 'picture';

	static $belongs_to = array(
		array('category')
	);

}
