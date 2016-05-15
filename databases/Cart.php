<?php

namespace DBC;


class CartDBC extends BaseDBC
{

    public function all()
    {
        $selectQuery = "select * from cart where userId = :userId";
        
    }

}


 ?>
