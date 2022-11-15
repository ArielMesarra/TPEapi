README TRABAJO DE API

PAGINACIÓN
Agregue parámetros de consulta a las solicitudes GET:
api/canciones o artistas?desde=X&hasta=X

CLASIFICACIÓN
Agregue parámetros de consulta a las solicitudes GET:
api/canciones o artistas?por=nombre de la columna&order=ASC o DESC
Nota: si omite el parámetro de pedido, el orden predeterminado será por id y ASC

BÚSQUEDA Y FILTRADO
Agregue parámetros de consulta a la solicitud GET:
/blogs?search=blog1 - busca en todos los campos la cadena blog1
/blogs?filter=blog1 - busca en todos los campos la cadena blog1
/blogs?title=blog1 - búsqueda por campo de título para la cadena blog1