<?php
require_once "app/views/JsonApiView.php";
require "app/authController/AuthApiController.php";

abstract class AbsController {
    protected $model; // lo instancia el hijo
    protected $view;
    protected $authHelper;
    private $datos; 

    public function __construct() {
        $this->authHelper = new AuthApiHelper();
        $this->view = new JSONAPIView();
        $this->datos = file_get_contents("php://input"); 
    }

    function obtenerDatos(){
        return json_decode($this->datos); 
    }  
}



?>