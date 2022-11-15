README TRABAJO DE API

Esta API sirve para ingresar a la base de datos "biblioteca_db", que consta de dos tablas llamadas "canciones" y "artistas".
Los endpoints son:

GET api/canciones //Para acceder a la tabla "canciones".
GET api/artsitas //Para acceder a la tabla "artsitas".

GET api/canciones/:ID //Para acceder a un registro de la tabla "canciones".
GET api/artsitas/:ID //Para acceder a un registro de la tabla "artistas".

POST api/canciones //Para agregar un registro a la tabla "canciones".
POST api/artsitas //Para agregar un registro a la tabla "artistas".

PUT api/canciones/:ID //Para editar un registro de la tabla "canciones".
PUT api/artsitas/:ID //Para editar un registro de la tabla "artistas".

DELETE api/canciones/:ID //Para para eliminar un registro de la tabla "canciones".
DELETE api/artsitas/:ID //Para para eliminar un registro de la tabla "artistas".

PAGINACIÓN
Agregue parámetros de consulta a las solicitudes GET:
api/canciones o artistas?desde=X&cantidad=X //Con la variable "desde", se indica donde inicia el listado y con la variable "cantidad" la cantidad de registros a listar. 

CLASIFICACIÓN
Agregue parámetros de consulta a las solicitudes GET:
api/canciones o artistas?por=nombre de la columna&order=asc o desc //Ordena de maner ascendente o descendente.
Nota: si omite el parámetro de pedido, el orden predeterminado será por id y ASC

BÚSQUEDA Y FILTRADO
Agregue parámetros de consulta a la solicitud GET:
api/artistas o canciones?filtro=nombre de la columna&filtroValor=valor que se buscara en la columna //Con la variable "filtro" buscara una columna y con la variable "filtroValor" buscara el valor deseado.

Ejemplo:
api/artistas?filtro=nombre_artistas&filtroValor=Trio galleta //Buscara en la tabla artistas la columna "nombre_artistas" el valor "Trio galleta".

Valores de filtrado y de ordenado para la tabla artistas:
api/artistas?filtro=id_artistas
api/artistas?filtro=nombre_artistas
api/artistas?filtro=lugar
api/artistas?filtro=integrantes_num

Valores de filtrado y de ordenado para la tabla canciones:
api/canciones?filtro=id_canciones
api/canciones?filtro=nombre_canciones
api/canciones?filtro=descripcion
api/canciones?filtro=fecha_estreno
api/canciones?filtro=fk_id_artistas

API TOKEN:
Obtene tu "token" ingresando "auth/token" en la url para ingresar y en la cabecera "Authorization" elegir entre las opciones "Basic auth".
En caso de estar logueado, copiar el "token", elegir entre las opciones "OAuth 2.0" y pegar el "token" en el campo que indica "Access token".

//Usuario 1
Usuario: Pepito
Contraseña: 456789

//Usuario 2
Usuario: ariel
Contraseña: 123456