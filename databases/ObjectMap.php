<?php

namespace DBC;

use Configurator\ConfigFactory;
use PDO;
use Model;

class ObjectMap
{
    protected $connection;
    protected $sql;
    protected $where;

    public function __construct( $connection )
    {
        $this->sql = null;
        $this->where = array();
        $this->connection = $connection;
    }

    protected function find()
    {
        $this->sql = "SELECT * FROM ".$this->table;
        return $this;
    }

    protected function where( $key, $value )
    {
        $this->sql .= (empty($this->where) ? " WHERE " : " AND ")."$key = :$key";
        $this->where[$key] = $value;
        return $this;
    }

    private function prepared()
    {
        $prepared = $this->connection->prepare( $this->sql );
        $this->bindParams( $prepared );
        $prepared->execute();
        $prepared->setFetchMode(PDO::FETCH_CLASS, $this->getModel());
        return $prepared;
    }

    protected function get()
    {
        return $this->prepared()->fetch();
    }

    protected function all()
    {
        return $this->prepared()->fetchAll();
    }

    private function bindParams( $prepared )
    {
        foreach( $this->where as $key => $value ){
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
