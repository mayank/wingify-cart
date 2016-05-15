<?php

namespace Authenticator;

use Model\UserModel;
use UserDBC;
use Sessions\SessionFactory;

class Authenticate
{
      public function authenticate()
      {
            if( !$this->isUserLoggedIn() ){
                  return $this->doLogin( $username, $password );
            }
            return false;
      }

      public function doLogin( $username, $password )
      {
            $status = false;
            $message = null;

            $user = $this->getUserByCredentials( $username, $password );
            if( $user instanceof UserModel ){
                  $this->setUserSession($user) );
                  $status = true;
                  $message = MessageProvider::get('login_success');
            }
            else {
                  $message = MessageProvider::get('login_failed');
            }
            return array('status' => $status, 'message' => $message);
      }

      private function setUserSession( $user )
      {
            $this->sessionManager->set( '_user', $user );
      }

      private function getUserById( $userId )
      {
            return $this->userDB->getUserByCredentials( $userId );
      }

      private function getUserByCredentials( $username, $password )
      {
            return $this->userDB->getUserByCredentials( $username, $password );
      }

      public function isUserLoggedIn()
      {
            $user = $this->sessionManager->get('_user');
            $this->userDB->getUserById( $user->userId );
      }


}


 ?>
