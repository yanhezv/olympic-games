# OLYMPIC GAMES | Servicio API REST

El presente servicio es creado usando el Framework Laravel 7.0 y PHP 7.2.5, si desean probarlo sigan uno de los siguientes procedimientos de instalación para ello.

Para probar los endpoint del presente servicio pueden ingresar a visualizar la siguiente [Colección de PostMan](https://documenter.getpostman.com/view/4566921/SzzhdxzC?version=latest)

## Instalación normal
1. Requiere `PHP > 7.2.5` y `composer`.
2. Instalar dependencias dentro del directorio `olympic-games`
    ``` bash
    composer install
    ```
3. Configurar conexión a base de datos en el `.env` del proyecto (Duplicar y renombrar `.env.example`). Ejemplo de conexión a MySQL:
    ``` bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=olympic_games
    DB_USERNAME=root
    DB_PASSWORD=12345
    ```
4. Ejecutar las migraciones
    ``` bash
    php artisan migrate
    ```
5. Crear `Encryption Keys` para la generación de access token
    ``` bash
    php artisan passport:install
    ```
6. Llenar base de datos con seeder de prueba (Solo funciona `APP_ENV=local`)
    ``` bash
    php artisan db:seed
    ```

## Instalación usando contenedores DOCKER

1. Tiene que construir y/o levantar los contenedores de `Apache para PHP` y `Mysql`. Lee el manual de instalación, construcción y encendido en el siguiente [README.md](../docker/README.md)

2. Abrir la intancia de MySQL usando una interfaz de administración como Worbench o traves de la terminal y creé el Schema de base de datos que necesitamos. Por ejemplo denominado `olympic_games`. Recuerde que nuestro contenedor expone la instancia de MySQL en el puerto 3307 de nuestro localhost o en su defecto bajo la Dirección IP de su equipo.

3. Cree y configure su Archivo `.env` a partir del `.env.example` solo debera agregar las credencial de acceso a nuestra base de datos, en este caso a nuestro contenedor para ello es necesario usar su IP ADDRESS y el puerto 3307 como sigue:
    ``` bash
    DB_CONNECTION=mysql
    DB_HOST=192.168.0.102         # Nuestra IP
    DB_PORT=3307
    DB_DATABASE=olympic_games
    DB_USERNAME=root
    DB_PASSWORD=12345            # El contenedor fue creado con esta contraseña
    ```

4. Ingresar al contenedor de `APACHE` usando el siguiente comando 
    ``` bash
    sudo docker exec -it olympicgames_apache bash
    ```

5. Ya dentro del contenedor debemos instalar las dependencias de nuestro proyecto usando composer, luego correr las migraciones y seeder de ser necesario. Y por ultimo para visualizarlo en la web sin problemas debemos salir del contenedor y dar permisos 777 al directorio `storage` para que laravel cree sin problemas los logs de cada interacción.

    En el contenedor ubicado en: `/var/www/html/olympic-games`
    ``` bash
    composer install       # Instala las dependencias de nuestro proyecto
    php artisan migrate    # Migra todas las tablas creadas
    php artisan db:seed    # Correr seeder
    exit                   # Comando para salir del contenedor
    ```
    Fuera del contenedor en: `UBUCACION_DEL_PROYECTO`
    ``` bash
    sudo chmod -R 777 service/storage       # Permiso de lectura y escritura
    ```
6. Probar que nuestro servicio esta funcionando, recomiendo usar POSTMAN para tal fin. Pueden ver la colección del presente servicio en siguiente enlace: [Colección de PostMan](https://documenter.getpostman.com/view/4566921/SzzhdxzC?version=latest).

7. Y listo!!

## Endpoints creados
``` bash
+----------+-----------------------------------------+--------------+
| Method   | URI                                     | Middleware   |
+----------+-----------------------------------------+--------------+
| GET|HEAD |                                         | web          |
| GET|HEAD | api/areas-complejos-polideportivos      | api,auth:api |
| GET|HEAD | api/areas-complejos-polideportivos/{id} | api,auth:api |
| POST     | api/auth/login                          | api          |
| GET|HEAD | api/auth/logout                         | api,auth:api |
| POST     | api/auth/signup                         | api          |
| POST     | api/comisionados                        | api,auth:api |
| GET|HEAD | api/comisionados                        | api,auth:api |
| DELETE   | api/comisionados/{id}                   | api,auth:api |
| PUT      | api/comisionados/{id}                   | api,auth:api |
| GET|HEAD | api/comisionados/{id}                   | api,auth:api |
| GET|HEAD | api/complejos-deporte-unico             | api,auth:api |
| GET|HEAD | api/complejos-deporte-unico/{id}        | api,auth:api |
| GET|HEAD | api/complejos-deportivos                | api,auth:api |
| POST     | api/complejos-deportivos                | api,auth:api |
| GET|HEAD | api/complejos-deportivos/{id}           | api,auth:api |
| PUT      | api/complejos-deportivos/{id}           | api,auth:api |
| DELETE   | api/complejos-deportivos/{id}           | api,auth:api |
| GET|HEAD | api/complejos-polideportivos            | api,auth:api |
| GET|HEAD | api/complejos-polideportivos/{id}       | api,auth:api |
| GET|HEAD | api/equipamientos                       | api,auth:api |
| POST     | api/equipamientos                       | api,auth:api |
| DELETE   | api/equipamientos/{id}                  | api,auth:api |
| PUT      | api/equipamientos/{id}                  | api,auth:api |
| GET|HEAD | api/equipamientos/{id}                  | api,auth:api |
| GET|HEAD | api/eventos                             | api,auth:api |
| POST     | api/eventos                             | api,auth:api |
| DELETE   | api/eventos/{id}                        | api,auth:api |
| GET|HEAD | api/eventos/{id}                        | api,auth:api |
| PUT      | api/eventos/{id}                        | api,auth:api |
| GET|HEAD | api/login                               | api          |
| POST     | api/sedes-olimpicas                     | api,auth:api |
| GET|HEAD | api/sedes-olimpicas                     | api,auth:api |
| DELETE   | api/sedes-olimpicas/{id}                | api,auth:api |
| PUT      | api/sedes-olimpicas/{id}                | api,auth:api |
| GET|HEAD | api/sedes-olimpicas/{id}                | api,auth:api |
| DELETE   | oauth/authorize                         | web,auth     |
| GET|HEAD | oauth/authorize                         | web,auth     |
| POST     | oauth/authorize                         | web,auth     |
| GET|HEAD | oauth/clients                           | web,auth     |
| POST     | oauth/clients                           | web,auth     |
| PUT      | oauth/clients/{client_id}               | web,auth     |
| DELETE   | oauth/clients/{client_id}               | web,auth     |
| GET|HEAD | oauth/personal-access-tokens            | web,auth     |
| POST     | oauth/personal-access-tokens            | web,auth     |
| DELETE   | oauth/personal-access-tokens/{token_id} | web,auth     |
| GET|HEAD | oauth/scopes                            | web,auth     |
| POST     | oauth/token                             | throttle     |
| POST     | oauth/token/refresh                     | web,auth     |
| GET|HEAD | oauth/tokens                            | web,auth     |
| DELETE   | oauth/tokens/{token_id}                 | web,auth     |
+----------+-----------------------------------------+--------------+
```
