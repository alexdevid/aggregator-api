<?php

namespace Controllers;

use Models\Picture;

/**
 * Description of PictureController
 *
 * @author alexdevid
 */
class PictureController extends RestController
{

	public function get($id = null)
	{
		if ($id) {
			$response = Picture::find_by_pk($id, [])->to_json();
		} else {
			$response = $this->responseArray(Picture::find('all'));
		}
		return $response;
	}

	public function delete($id)
	{

	}

	public function put($id)
	{

	}

	/**
	 * Example:
	 * curl -X POST -H "Content-Type: application/json" -d '{"url":"xyz","status":"1", "category_id": 23}' http://darina.local/picture
	 * @return type
	 */
	public function post()
	{
		return json_encode($_POST);
	}

}


