<?php


define('DB_HOST', 'localhost');    
define('DB_USER', 'root');    
define('DB_PASSWORD', ''); 
define('DB_NAME', 'noticias_db');    


$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($mysqli->connect_error) {
    die("Erro de Conexão: " . $mysqli->connect_error);
}

?>
