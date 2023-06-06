<?php

header('Content-Type: text/html; Charset=UTF-8');
date_default_timezone_set('Europe/Istanbul');

define('MYSQL_HOST',	'localhost');
define('MYSQL_DB',		'upload_db');
define('MYSQL_USER',	'root');
define('MYSQL_PASS',	'');
define('PATH',	'http://localhost:8080/');


include 'db.php';
?>
