<?php

define('MYSQL_USER', 'f90443p8_rebis');
define('MYSQL_PASSWORD', '9UL&m093jQXz');
define('MYSQL_HOST', 'localhost');
define('MYSQL_DATABASE', 'f90443p8_rebis');

$pdoOptions = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false);
$pdo = new PDO("mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD, $pdoOptions);

