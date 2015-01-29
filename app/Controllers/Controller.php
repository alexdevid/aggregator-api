<?php

namespace Controllers;

use Components\RestController;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseController
 *
 * @author Dev
 */
class Controller extends RestController
{

	public function responseArray($models)
	{
		$response = "[";
		$counter = 0;
		foreach ($models as $model) {
			$response .= $model->to_json();
			$counter++;
			$response .= ($counter == count($models)) ? "" : ",";
		}
		$response .= "]";
		return $response;
	}


	public function get($id = null)
	{

	}

	public function post($id)
	{

	}

	public function put()
	{

	}

	public function delete($id)
	{

	}

}
