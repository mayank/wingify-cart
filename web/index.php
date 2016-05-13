<?php

require_once __DIR__.'/../vendor/autoload.php';

use Configurator\Config;

class App
{
    public static function run()
    {
          $config = Config::load();
    }
}


App::run();

 ?>
