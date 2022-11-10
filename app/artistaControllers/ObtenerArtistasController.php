<?php
require_once "app/models/ArtistasModel.php";
require_once "app/views/JsonApiView.php";

class ObtenerArtistasController{
    private $model;
    private $view;
    function __construct() {
        $this->model = new ArtistasModel();
        $this->view = new JSONAPIView();
        
    }

    function obtenerArtistas($params=[]){
        if(empty($params)) {
            $artistas = $this->model->obtenerArtistas();
            $this->view->response($artistas, 200);
        }
        else {
            $artista = $this->model->obtenerArtista($params[":ID"]);
            if(!empty($artista)) {
                $this->view->response($artista, 200);
            }
            else{
                $this->view->response("No se encontro a el artista con el id: ".$params[":ID"], 404);
            }
            
        }

    }

}


?>