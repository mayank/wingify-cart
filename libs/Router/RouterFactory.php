<?php

namespace Router;

class RouterFactory
{
    private static $class;
    private function __construct(){
    }

    public static function getInstance(){

        if(self::$class == null){
            self::$class = new RouterFactory();
        }

        return self::$class;
    }

    public function route( $routes )
    {
        list( $host, $path, $query ) = parse_url($url);
        $method = $_SERVER['REQUEST_METHOD'];
        $route = "$method:$path";
        if( array_key_exists($route, $routes) ){
            list($controller, $function) = $routes[$route];
        }
        return array( 'controller' => $controller, 'function' => $function );
    }
}

 ?>
