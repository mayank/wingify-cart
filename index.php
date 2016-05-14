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
        list( $ctrl, $func, $params ) = RouterFactory::getInstance()->route( $config['routes'] );

        # calling the controllers
        $ctrlObj = new Controller\$ctrl();
        $ctrlObj->$func( $params );
    }
}

App::run();

 ?>
