# contador_visitas_dani
contador de visitas en redis y mysql

----- instalar en nustro servidor linux Mysql, php y apache (LAMP)-----

sudo apt install mysql-server
sudo apt install apache2
sudo apt install php

----- Crear un host virtual para su sitio web -----

lo añadimos en /etc/apache2/sites-available/ceti-pps.local.conf
sudo a2ensite ceti-pps-local

----- Instalar la extensión PHP Redis -----

  sudo apt update
  sudo apt install -y php-redis
  sudo systemctl restart apache2
  
Seguidamente creamos un test.php con un pequeño codigo que llame a un archivo 'hit_counter.php' , ha creado una página web HTML simple que carga un hit_counter.php cuando se visita. A continuación, codificará el hit_counter.php para realizar un seguimiento de las visitas a la página de prueba.

----- Creación de un script de contador de visitas -----

Este archivo sera el hit_counter.php 

----- Creación de un script de informe de estadísticas del sitio ----

sudo nano /var/www/html/log_report.php

----- Probar el contador de visitas de Redis -----

http://your-server-IP/test.php
Actualizamos la página y vemos en el log_report.php un informe que contenga las IP's y el número de visitas.

----- Modifica la aplicación web para utilizar como sistema de persistencia MySQL en lugar de Redis -----

Copiamos todos los archivos .php y les modificamos el nombre para saber que son los nuevos que usaremos para implantar la persistencia con mysql

En el archivo index.php comprobamos que llame al nuevo archivo hit_counter_mysql.php

Crear una Base de Datos y configurar ese mismo nombre en la configuración de PHP
Entramos en la consola de mysql y creamos un usuario y le damos permisos para las tablas
Creamos una base de datos llamada dani y una tabla visitas_dani (importante valor UNIQUE) para el correcto funcionamiento del hit_counter_mysql.php

----- Probar el contador de visitas de MySql -----

http://your-server-IP/index.php
