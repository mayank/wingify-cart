<?php

namespace DBC;

use Configurator\ConfigFactory;
use PDO;

class ObjectMap
{
    protected $connection;
    protected $sql;
    protected $params;

    public function __construct( $connection )
    {
        $this->connection = $connection;
    }

    protected function findPrimary( $key )
    {
        $sql = "SELECT * FROM ".$this->table." WHERE ".$this->primary." = :key";
        $prepared = $this->connection->prepare($sql);
        $prepared->bindValue(":key", $key);
        $prepared->execute();
        $prepared->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $prepared->fetch();
    }

    protected function find()
    {
        $this->sql = "SELECT * FROM "..$this->table;
    }

    protected function where( $params )
    {
        $this->sql .= " WHERE ";

        $paramSQL = array();
        foreach( $params as $key => $value ){
            $paramSQL[] = "$key = :$key ";
        }

        $this->sql .= implode("and", $paramSQL);
    }

    protected function get()
    {
        $prepared = $this->connection->prepare( $sql );
        $this->bindParams( $prepared );
        $prepared->execute();
        $prepared->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $prepared->fetch();
    }

    private function bindParams()
    {
        foreach( $params as $key => $value ){
            $prepared->bindValue(":$key", $value );
        }
    }
}

 ?>
