<?php

namespace Controller;

class BaseController
{
      private $request;

      public function setRequest($request)
      {
            $this->request = $request;
      }

      public function getRequest()
      {
            return $this->request;
      }

      public function responseOK($array){
            $this->setStatusHeaders(200);
            $this->renderJSON($array);
      }

      public function response($array){
            $this->setStatusHeaders($this->request->getStatusCode());
            $this->renderJSON($array);
      }

      public function responseForbidden($array){
            $this->setStatusHeaders(403);
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
                  case 403:
                        header("HTTP/1.1 403 Forbidden"); break;
                  default:
                        header("HTTP/1.1 404 Not Found");  break;
            }
      }
}


 ?>
