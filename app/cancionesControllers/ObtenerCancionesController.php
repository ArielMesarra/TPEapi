<?php
require_once "app/models/CancionesModel.php";
require_once "app/views/JsonApiView.php";
require_once "app/absController/VerificacionController.php";

class ObtenerCancionesController extends VerificacionController{
    private $model;
    private $view;
    function __construct() {
        $this->model = new CancionesModel();
        $this->view = new JSONAPIView();
    }

    function obtenerCanciones($params = []) {
        if (empty($params)) {
            $referencia = $this->model->obtenerCanciones(0,1,"nombre_canciones","ASC", "id_canciones", "");
            $this->verificar($referencia, "id_canciones");
            $canciones = $this->model->obtenerCanciones($this->desde, $this->hasta, $this->columna, $this->order, $this->filtro, $this->filtroValor);
            $this->view->response($canciones, 200);
            }
        else {
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
