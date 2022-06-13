# Instalación de la aplicación

## Como es un archivo comprimido tiene todas las dependencias instaladas, por lo cual lo que se necesitaría es

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