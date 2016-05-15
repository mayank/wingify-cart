<?php

namespace Authenticator;

class AuthenticationFactory
{
    private static $class;
    private $session;
    private $config;
    private $name;

    private function __construct(){
        session_start();
        $this->config = $config;
        $this->name = $this->config['name'];
        $this->session = json_decode($_SESSION[$this->name],true);
    }

}

 ?>
