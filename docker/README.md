# OLYMPIC GAMES | Contenedores Docker para el proyecto

## Instalar y/o verificar Docker en su equipo

1. Verifique si tiene instalado docker con `docker -v`, caso contrario dirijase a su web para [instalar docker](https://docs.docker.com/engine/install/ubuntu/)

2. Verifique si tiene instalado docker-compose con `docker-compose -v`, caso contrario dirijase a su web para [instalar docker-compose](https://docs.docker.com/compose/install/)

## Levantando los contenedores

1. Construir cada uno de los contenedores:
    
    MySQL:

    ``` bash
    cd docker/mysql
    sudo docker-compose build
    ```
    Apache:

    ``` bash
    cd docker/apache
    sudo docker-compose build
    ```

2. Encender cada uno de los contenedores:
    
    MySQL:

    ``` bash
    cd docker/mysql
    sudo docker-compose up -d
    ```
    Apache: Asegurarse que no haya otro servicio corriendo en el `puerto 80` caso contrario debera detenerlo antes

    ``` bash
    cd docker/apache
    sudo docker-compose up -d
    ```

3. Apagar cada uno de los contenedores.
    
    MySQL:

    ``` bash
    cd docker/mysql
    sudo docker-compose down
    ```
    Apache:

    ``` bash
    cd docker/apache
    sudo docker-compose down
    ```

Nota: Puede modificar las variables de entorno que se encuentra en cada directorio del contenedor denominado `.env`, con la finalidad de tener un contenedor mas personalizado.