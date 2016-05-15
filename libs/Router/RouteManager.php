<?php

namespace Router;

use Controller;
use Router\Request;

class RouteManager
{
    private static $class;
    private $request;

    private function __construct(){
        $this->request = new Request();
    }

    public static function getInstance(){

        if(self::$class == null){
            self::$class = new RouteManager();
        }
        return self::$class;
    }

    public function route( $routes )
    {
        $route = $this->request->getRoute();
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

        #setting up current request
        $callable->setRequest($this->request);
        $callable->$action();

        $this->windUp();
    }

    private function windUp()
    {
        # more stuff can be done like response listeners etc.
        exit(1);
    }

    private function forwardTo( $route )
    {
        list($controller, $function) = $routes[array_key_exists($route, $routes)?$route:'ERROR'];
        $this->routeToController( $controller, $function );
    }
}

 ?>
