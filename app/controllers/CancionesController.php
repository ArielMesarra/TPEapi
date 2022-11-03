<?php
require_once "app/models/CancionesModel.php";
require_once "app/views/CancionesView.php";

class CancionesController{
    private $model;
    private $view;

    function __construct(){
        $this->model = new CancionesModel();
        $this->view = new CancionesAPIView();

    }

    function obtenerCanciones($params=[]){
        if(empty($params)){
            $canciones = $this->model->getCanciones();
            $this->view->response($canciones,200);
          }
        else{
            $cancion = $this->model->getCanciones($params[":ID"]);
            if(!empty($cancion)) {
            $this->view->response($cancion,200);
            }
        }  

        // header("Content-Type: application/json");
        // header("HTTP/1.1 200 'OK'");
        // echo "anda de 10";

    }

}

?>