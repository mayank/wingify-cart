<?php

namespace Router;

class Request
{
    private $get;
    private $post;
    private $method;
    private $requestUri;
    private $path;
    private $params;
    private $statusCode;

    public function __construct()
    {
        $statusCode = 200;
        $this->parseRoute();

        $this->setGetParameters();
        $this->setPostParameters();
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function parseRoute()
    {
        $this->requestUri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];

        $parsedUrl = parse_url($this->requestUri);
        $this->path = $parsedUrl['path'];
    }

    public function setGetParameters()
    {
        $this->get = $_GET;
    }

    public function setPostParameters()
    {
        $this->post = $_POST;
    }

    public function getRoute()
    {
        return $this->method.":".$this->path;
    }
}


 ?>
