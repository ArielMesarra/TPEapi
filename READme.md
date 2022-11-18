# __MUSI-API-COTECA ONLINE__

## ¿De que trata ésta Api?

Brindamos un servicio de acceso a nuestra base de datos  **"Musi-Api-CoTeca On Line"** Donde podes obtener la mejor musica de la zona y mucha info de diversos artistas.

## ¿COMO?

1. Canciones:
    - 1.1 [Obtener un listado de todas las canciónes](#traer-todas-las-canciones) 
    - 1.2 [Obtener datos de una sola canción](#traer-una-canción)
    - 1.3 [Agregar una canción](#quiero-agregar-una-cancion)
    - 1.4 [Editar una canción](#quiero-modificar-una-canción) 
    - 1.5 [Borrar una canción](#quiero-borrar-una-canción)
2. Artistas:
    - 2.1 [Obtener un listado de todos los artistas](#quiero-ver-los-artistas) 
    - 2.2 [Obtener datos de un solo artista](#quiero-ver-un-solo-artista)
    - 2.3 [Agregar un artista](#quiero-agregar-un-artista)
    - 2.4 [Editar un artista ](#quiero-modificar-los-datos-de-un-artista)
    - 2.5 [Borrar un artista](#quiero-borrar-un-artista)
3. Autentificacion:
    - 3.1 [¿Como me logueo?](#para-registrarme)
    - 3.2 [Como paginar](#paginación)
    - 3.4 [Como ordenar](#ordenado-por)
    - 3.3 [Como filtrar](#búsqueda-y-filtrado)
    - 3.5 [Endpoints](#endpoints)
    - 3.6 [Contacto](#contactanos-para-ponernos-un-10)

#





# Todo sobre Canciones
## __Traer todas las canciones__
Haciendo un __GET__ de este endpoint podes obtener todas las canciones disponibles!!!

> api/canciones 

## __Traer una canción__
Si conocés el numero de Id de tu cancion preferida, la podes solicitar asi agregando el numero al final.

> api/canciones/:ID

Ejemplo:
> api/canciones/5






## Si estás registrado podes __agregar, editar y borrar canciones.__
#
## ***Para registrarme...***



Es necesaria la __AUTENTIFICACIÓN__ de tu identidad.
Obtene tu toquen en "api/auth/token" ingresando como datos tu Usuario y tu Clave de la configuración "Basic Auth".
Si aún no tenes usa alguna de éstas:

***Usuario:*** Pepito <br>
***Contraseña:*** 456789

***Usuario:*** ariel <br>
***Contraseña:*** 123456

Después copia el "token", elegir entre las opciones "OAuth 2.0" y pegá el "token" en el campo que indica "Access token".

## Ahora si!






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
***Tene en cuenta éstos detalles:***
+ No te olvides de indicar que el verbo html es POST.
+ No aceptamos campos vacios.
+ Prestá atnción a la fecha
+ El id del artista lo agerga nuestra plataforma, vos solo tenes que elejir de tu check-box. Si lo ingresas manualmente y no existe un error te lo hará saber.







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
Y no te olvides de agregar el número de id al final de la dirección.

Ejemplo:
> api/canciones/5

Asegurate de que el verbo sea PUT.






## Quiero __BORRAR__ una canción:

Si sabes el id, seteá el verbo DELETE y el endpoint con id.<br>
Ejemplo:<br>
> api/canciones/5
+ Una vez borrado, no va a haber manera de recuperarlo.
#






# Todo sobre los Artistas:
Todo lo que se puede hacer con las canciones se puede hacer con los artistas, solo indicando el endpoint correcto.

## Quiero ver los Artistas:
con el verbo GET obtenes un listado con todos nuestros artistas.
> api/artsitas


## Quiero ver un solo artista
Si querés uno en particular, le agregas el id
> api/artistas/id

Ejemplo: 
> api/aritistas/5

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
+ Recordá que tenes que tenes que estar logueado, si nó estás, [mirá las instrucciones de autentificación mas arriba.](#para-registrarme)

## Quiero __MODIFICAR__ los datos de un artista.
Mandanos un JSON como el anterior con los datos modificados y tene en cuenta éstos detalles:
+ El verbo tiene que ser PUT.
+ y agregá al final el id del aritsta que querés modificar.
+ Recordá que tenes que estar logueado ,si nó lo estás, [mirá las instrucciones de autentificación mas arriba.](#para-registrarme)
> api/artistas/id

Ejemplo:

> api/artistas/5

## Quiero __BORRAR__ un artista
Si sabes el id, seteá el verbo DELETE y el endpoint con id.

Ejemplo:
> api/artista/5

## __ATENCION__

+ Al borrar un artista borras todas las canciones que le pertenecen de nuestra base de datos!!!
+ Una vez borrado, no va a haber manera de recuperarlo.
+ Estate atento!!! 
 

#
# Mas servicios disponibles 

Con **Musico-Api-Teca On Line** podes acceder a:

## __PAGINACIÓN__
Agregá parámetros de consulta a las solicitudes GET:
api/canciones o artistas?desde=X&cantidad=X 

+ en **"desde"** indicanos donde querés comenzar el listado
+ y en **"cantidad"** cuántos registros queŕes obtener.

Ejemplo:

5 canciones a partir de la cuarta de la lista:

> api/canciones?desde=4&cantidad=5

## __ORDENADO POR:__
Agreguá parámetros de consulta a la solicitud GET:
api canciones o artistas?por=xxxxx&order=asc o desc 

+ en __"por"__ poné el nombre de la columna por la que querés ordenar.
+ y en __"order"__  "asc" o "des" , (ascendente o descentente).

>Ej.: api/canciones?por=nombre_canciones&order=desc

>Ej2.: api/artistas?por=integrantes_num&order=desc

+ Si omitís los parámetro, el orden predeterminado será por id y ascendente.

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



## __BÚSQUEDA Y FILTRADO__
Agregue parámetros de consulta a la solicitud GET:
api/artistas o canciones?__filtro__=nombre de la columna&__filtroValor__=nombre de la columna

+ en __"filtroValor"__ escribí lo que buscás,  
+ y en __"filtro"__ la columna en la cuál se aplicará el filtro.

Ejemplo:
> Buscar en la tabla artistas la columna "nombre_artistas" el valor "Trio galleta".

Ejemplo:

> api/artistas?filtro=nombre_artistas&filtroValor=Trio galleta


## Orden, filtrado y paginado se pueden combinar:

Ejemplo: 
> api/canciones?__filtro__=nombre_artistas&__filtroValor__=Trio galleta&___por__=descripcion&__order__=asc&__desde__=1&__cantidad__=1 

#
# __ENDPOINTS__


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

