<?php
require_once "app/views/JsonApiView.php";
abstract class AbsController {
    protected $model; // lo instancia el hijo
    protected $view;

    private $datos; 

    public function __construct() {
        $this->view = new JSONAPIView();
        $this->datos = file_get_contents("php://input"); 
    }

    function obtenerDatos(){
        return json_decode($this->datos); 
    }  
}



?>