<?php
require_once 'libs/router.php';
require_once 'app/controllers/CancionesController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('canciones', 'GET', 'CancionesController', 'obtenerCanciones');
// $router->addRoute('canciones', 'POST', 'TaskApiController', 'crearCancion');
$router->addRoute('canciones/:ID', 'GET', 'TaskApiController', 'obtenerCanciones');
// $router->addRoute('canciones/:ID', 'DELETE', 'TaskApiController', 'borrarCancion');
// $router->addRoute('canciones/:ID', 'PUT', 'TaskApiController', 'editarCancion');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>