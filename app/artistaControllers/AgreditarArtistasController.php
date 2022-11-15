<?php
require_once 'app/absController/AbsController.php';
require_once 'app/models/ArtistasModel.php';


class AgreditarArtistasController extends AbsController{
    
    function __construct(){
        parent::__construct();
        $this->model = new ArtistasModel();
    }

    function agreditarArtista($params=[]){
        if($this->authHelper->isLoggedIn()){
            if(empty($params)){
                $artista = $this->model->agregarArtista($this->obtenerDatos());
                if(isset($artista)){
                    $this->view->response($artista, 201);
                }
                else{
                    $this->view->response("No se pudo agregar ese artista", 500);
                }
            }
            else{
                $id = $params[":ID"];
                $task = $this->model->obtenerArtista($id);
                if($task){
                    $this->model->editarArtista($this->obtenerDatos(), $params[":ID"]);
                    $this->view->response("Artista id: ".$params[":ID"]." editado correctamente.",200);
                }
                else{
                    $this->view->response("No se encontro a un artista con el id: ".$params[":ID"],404);
                }
            }
        }
        else{
            $this->view->response("No estas logueado", 401);
        }

    }


}
