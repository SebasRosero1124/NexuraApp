## Como Usar la aplicacion FrameWork LARAVEL

Para usar esta aplicacion se debe contar primero con Composer y NodeJs Previamente instalados para ejecutar el servidor del aplicativo mediante localhost

Para ejecutar el servidor debemos abrir la consola dentro de la carpeta del proyecto y ejecutar el comando "php artisan serve"

una vez ejecutado el servidor, normalmente se inicializa en el la ip 127.0.0.1:8000 o localhost:8000

Es importante especificar el puerto 8000 ya que normalmente es que utiliza Laravel para inicializar los servicios

Con esta IP ingresamos al navegador y en la URL pegamos la ip del servidor y va a cargar nuestro Aplicativo

Previamente debemos inicializar Xampp o gestor de BD local y utilizar la BD que se proporcionó para realizar la prueba

Ya la BD está configurada desde el archivo .ENV ubicada en la Raiz del proyecto

Una vez Realizado el proceso, La aplicacion se va a ejecutar correctamente


## Ubicaciones de los archivos

En este framework se utiliza el MVC

Los modelos se encuentran ubicados en la carpeta App\Models En estos se encuentra la comunicacion con la BD y las configuraciones respectivas

Los Controladores se encuentran ubicados en la carpeta App\Http\Controllers En estos se encuentra ubicada toda la logica del aplicativo junto con la comunicacion a la BD que posteriormente se le pasa a la vista

Las vistas se encuentran ubicadas en la carpeta Resource\Views En mi costumbre suelo dividir el contenido de las vistas en carpetas, en este caso se encuentran dentro de "Frontend" y "Welcome.blade.php" corresponde a la plantilla principal donde se encuentra el NavBar y el footer

De igual modo se manejan Rutas las cuales controlan el direccionamiento dentro de nuestra Aplicación Estas rutas se encuentran dentro de

Routes\Web.php

Dentro de la carpeta Public encontraremos todos los assets utilizados para realizar esta App, entre ellos se encuentran Los Css y las imagenes