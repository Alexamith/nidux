# Instalación de la aplicación

## Clonar el proyecto

    git clone https://github.com/Alexamith/nidux.git

Al haber clonado el proyecto, entro a la raíz del proyecto y ejecuto el comando

    composer install

Configuración archivo .env

    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE="nombre de la base de datos"
    DB_USERNAME="Nombre de usuario"
    DB_PASSWORD="Contraseña"

Generar Key

    php artisan key:generate

Ejecutar migraciones

    php artisan migrate

## Levantar el servidor

    php artisan serve

## Abrir las colecciones de postman

    - Abrir la aplicación de postman
    - Darle a la pestaña de file o archivo e importar
    - Seleccionar el archivo llamado 'Nidux.postman_collection.json' e importarlo

## Crear el primer usuario

    - En la carpeta de Users de la colección de postman ejecutar la petición llamada 'register' con un usuario y contraseña.
    - Cuando el usuario esté registrado, ir a la carpeta de 'Auth' y ejecutar la petición llamada login con el usuario con y contraseña recién creado.

## Uso de la aplicación

Con el usuario ya creado, se puede usar la aplicaión totalmente, tanto web como api, queda a antojo como el usuario decida usar la app