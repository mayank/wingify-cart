<?php

namespace DBC;

use Configurator\ConfigFactory;
use PDO;

class BaseDBC
{
    protected $connection;

    public function __construct()
    {
        $mysqlConf = ConfigFactory::getInstance()->get('database');

        $host = $mysqlConf['mysql']['host'];
        $dbname = $mysqlConf['mysql']['database'];
        $dbuser = $mysqlConf['mysql']['user'];
        $dbpswd = $mysqlConf['mysql']['password'];

        $this->connection = new PDO("mysql:host=$host;dbname=$dbname",$dbuser,$dbpswd);
    }
}

 ?>
