<?php

namespace Components;

class Rest
{

    private $request;
    private $response;
    private $prefix;

    /**
     * Constructor
     * calls processRequest internally
     */
    public function __construct($config)
    {
        $this->prefix = $config->prefix;
        $this->request = $this->getRequest();
        $this->controller = $this->getController();
        $this->processRequest();
    }

    public function processRequest()
    {
        switch ($this->request->method) {
            case 'GET':
                $this->response = $this->controller->get($this->request->resource_id);
                break;
            case 'POST':
                $this->controller->request->params = $_POST;
                $this->response = $this->controller->post($this->request->resource_id);
                break;
            case 'PUT':
                parse_str(file_get_contents('php://input'), $this->controller->request->params);
                $this->response = $this->controller->put();
                break;
            case 'DELETE':
                $this->response = $this->controller->delete($this->request->resource_id);
                break;
            default:
                break;
        }
        $this->response();
    }

    private function response()
    {
        echo $this->response;
    }

    /**
     * Function processing raw HTTP request headers & body
     * and populates them to class variables.
     */
    private function getRequest()
    {
        return new Request($this->prefix);
    }

    private function getController()
    {
        $controllerName = "\Controllers\\" . ucfirst($this->request->resource) . "Controller";
        if (class_exists($controllerName)) {
            $controller = new $controllerName($this->request);
        } else {
            throw new Exception("Controller does not exist", "500");
        }
        return $controller;
    }

    /**
     * Function implementating json response helper.
     * Converts response array to json.
     */
    public function jsonResponse()
    {
        return json_encode($this->response);
    }

    private static $codes = array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported'
    );

}
