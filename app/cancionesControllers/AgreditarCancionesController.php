<?php
require_once "app/absController/AbsController.php";
require_once "app/models/CancionesModel.php";


class AgreditarCancionesController extends AbsController{

    function __construct() {
        parent::__construct();
        $this->model = new CancionesModel();
    }

    function agreditarCancion($params=[]){
        if(empty($params)){
            $cancion = $this->model->crearCancion($this->obtenerDatos());
            if(isset($cancion)){
                $this->view->response($cancion, 201);
            }
            else{
                $this->view->response("No se pudo agregar", 500);
            }
        }
        else{
            $id = $params[":ID"];
            $task = $this->model->obtenerCancion($id);
            if($task){
                $this->model->editarCancion($this->obtenerDatos(), $params[":ID"]);             
                $this->view->response("La cancion id: ".$params[":ID"]." se edito correctamente", 200);   
            }
            else{
                $this->view->response("No se pudo encontrar una cancion con el id: ".$params[":ID"], 404);
            }
        }
    }

}



?>