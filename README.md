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