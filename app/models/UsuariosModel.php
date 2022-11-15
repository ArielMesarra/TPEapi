<?php
class UsuariosModel{
    private $db;
        function __construct()
        {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=biblioteca_bd;charset=utf8', 'root', '');
        }

        function obtenerUsuario($user){
            $query = $this->db->prepare('SELECT * FROM usuarios WHERE nombre=?');
            $query->execute([$user]);
            $usuario = $query->fetch(PDO::FETCH_OBJ);
            return $usuario;

        }
}

?>