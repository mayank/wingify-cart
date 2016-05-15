<?php

namespace Router;

use Authenticator\AuthManager;
use Controller;

class RouteManager
{
    private static $class;
    private function __construct(){
    }

    public static function getInstance(){

        if(self::$class == null){
            self::$class = new RouteManager();
        }
        return self::$class;
    }

    public function route( $routes )
    {
        $route = $this->getRouteFromRequest();
        $this->forwardTo( $route );
    }

    public function routeToError( $statusCode )
    {
        $this->forwardTo('ERROR');
    }

    private function routeToController( $controller, $action )
    {
        $controller = "Controller\\$controller";
        $callable = new $controller();
        $callable->$action();

        $this->windUp();
    }

    private function windUp()
    {
        exit(1);
    }

    private function getRouteFromRequest()
    {
        $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
        $path = $parsedUrl['path'];

        $method = $_SERVER['REQUEST_METHOD'];
        return "$method:$path";
    }

    private function forwardTo( $route )
    {
        list($controller, $function) = $routes[array_key_exists($route, $routes)?$route:'ERROR'];
        $this->routeToController( $controller, $function );
    }
}

 ?>
