<?php
class CancionesAPIView{
    function response($canciones, $estado){
        header("Content-Type: application/json");
        header("HTTP/1.1 {$estado} 'OK'");
        echo json_encode($canciones);
        echo "anda todo de 10";


    }



}
?>