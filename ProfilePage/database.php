<?php

$host = "localhost";
$dbname = "upload_db";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname
);

if ($mysqli -> connect_errno) {
    die("Connection error: " . $mysqli->connect_errno);
}

return $mysqli;
?>