<?php
$fuente = "mysql:host=localhost;dbname=kardexdb";
$usuario ="root";
$contraseña="";
try{
    $conexion= new PDO($fuente, $usuario, $contraseña);
}catch(PDOException $ex){
    echo'Error en la conexion'. $ex->getMessage();
}
?>