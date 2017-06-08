<?php
ob_start();
session_start();
define('DB_USER', 'jeraldre_remote');
define('DB_PWD', 'Vfn*9sQHdd}q');
define('DB_NAME', 'jeraldre_remote_db');
define('DB_HOST', 'localhost');
define('DB_DSN', 'mysql:host=' . DB_HOST . ';port=3306;dbname=' . DB_NAME);
