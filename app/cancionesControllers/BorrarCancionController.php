<?php
require_once "app/models/CancionesModel.php";
require_once "app/views/JsonApiView.php";

class BorrarCancionController {
    private $model;
    private $view;

    function __construct() {
        $this->model = new CancionesModel();
        $this->view = new JSONAPIView();
    }

    function borrarCancion($params=[]){
        $task_id = $params[":ID"];
        $task = $this->model->obtenerCancion($task_id);

        if($task){
            $this->model->borrarCancion($task_id);
            $this->view->response("Cancion id: ".$task_id." eliminada exitosamente", 200);
        }
        else{
            $this->view->response("Cancion id: ".$task_id." no fue encontrada", 404);
        }
    }


}


?>