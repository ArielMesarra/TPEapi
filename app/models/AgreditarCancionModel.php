<?php
class AgreditarCancionModel{
    private $db;
        function __construct()
        {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=biblioteca_bd;charset=utf8', 'root', '');
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
}

?>