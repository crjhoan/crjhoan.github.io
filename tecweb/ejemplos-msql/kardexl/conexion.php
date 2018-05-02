<?php
$fuente="mysql:host=localhost;dbname=kardexdb";
$usuario="root";
$contraseña="root";
try{
$conexion=new PDO($fuente,$usuario,$contraseña);
echo 'Conexion establecida...';
$sql ="SELECT * FROM 'calificaciones'";
$resultado=$conexion->query($sql);
var_dump($resultado);
}
catch(PDOException $ex){
    echo 'Error en la conexion'.$ex->getMessage();
}
?>