<?php

require_once __DIR__.'/../vendor/autoload.php';

use Configurator\ConfigFactory;
use Router\RouterFactory;

class App
{
    public static function run()
    {
        # loading all configurations
        $config = ConfigFactory::getInstance()->load(__DIR__.'/../config');

        # route the path
        RouterFactory::route( $config['routes'] );
    }
}

App::run();

 ?>
