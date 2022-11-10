<?php
class ArtistasModel{
    private $db;
    function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=biblioteca_bd;charset=utf8', 'root', '');
    }

    function obtenerArtistas(){
        $query = $this->db->prepare('SELECT * FROM artistas');
        $query->execute();
        $artistas = $query->fetchAll(PDO::FETCH_OBJ);
        return $artistas;
    }

    function obtenerArtista($id){
        $query = $this->db->prepare('SELECT * FROM artistas WHERE id_artistas=?');
        $query->execute([$id]);
        $artista = $query->fetch(PDO::FETCH_OBJ);
        return $artista;
    }

    function borrarArtista($id){
        $query = $this->db->prepare('DELETE FROM artistas WHERE id_artistas=?');
        $query->execute([$id]);
    }

    function agregarArtista($datos){
        $query = $this->db->prepare('INSERT INTO artistas (nombre, lugar, integrantes_num) VALUES (?,?,?)');
        $query->execute([$datos->nombre, $datos->lugar, $datos->integrantes_num]);
        return $this->db->lastInsertId();
    }

    function editarArtista($datos, $id){
        $query = $this->db->prepare('UPDATE artistas SET nombre=?, lugar=?, integrantes_num=? WHERE id_artistas=?');
        $query->execute([$datos->nombre, $datos->lugar, $datos->integrantes_num, $id]);
    }
}

?>