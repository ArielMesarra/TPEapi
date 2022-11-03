<?php
class CancionesModel{
    private $db;
        function __construct()
        {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=biblioteca_bd;charset=utf8', 'root', '');
        }
        
        function getCanciones(){
            $query=$this->db->prepare('SELECT c.*,a.nombre AS nombreDeArtista FROM canciones AS c INNER JOIN artistas AS a ON c.fk_id_artistas = a.id_artistas');
            $query->execute();
            
           
                // $query = $this->db->prepare('SELECT c.nombre, c.descripcion, c.fecha_estreno, c.fk_id_artistas FROM canciones AS c');
                // $query=$this->db->prepare('SELECT c.*,a.nombre AS nombreDeArtista FROM canciones AS c INNER JOIN artistas AS a ON c.fk_id_artistas = a.id_artistas WHERE a.nombre=?');
                // $query->execute([$artista]);
            
            $canciones = $query->fetchAll(PDO::FETCH_OBJ);
            return $canciones;
        }


}


?>