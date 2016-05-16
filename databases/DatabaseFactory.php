<?php

namespace DBC;

use App\Factory;
use PDO;

class DatabaseFactory
{
    private static $class;
    private $connection;

    private function __construct(){
        $mysqlConf = Factory::getConfigManager()->get('database');

        $host = $mysqlConf['mysql']['host'];
        $dbname = $mysqlConf['mysql']['database'];
        $dbuser = $mysqlConf['mysql']['user'];
        $dbpswd = $mysqlConf['mysql']['password'];

        $this->connection = new PDO("mysql:host=$host;dbname=$dbname",$dbuser,$dbpswd);
    }

    public static function getInstance(){

        if(self::$class == null){
            self::$class = new DatabaseFactory();
        }
        return self::$class;
    }

    public function getUserMap()
    {
        return new UserMap($this->connection);
    }

    public function getCartMap()
    {
        return new CartMap($this->connection);
    }
}

?>
