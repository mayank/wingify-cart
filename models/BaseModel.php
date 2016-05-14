<?php

namespace Model;

class BaseModel
{
    public function __get($variable){
        return $this->$variable;
    }

    public function __set($variable, $value){
        return $this->$variable = $value;
    }
}

 ?>
