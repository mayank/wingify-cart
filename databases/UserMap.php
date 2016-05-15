<?php

namespace DBC;


class UserMap extends ObjectMap
{
    protected $table = 'users';
    protected $primary = 'userId';

    public function getUserById( $userId )
    {
        return $this->findPrimary( $userId );
    }
}


 ?>
