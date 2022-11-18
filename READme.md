# __MUSICO-API-TECA ONLINE__

## ¿De que trata ésta Api?

Brindamos un servicio de acceso a nuestra base de datos  **"Musico-Api-Teca On Line"** Donde podes obtener la mejor musica de la zona y mucha info de diversos artistas.

## ¿COMO?



#
# Todo sobre Canciones


Accede con el siguiente **Endpoints**:


> api/canciones 

Hacinedo un __GET__ de este endpoint podes obtener todas las canciones disponibles!!!

> api/canciones/:ID

Si conocés el numero de Id de tu cancion preferida, la podes solicitar asi agregando el numero al final.

ej. api/canciones/5


## Si estás registrado podes __agregar, editar y borrar canciones.__

## ¿Como?

Primero lo primero.
Es necesaria la __AUTENTIFICACIÒN__ de tu identidad.
Obtene tu toquen en "api/auth/token" ingresando como datos tu Usuario y tu Clave de la configuración "Basic Auth".
Si aún no tenes usa alguna de éstas:

Usuario: Pepito
Contraseña: 456789

Usuario: ariel
Contraseña: 123456

Después copia el "token", elegir entre las opciones "OAuth 2.0" y pegá el "token" en el campo que indica "Access token".

ahora si!!

## Quiero __AGREGAR__ una cancion.

Es muy sencillo.
Mandanos un JSON como eśte:
```
{
    "nombre_canciones": "Mi primer tema agregado",
    "descripcion": "mi canción predilecta",
    "fecha_estreno": "2017-02-25",
    "fk_id_artistas": 17,
}
```
Tene en cuenta éstos detalles:
+ No te olvides de indicar que el verbo html es POST.
+ No aceptamos campos vacios.
+ prestá atnción a la fecha
+ el id del artista lo agerga nuestra plataforma, vos solo tenes que elejir de tu check-box. Si lo ingresas manualmente y no existe un error te lo hará saber.

## Quiero __MODIFICAR__ una canción.

Envianos un JSON asi:
```
{
    "nombre_canciones": "Mi primer tema agregado",
    "descripcion": "mi canción predilecta",
    "fecha_estreno": "2017-02-25",
    "fk_id_artistas": 17,
}
```
Y no te olvide de agregar el númer de id al final de la dircciòn.

Ej:
api/canciones/5

Asegurate de que el verbo sea PUT.

## Quier __BORRAR__ una canción:

Si sabes el id, seteá el verbo DELETE y el endpoint con id.
Ej.:
api/canciones/5
+ Una vez borrado, no va a haber manera de recuperarlo, 

#
# Todo sobre los Artistas:
Todo lo que se puede hacer con las canciones se puede hacer con los artistas, solo indicando el endpoint correcto.

## Quiero ver los Artistas:
> api/artsitas 
con el verbo GET obtenes un listado con todos nuestros artistas.

Si querés uno en particular, le agregas el id
> api/artistas/id

ej.: api/aritistas/5

## Quiero __AGREGAR__ un artista

Configura el verbo en POST y envianos un JSON de ésta forma:

```
 {
    "nombre_artistas": "Pancho",
    "lugar": "El chaco",
    "integrantes_num": 4
}
```
+ No aceptamos campos vacios.
+ Recordá que tenes que tenes que estar logueado si nó estás mirá las instrucciones de autentificación mas arriba.

## Quiero __MODIFICAR__ los datos de un artista.
Mandanos un JSON como el anterior con los datos modificados y tene en cuenta éstos detalles:
+ El verbo tiene que ser PUT.
+ y agregá al final el id del aritsta que querés modificar.
+ Recordá que tenes que estar logueado si nó estás mirá las instrucciones de autentificación mas arriba.
> api/artistas/id

ej.: api/artistas/5

## Quiero __BORRAR__ un artista
Si sabes el id, seteá el verbo DELETE y el endpoint con id.
Ej.:
api/artista/5

## __ATENCION__

+ Al borrar un artista borras todas las canciones que le pertenecen de nuestra base de datos!!!
+ Una vez borrado, no va a haber manera de recuperarlo.
+ Estate atento!!! 
 

#
# Mas servicios disponibles 

Con **Musico-Api-Teca On Line** podes acceder a:

## __PAGINACIÓN:__
Agregá parámetros de consulta a las solicitudes GET:
api/canciones o artistas?desde=X&cantidad=X 

+ en **"desde"** indicanos donde querés comenzar el listado
+ y en **"cantidad"** cuántos registros queŕes obtener.

> Ej. 5 canciones a partir de la cuarta de la lista:

> api/canciones?desde=4&cantidad=5

## __ORDENADO POR:__
Agreguá parámetros de consulta a la solicitud GET:
api canciones o artistas?por=xxxxx&order=asc o desc 

+ en __"por"__ poné el nombre de la columna por la que querés ordenar.
+ y en __"order"__  "asc" o "des" , (ascendente o descentente).

>Ej.: api/canciones?por=nombre_canciones&order=desc

>Ej2.: api/artistas?por=integrantes_num&order=desc

+ Si omitís elos parámetro, el orden predeterminado será por id y ascendente.

Para orientarte te damos una lista de las columas de las dos tablas:

### Canciones:
+ id_canciones
+ nombre_canciones
+ descripcion
+ fecha_estreno
+ nombre_artistas

### Artistas:
+ id_artistas
+ nombre_artistas
+ lugar
+ integrantes_num



## BÚSQUEDA Y FILTRADO
Agregue parámetros de consulta a la solicitud GET:
api/artistas o canciones?filtro=nombre de la columna&

+ en __"filtroValor"__ escribí lo que buscás,  
+ y en __"filtroValor"__ la columna en la cuál se aplicará el filtro.

> Ej.: Buscar en la tabla artistas la columna "nombre_artistas" el valor "Trio galleta".

> Ej.: api/artistas?filtro=nombre_artistas&filtroValor=Trio galleta


## Orden,filtrado y paginado se pueden combinar:
>Ej.: api/canciones?filtro=nombre_artistas&filtroValor=Trio galleta&por=descripcion&order=asc&desde=1&cantidad=1 

#
# __REFERENCIA RAPIDA:      (ENDPOINTS)__


+ GET api/canciones
+ GET api/canciones/id
+ POST api/canciones
+ PUT api/canciones/id
+ DELETE api/canciones/id

+ GET api/artistas
+ GET api/artistas/id
+ POST api/artistas
+ PUT api/artistas/id
+ DELETE api/artistas/id


#
## Contactanos para ponernos un 10
Tu valoración nos importa.

Ariel Mesarra y Diego Rodriguez

