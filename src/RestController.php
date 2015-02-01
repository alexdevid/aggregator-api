<?php

namespace Alexdevid;

/**
 * Description of RestController
 *
 * @author alexdevid
 */
class RestController
{

    public $request;
    private $responseStatusCode = Response::DEFAULT_RESPONSE_CODE;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Custom function used to serialize data passed from Controller
     * @param type $data Data passed from controller
     * @param integer $statusCode
     * @return string
     * @json
     */
    public function response($data, $statusCode = Response::DEFAULT_RESPONSE_CODE)
    {
        $this->responseStatusCode = $statusCode;
        return $data;
    }

    /**
     * 
     * @return integer
     */
    public function getResponseStatusCode()
    {
        return $this->responseStatusCode;
    }

    // @codeCoverageIgnoreStart
    public function get()
    {
        
    }

    public function post()
    {
        
    }

    public function put()
    {
        
    }

    public function delete()
    {
        
    }

    // @codeCoverageIgnoreEnd
}
