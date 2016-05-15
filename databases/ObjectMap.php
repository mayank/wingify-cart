<?php

namespace DBC;

use Configurator\ConfigFactory;
use PDO;

class ObjectMap
{
    protected $connection;

    public function __construct( $connection )
    {
        $this->connection = $connection;
    }

    protected function findPrimary( $key )
    {
        $sql = "SELECT * FROM ".$this->table." WHERE ".$this->primary." = :key";
        $prepared = $this->connection->prepare($sql);
        $prepared->bindValue(":key", $key, PDO::PARAM_STR);
        $prepared->execute();
        $prepared->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $prepared->fetch();
    }
}

 ?>
