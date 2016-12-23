# status
api rest para envió y recuperación de mensajes de texto

Instrucciones de instalación y configuración

Requisitos para la instalación del proyecto

Los requisitos del servidor son:

* PHP >= 5.6.4
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Mysql  >=5.6

Para ambientes locales y pruebas unitarias se requiere tener instalado composer para poder ejecutar
los comandos requeridos

Instalación y configuración

-Copiar los directorios web y src en los directorios  htdocs o public_html según el servidor
-Revisar que el directorio Src/storage/logs y el archivo lumen.logs  tenga permisos de lectura y escritura
-Para la creación de las tablas necesarias se tienen dos opciones

. Ambiente local
dentro de la carpeta src ejecutar el comando php artisan migrate

.Servidor
.Ejecutar el script.sql para la creación de la tabla

En el archivo .env se encuentran las variables de configuración de acceso a base de datos
allí configurar las siguientes variables

DB_CONNECTION=mysql
DB_HOST=localhost:3306
DB_DATABASE=NAME_DATABASE
DB_USERNAME=USER_DATABASE
DB_PASSWORD=‘’PASSWORD”

Modificación de rutas

En la ruta Src/App/http/

Se encuentra las rutas definidas para el servicio rest para su modificación

las actuales rutas son:

Get /web/api/v1/status  para recuperar los ultimas mensajes ordenados por fechas desde los mas recientes
Get /web/api/v1/status/{id} recuperar mensajes en particular por su id o un texto de búsqueda
Post /web/api/v1/status   para guardar un mensaje . debe enviarse como mínimo el parámetro status el cual debe tener un mensaje con máximo 120 caracteres. también puede ir el parámetro email.
Delete /web/api/v1/status/{id}  elimina un mensaje según su Id.

Para ejecutar las pruebas unitarias

Se debe tener instalado composer y una vez ubicado en la consola en el directorio src
correr el comando vendor/bin/phpunit
