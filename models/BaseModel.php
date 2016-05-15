<?php

namespace Model;

use ArrayAccess;

class BaseModel implements ArrayAccess
{
    public function __get($variable){
        return $this->$variable;
    }

    public function __set($variable, $value){
        return $this->$variable = $value;
    }
}

 ?>
