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

    public function getUserByCredentials( $username, $password )
    {
        return $this->find()
                ->where(array(
                    'username' => $username,
                    'password' => md5($password)
                ))->get();
    }
}

 ?>
