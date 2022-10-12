# Bases de datos en Laravel

Es posible conectar una base de datos (relacional en este caso) de tipo SQL, para esto es necesario instalar en la máquina virtual los paquetes necesarios: 

    $ sudo apt-get install mariadb-client mariadb-server -y

Después de instalar dichos paquetes, se ingresa el comando para entrar al gestor de bases de datos por consola:

    $ sudo mysql

Una vez dentro del gestor, se crea una base de datos con un nombre referente al proyecto, como **lfts_db**.

    MariaDB [(none)]> create database lfts_db;

Luego se crea un usuario, tal como **lfts_user**, y se le asigna una contraseña de acceso:

    MariaDB [(none)]> create user lfts_user identified by 'nothing';

Ahora se le otorgan privilegios sobre la base de datos antes creada:

    MariaDB [(none)]> grant all privileges on lfts_db.* to lfts_user;
    MariaDB [(none)]> flush privileges;
    MariaDB [(none)]> quit;

En la raíz del directorio del proyecto, se encuentra un archivo **.env**, el cual contiene la configuración para la conexión con la base de datos, deben establecerse los mismos parámetros:

    APP_URL=http://lfts.isw811.xyz

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=lfts_db
    DB_USERNAME=lfts_user
    DB_PASSWORD=nothing

Luego, desde la terminal, ubicando la ruta del directorio del proyecto, se ejecuta un comando para migrar una plantilla de base de datos que incorpora varias tablas, por medio de **artisan**:

    $ php artisan migrate

Aparecerá el proceso de migración:

    vagrant@webserver:~/sites/lfts.isw811.xyz$ php artisan migrate
    Migration table created successfully.
    Migrating: 2014_10_12_000000_create_users_table
    Migrated:  2014_10_12_000000_create_users_table (72.09ms)
    Migrating: 2014_10_12_100000_create_password_resets_table
    Migrated:  2014_10_12_100000_create_password_resets_table (34.21ms)
    Migrating: 2019_08_19_000000_create_failed_jobs_table
    Migrated:  2019_08_19_000000_create_failed_jobs_table (29.34ms)
    Migrating: 2019_12_14_000001_create_personal_access_tokens_table
    Migrated:  2019_12_14_000001_create_personal_access_tokens_table (43.92ms)

Ahora, se ingresa a **mysql** con el usuario creado anteriormente:
    
    mysql -u lfts_user --password="nothing"

Se pueden consultar las bases de datos a las cuales tiene privilegios con:

    MariaDB [(none)]>   show databases;

Ésto será lo que muestre el gestor:

    +--------------------+
    | Database           |
    +--------------------+
    | information_schema |
    | lfts_db            |
    +--------------------+
    2 rows in set (0.002 sec)

Para acceder a la base de datos **lfts_db**, se ingresa el comando:

    MariaDB [(none)]> use lfts_db;

Se pueden consultar las tablas creadas automáticamente por **artisan** con:

    MariaDB [(none)]> show tables;

Mostrará algo así:

    +------------------------+
    | Tables_in_lfts_db      |
    +------------------------+
    | failed_jobs            |
    | migrations             |
    | password_resets        |
    | personal_access_tokens |
    | users                  |
    +------------------------+
    5 rows in set (0.001 sec)