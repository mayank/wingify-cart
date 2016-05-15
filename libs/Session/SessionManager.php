<?php

namespace Session;

use App\Factory;

class SessionManager
{
    private static $class;
    private $session;
    private $config;
    private $name;

    private function __construct(){
        session_start();
        $this->config = Factory::getConfigManager()->get('session');
        $this->name = $this->config['name'];
        $this->session = $this->getSession();
    }

    private function getSession()
    {
        return isset($_SESSION[$this->name]) ? json_decode($_SESSION[$this->name],true) : array();
    }

    public static function getInstance(){
        if(self::$class == null){
            self::$class = new SessionManager();
        }
        return self::$class;
    }

    public function get( $name )
    {
        return $this->session[$name];
    }

    public function set( $name, $value )
    {
        $this->session[$name] = $value;
        return $this;
    }

    public function __destruct()
    {
        $_SESSION[$this->$name] = json_encode($this->session);
    }

}

 ?>
