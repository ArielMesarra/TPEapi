<?php
class CancionesModel{
    private $db;
        function __construct()
        {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=biblioteca_bd;charset=utf8', 'root', '');
        }
        
        function obtenerCanciones($d, $h){
            $columna = "nombre";
            $query=$this->db->prepare('SELECT c.*,a.nombre AS nombreDeArtista FROM canciones AS c INNER JOIN artistas AS a ON c.fk_id_artistas = a.id_artistas ORDER BY :columna LIMIT :desde, :hasta ');
            $query->bindParam(':desde', $d, PDO::PARAM_INT);
            $query->bindParam(':hasta', $h, PDO::PARAM_INT);
            $query->bindParam(':columna', $columna, PDO::PARAM_STR);
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

        function crearCancion($data){
    
            $query = $this->db->prepare('INSERT INTO canciones (nombre, descripcion, fecha_estreno, fk_id_artistas) VALUES (?,?,?,?)');
            $query->execute([$data->nombre, $data->descripcion,  $data->fecha_estreno, $data->fk_id_artistas]);
            return $this->db->lastInsertId();
        }

        function editarCancion($data, $id){
            $query = $this->db->prepare('UPDATE canciones SET nombre=?, descripcion=?, fecha_estreno=?, fk_id_artistas=? WHERE id_canciones=?');
            $query->execute([$data->nombre, $data->descripcion, $data->fecha_estreno, $data->fk_id_artistas, $id]);
        }
        
        function borrarCancion($id){
            $query = $this->db->prepare('DELETE FROM canciones WHERE id_canciones=?');
            $query->execute([$id]);
        }
}

?>