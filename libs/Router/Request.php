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

    public function __construct()
    {
        $this->parseRoute();

        $this->setGetParameters();
        $this->setPostParameters();
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
