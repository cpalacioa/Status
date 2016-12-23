<html>
   <head>
      </title>STATUS API DOCUMENTATION</title>
   </head>
   <body>
      <h3>
      # STATUS API
      <h3>
      <p>api rest para envió y recuperación de mensajes de texto<7p>
         <br>
      <p>Instrucciones de instalación y configuración</p>
      <br>
      <p>Requisitos para la instalación del proyecto</p>
      <br>
      <p><b>Los requisitos del servidor son:</b>
         <br>
         * PHP >= 5.6.4<br>
         * OpenSSL PHP Extension<br>
         * PDO PHP Extension<br>
         * Mbstring PHP Extension<br>
         * Mysql  >=5.6<br>
         <br>
         <br>Para ambientes locales y pruebas unitarias se requiere tener instalado composer para poder ejecutar
         los comandos requeridos
      </p>
      <h3>Instalación y configuración</h3>
      <br>
      <p>-Copiar los directorios web y src en los directorios  htdocs o public_html según el servidor<br>
         -Revisar que el directorio Src/storage/logs y el archivo lumen.logs  tenga permisos de lectura y escritura<br>
         -Para la creación de las tablas necesarias se tienen dos opciones<br>
         <br>
         . Ambiente local<br>
         dentro de la carpeta src ejecutar el comando php artisan migrate<br>
         <br>
         .Servidor<br>
         .Ejecutar el script.sql para la creación de la tabla<br>
         <br>
         En el archivo .env se encuentran las variables de configuración de acceso a base de datos<br>
         allí configurar las siguientes variables<br>
      </p>
      <p>
         DB_CONNECTION=mysql<br>
         DB_HOST=localhost:3306<br>
         DB_DATABASE=NAME_DATABASE<br>
         DB_USERNAME=USER_DATABASE<br>
         DB_PASSWORD=‘’PASSWORD”<br>
      </p>
      <p><b>Modificación de rutas</b>
         <br>
         En la ruta Src/App/http/<br>
         Se encuentra las rutas definidas para el servicio rest para su modificación<br>
         <br>las actuales rutas son:
         <br>
         Get /web/api/v1/status  para recuperar los ultimas mensajes ordenados por fechas desde los mas recientes<br>
         Get /web/api/v1/status/{id} recuperar mensajes en particular por su id o un texto de búsqueda<br>
         Post /web/api/v1/status   para guardar un mensaje . debe enviarse como mínimo el parámetro status el cual debe tener un mensaje con máximo 120 caracteres. también puede ir el parámetro email.<br>
         Delete /web/api/v1/status/{id}  elimina un mensaje según su Id.<br>
         <br>
         Para ejecutar las pruebas unitarias<br>
         Se debe tener instalado composer y una vez ubicado en la consola en el directorio src<br>
         correr el comando vendor/bin/phpunit<br>
   </body>
</html>
