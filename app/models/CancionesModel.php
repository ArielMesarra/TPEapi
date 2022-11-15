<?php
class CancionesModel{
    private $db;
        function __construct()
        {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=biblioteca_bd;charset=utf8', 'root', '');
        }
        
        function obtenerCanciones($desde, $hasta, $columna, $order, $filtro, $filtroPor){
            
            $filtroPor = '%'.$filtroPor.'%';
            $query = $this->db->prepare('SELECT canciones.*,a.nombre_artistas FROM canciones INNER JOIN artistas AS a ON fk_id_artistas = a.id_artistas WHERE '.$filtro.' LIKE "'.$filtroPor.'" ORDER BY '.$columna.' '.$order.' LIMIT :desde, :hasta ');
            $query->bindParam(':desde', $desde, PDO::PARAM_INT);
            $query->bindParam(':hasta', $hasta, PDO::PARAM_INT);
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