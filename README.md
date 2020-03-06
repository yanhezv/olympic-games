# API REST OLYMPIC GAMES

## Requerimientos de instalación
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