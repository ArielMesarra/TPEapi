<?php
class CancionesModel{
    private $db;
        function __construct()
        {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=biblioteca_bd;charset=utf8', 'root', '');
        }
        
        function obtenerCanciones(){
            $query=$this->db->prepare('SELECT c.*,a.nombre AS nombreDeArtista FROM canciones AS c INNER JOIN artistas AS a ON c.fk_id_artistas = a.id_artistas');
            $query->execute();
            $canciones = $query->fetchAll(PDO::FETCH_OBJ);
            return $canciones;
        }

        function obtenerCancion($id){
            $query = $this->db->prepare('SELECT c.*,a.nombre AS nombreDeArtista FROM canciones AS c INNER JOIN artistas AS a ON c.fk_id_artistas = a.id_artistas WHERE c.id_canciones=?');
            $query->execute([$id]);
            $cancion = $query->fetch(PDO::FETCH_OBJ);
            return $cancion;
        }
        

}


?>