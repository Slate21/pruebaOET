<?php
//Conexion a base de datos por mysqli
$host = "localhost";
$usuario = "root";
$contrasena = "";
$BD = "ACME";

try {
    
    $conexion = mysqli_connect($host, $usuario, $contrasena, $BD);

} catch (Exception $ex) {

    echo $e -> get_message();

}