<?php

namespace Controllers;

use Models\Picture;

/**
 * Description of PictureController
 *
 * @author alexdevid
 */
class PictureController extends Controller
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

	/**
	 * curl -X DELETE http://darina.local/picture/123
	 * @param type $id
	 */
	public function delete($id)
	{
		$model = Picture::find_by_pk($id, []);
		return json_encode($model->delete());
	}

	public function put()
	{
		$model = new Picture;
		foreach($this->request->params as $param => $value) {
			$model->$param = $value;
		}
		$model->save();
		return $model->to_json();
	}

	/**
	 * Example:
	 * curl -X POST -H "Content-Type: application/json" -d '{"url":"xyz","status":"1", "category_id": 23}' http://darina.local/picture/123
	 * @return type
	 */
	public function post($id)
	{
		$model = Picture::find_by_pk($id, []);
		foreach($this->request->params as $param => $value) {
			$model->$param = $value;
		}
		$model->save();
		return $model->to_json();
	}

}
