<?php

namespace DBC;

use Configurator\ConfigFactory;
use PDO;
use Model;

class ObjectMap
{
    protected $connection;
    protected $sql;
    protected $params;

    public function __construct( $connection )
    {
        $this->sql = null;
        $this->params = array();
        $this->connection = $connection;
    }

    protected function findPrimary( $key )
    {
        $sql = "SELECT * FROM ".$this->table." WHERE ".$this->primary." = :key";
        $prepared = $this->connection->prepare($sql);
        $prepared->bindValue(":key", $key);
        $prepared->execute();
        $prepared->setFetchMode(PDO::FETCH_CLASS, $this->getModel());
        return $prepared->fetch();
    }

    protected function find()
    {
        $this->sql = "SELECT * FROM ".$this->table;
        return $this;
    }

    protected function where( $params )
    {
        $this->params = $params;
        $this->sql .= " WHERE ";

        $paramSQL = array();
        foreach( $this->params as $key => $value ){
            $paramSQL[] = "$key = :$key ";
        }

        $this->sql .= implode("and ", $paramSQL);
        return $this;
    }

    protected function get()
    {
        $prepared = $this->connection->prepare( $this->sql );
        $this->bindParams( $prepared );
        $prepared->execute();
        $prepared->setFetchMode(PDO::FETCH_CLASS, $this->getModel());
        return $prepared->fetch();
    }

    private function bindParams( $prepared )
    {
        foreach( $this->params as $key => $value ){
            $prepared->bindValue(":$key", $value );
        }
    }

    private function getModel()
    {
        $className = get_class($this);
        $onlyClass = substr($className,strrpos($className,'\\')+1);
        $modelName = str_replace('Map','Model',$onlyClass);
        return "Model\\$modelName";
    }
}

 ?>
