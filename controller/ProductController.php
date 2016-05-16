<?php

namespace Controller;

use Controller\BaseController;
use App\Factory;
use Model\ItemModel;

class ProductController extends BaseController
{
      private $itemDB;

      public function __construct()
      {
            parent::__construct();
            $this->itemDB = Factory::getDatabaseFactory()->getItemMap();
      }

      public function searchItems()
      {
            $result = $this->itemDB->getAllItems();
            $this->responseOK(array('items' => $result));
      }

      public function getItemById( $itemId = 0 )
      {
            $result = $this->itemDB->getItemById( $itemId );
            return $this->responseOK(array('item' => $result));
      }

      public function createNewItem()
      {
      }

      public function updateItem()
      {
      }

      public function deleteItem()
      {
      }
}


 ?>
