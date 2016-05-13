<?php

namespace Configurator



class ConfigFactory
{
    private static $class;
    private __construct(){}

    public static getInstance(){

        if(self::$class == null){
            self::$class = new ConfigFactory();
        }

        return self::$class;
    }

    public function loadDir( $dir )
    {
        
    }

}


 ?>
