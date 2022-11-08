<?php
require_once "app/views/JsonApiView.php";
abstract class AbsCancionesController {
    protected $model; // lo instancia el hijo
    protected $view;

    private $data; 

    public function __construct() {
        $this->view = new JSONAPIView();
        $this->data = file_get_contents("php://input"); 
    }

    function getData(){
        return json_decode($this->data); 
    }  
}



?>