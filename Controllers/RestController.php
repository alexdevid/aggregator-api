<?php

namespace Controllers;

use Respect\Rest\Routable;

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
class RestController implements Routable
{

    public function __construct()
    {
        
    }

    protected function responseArray($models)
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

}
