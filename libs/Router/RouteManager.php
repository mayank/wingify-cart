<?php

namespace Router;

use App\Factory;
use Controller;
use Router\Request;

class RouteManager
{
    private static $class;
    private $request;
    private $routes;

    private function __construct(){
        $this->routes = Factory::getConfigManager()->get('routes');
        $this->request = new Request();
    }

    public static function getInstance(){

        if(self::$class == null){
            self::$class = new RouteManager();
        }
        return self::$class;
    }

    public function route()
    {
        $route = $this->request->getRoute();
        $this->forwardTo( $route );
    }

    public function routeToError( $statusCode )
    {
        $this->request->setStatusCode($statusCode);
        $this->forwardTo('ERROR');
    }

    private function routeToController( $controller, $action )
    {
        try {

            $controller = "Controller\\$controller";
            $callable = new $controller();

            #setting up current request
            $callable->setRequest($this->request);
            $callable->$action();

        } catch (Exception $e) {
            $this->request->setStatusCode(500);
            $this->forwardTo('ERROR');
        }

        $this->windUp();
    }

    private function windUp()
    {
        # more stuff can be done like response listeners etc.
        exit();
    }

    private function forwardTo( $route )
    {
        list($controller, $function) = $this->routes[array_key_exists($route, $this->routes)?$route:'ERROR'];
        $this->routeToController( $controller, $function );
    }
}

 ?>
