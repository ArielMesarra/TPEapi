<?php
require_once 'app/models/ArtistasModel.php';
require_once "app/absController/AbsController.php";

class BorrarArtistaController extends AbsController{

    function __construct() {
        parent::__construct();
        $this->model = new ArtistasModel();
    }

    function borrarArtista($params=[]) {
        if($this->authHelper->isLoggedIn()){
            $task_id = $params[":ID"];
            $task = $this->model->obtenerArtista($task_id);

            if($task) {
                $this->model->borrarArtista($task_id);
                $this->view->response("Artista id: ".$task_id." borrado correctamente", 200);
            }
            else {
                $this->view->response("Artista id: ".$task_id." no fue encontrado", 404);
            }
        }
        else{
            $this->view->response("No estas logueado", 401);
        }
    }
}

?>