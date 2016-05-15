<?php

namespace Sessions;

class SessionFactory
{
    private static $class;
    private $session;
    private $config;
    private $name;

    private function __construct( $config ){
        session_start();
        $this->config = $config;
        $this->name = $this->config['name'];
        $this->session = json_decode($_SESSION[$this->name],true);
    }

    public static function getInstance( $config ){

        if(self::$class == null){
            self::$class = new SessionFactory( $config );
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
        $_SESSION[$this->$name] = json_encode(this->session);
    }

}

 ?>
