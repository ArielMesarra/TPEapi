<?php
require_once 'libs/router.php';
require_once 'app/cancionesControllers/CancionesController.php';
require_once 'app/cancionesControllers/AgreditarCancionesController.php';
require_once 'app/cancionesControllers/BorrarCancionController.php';

// crea el router
$router = new Router();

// ruteo de canciones
$router->addRoute('canciones', 'GET', 'CancionesController', 'obtenerCanciones');
$router->addRoute('canciones/:ID', 'GET', 'CancionesController', 'obtenerCanciones');
$router->addRoute('canciones', 'POST', 'AgreditarCancionesController', 'agreditarCancion');
$router->addRoute('canciones/:ID', 'PUT', 'AgreditarCancionesController', 'agreditarCancion');
$router->addRoute('canciones/:ID', 'DELETE', 'BorrarCancionController', 'borrarCancion');

//ruteo de artistas
$router->addRoute('artistas', 'GET', 'ObtenerArtistasController', 'obtenerArtistas');
$router->addRoute('artistas/:ID', 'GET', 'ObtenerArtistasController', 'obtenerArtistas');
$router->addRoute('artistas', 'POST', 'AgreditarArtistasController', 'agreditarArtista');
$router->addRoute('artistas/:ID', 'PUT', 'AgreditarArtistasController', 'agreditarArtista');
$router->addRoute('artistas/:ID', 'DELETE', 'BorrarArtistasController', 'borrarArtista');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>