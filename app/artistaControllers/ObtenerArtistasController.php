<?php
require_once "app/models/ArtistasModel.php";
require_once "app/views/JsonApiView.php";
require_once "app/absController/VerificacionController.php";

class ObtenerArtistasController extends VerificacionController{
    private $model;
    private $view;
    function __construct() {
        $this->model = new ArtistasModel();
        $this->view = new JSONAPIView();
        
    }

    function obtenerArtistas($params=[]){
        if(empty($params)) {
            //se podria haber traido con "SHOW COLUMNS", pero preferimos usar este metodo porque era menos codigo y como exigimos que esten todos los campos llenos, este metodo funciona.
            $referencia = $this->model->obtenerArtistas(0,1,"nombre_artistas", "ASC", "nombre_artistas", "");
            $this->verificar($referencia, "id_artistas");
            $artistas = $this->model->obtenerArtistas($this->desde, $this->hasta, $this->columna, $this->order, $this->filtro, $this->filtroValor);
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