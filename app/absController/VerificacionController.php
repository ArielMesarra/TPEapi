<?php
abstract class VerificacionController{
    protected $desde = 0;
    protected $hasta = 500;
    protected $columna = "nombre";
    protected $order = "ASC";
    protected $filtro;
    protected $filtroValor;

    function verificar($referencia, $columna){
        $por = "";
        if(isset($_GET["desde"])&&isset($_GET["hasta"])){
            $this->desde = $_GET["desde"];
            $this->hasta = $_GET["hasta"];
        }

        if(isset($_GET["por"])){
            $por = $this->columna = $_GET["por"];
        }
        
        //TRAEMOS UN REGISTRO PARA VER SI LO QUE EL USUARIO PUSO EN LA URL PARA ORDENAR POR COLUMNA, COINCIDE CON EL CAMPO DE LA DB.
        if(empty($referencia[0]->$por)){
            $this->columna = $columna;
        }

        if(isset($_GET["filtro"])){
           $this->filtro = $_GET["filtro"];
        }

        if(isset($_GET["filtroValor"])){
            $this->filtroValor = $_GET["filtroValor"];
         }

        // if(empty($referencia[0]->$filtro)){
        //     $this->filtro = $columna;
        // }
        

        
        if(isset($_GET['order'])&&$_GET['order']=="DESC")$this->order = "DESC";
    }
    
}


?>