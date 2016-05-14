<?php

namespace Controller;

class BaseController
{
      public function responseOK($array){
            $this->setStatusHeaders(200);
            $this->renderJSON($array);
      }

      private function renderJSON($array){
            header('Content-Type:application/json');
            echo json_encode( $array );
      }

      private function setStatusHeaders( $status ){
            switch($status)
            {
                  case 200:
                        header("HTTP/1.1 200 OK"); break;
                  default:
                        header("HTTP/1.1 404 Not Found");  break;
            }
      }
}


 ?>
