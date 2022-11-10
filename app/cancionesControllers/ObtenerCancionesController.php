<?php
require_once "app/models/CancionesModel.php";
require_once "app/views/JsonApiView.php";

class ObtenerCancionesController {
    private $model;
    private $view;

    function __construct() {
        $this->model = new CancionesModel();
        $this->view = new JSONAPIView();
    }

    function obtenerCanciones($params = []) {
        if (empty($params)) {
            $canciones = $this->model->obtenerCanciones();
            $this->view->response($canciones, 200);
        } else {
            $cancion = $this->model->obtenerCancion($params[":ID"]);
            if(!empty($cancion)) {
                $this->view->response($cancion, 200);
            }
            else{
                $this->view->response("No se encontro la cancion con el id: ".$params[":ID"], 404);
            }
        }
    }
}
