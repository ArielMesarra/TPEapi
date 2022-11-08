<?php
class JSONAPIView{
    function response($canciones, $codigo){
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $codigo . " " . $this->_requestStatus($codigo));
        echo json_encode($canciones);
    }

    private function _requestStatus($codigo){
        $estado = [
            200 => "OK",
            201 => "Created",
            400 => "Bad request",
            404 => "Not found",
            500 => "Internal Server Error"  
        ];
          return (isset($estado[$codigo]))? $estado[$codigo] : $estado[500];
    }

}
?>