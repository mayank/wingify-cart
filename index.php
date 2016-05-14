<?php

require_once __DIR__.'/vendor/autoload.php';

use Configurator\ConfigFactory;
use Router\RouterFactory;
use Controller;

class App
{
    public static function run()
    {
        # loading all configurations
        $config = ConfigFactory::getInstance()->load(__DIR__.'/config');

        # route the path
        $route = RouterFactory::getInstance()->route( $config['routes'] );
        $controller = "Controller\\".$route['controller'];
        $action = $route['function'];

        # calling the controllers
        $callable = new $controller();
        $callable->$action();
    }
}

App::run();

 ?>
