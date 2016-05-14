<?php

namespace Configurator;

class ConfigFactory
{
    private static $class;
    private static $config;
    private function __construct(){
        $this->config = array();
    }

    public static function getInstance(){

        if(self::$class == null){
            self::$class = new ConfigFactory();
        }

        return self::$class;
    }

    public function load( $dir )
    {
        $handle = opendir($dir);
        while (false !== ($entry = readdir($handle))) {
             if ($entry != "." && $entry != "..") {
                $arrayIndex = substr($entry,0,strpos($entry,'.php'));
                $this->config[$arrayIndex] = (include "$dir/$entry");
             }
        }
        closedir($handle);
        return $this->config;
    }

}
 ?>
