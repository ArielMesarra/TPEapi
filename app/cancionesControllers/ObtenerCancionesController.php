<?php
require_once "app/models/CancionesModel.php";
require_once "app/views/JsonApiView.php";

class ObtenerCancionesController {
    private $model;
    private $view;
    protected $desde = 0;
    protected $hasta = 500;
    protected $columna = "nombre";
    protected $order = "ASC";
    
    function __construct() {
        $this->model = new CancionesModel();
        $this->view = new JSONAPIView();
    }

    function obtenerCanciones($params = []) {
        if (empty($params)) {
            $referencia = $this->model->obtenerCanciones(0,1,"nombre", "ASC");
            $this->verificar($referencia, 'id_canciones');
            $canciones = $this->model->obtenerCanciones($this->desde, $this->hasta, $this->columna, $this->order);
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
    function verificar($referencia, $columna){
        $por = "";
        if(isset($_GET["desde"])&&isset($_GET["hasta"])){
            $this->desde = $_GET["desde"];
            $this->hasta = $_GET["hasta"];
        }

        if(isset($_GET["por"])){
            $por = $this->columna = $_GET["por"];
        }
        
        //TRAEMOS UN REGISTRO PARA VER SI LO QUE EL USUARIO PUSO EN LA URL PARA ORDENAR POR COLUMNA, Y SI EL CAMPO COINCIDE CON EL DE LA DB.
        if(empty($referencia[0]->$por)){
            $this->columna = $columna;
        }
        
        if(isset($_GET['order'])&&$_GET['order']=="DESC")$this->order = "DESC";
    }
}
