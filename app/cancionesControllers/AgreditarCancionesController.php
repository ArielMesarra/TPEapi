<?php
require_once "app/controllers/AbsCancionesController.php";
require_once "app/models/CancionesModel.php";


class AgreditarCancionesController extends AbsCancionesController{

    function __construct() {
        parent::__construct();
        $this->model = new CancionesModel();
    }

    function agreditarCancion($params=[]){
        if(empty($params)){
            $valor = $this->model->crearCancion($this->getData());
            if(isset($valor)){
                $this->view->response($valor, 201);
            }
            else{
                $this->view->response("No se pudo agregar", 500);
            }
        }
        else{
            $this->model->editarCancion($this->getData(), $params[":ID"]);
        }
    }

}



?>