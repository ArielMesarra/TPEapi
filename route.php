<?php
require_once 'libs/router.php';
require_once 'app/controllers/CancionesController.php';
require_once 'app/controllers/AgreditarCancionesController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('canciones', 'GET', 'CancionesController', 'obtenerCanciones');
$router->addRoute('canciones/:ID', 'GET', 'CancionesController', 'obtenerCanciones');
$router->addRoute('canciones', 'POST', 'AgreditarCancionesController', 'agreditarCancion');
$router->addRoute('canciones/:ID', 'PUT', 'AgreditarCancionesController', 'agreditarCancion');
// $router->addRoute('canciones/:ID', 'DELETE', 'TaskApiController', 'borrarCancion');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>