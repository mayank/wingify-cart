<?php

namespace Controller;

use Controller\BaseController;

class CartController extends BaseController
{
      public function showDetails()
      {
            return $this->responseOK(array(
                  'cart' => 'ok'
            ));
      }
}


 ?>
