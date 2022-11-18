<?php
require_once "app/models/CancionesModel.php";
require_once "app/absController/AbsController.php";

class BorrarCancionController extends AbsController{

    function __construct() {
        parent::__construct();
        $this->model = new CancionesModel();
    }

    function borrarCancion($params=[]) {
        if($this->authHelper->isLoggedIn()){
            $task_id = $params[":ID"];
            $task = $this->model->obtenerCancion($task_id);

            if($task) {
                $this->model->borrarCancion($task_id);
                $this->view->response("Cancion id: ".$task_id." eliminada exitosamente", 200);
            }
            else {
                $this->view->response("Cancion id: ".$task_id." no fue encontrada", 404);
            }
        }
        else{
            $this->view->response("No estas logueado", 401);
        }
    }
    


}


?>