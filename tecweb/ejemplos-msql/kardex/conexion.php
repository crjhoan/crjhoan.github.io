<?php
$fuente = "mysql:host=localhost;dbname=kardexdb";
$usuario ="root";
$contraseña="root";
try{
    $conexion= new PDO($fuente, $usuario, $contraseña);
    //echo'Conexion establecida..';
    //muestraTodo();
}catch(PDOException $ex){
    echo'Error en la conexion'. $ex->getMessage();
}
function muestraTodo()
{
    global $conexion;

    $sql="SELECT * FROM `calificaciones`";
    $resultado=$conexion->query($sql);
    while(($fila= $resultado->fetch(PDO :: FETCH_NUM))!=false)
    {
        foreach ($fila as $elemento)
        {
            echo $elemento .'<br>';
        }
    }
}
function muestraRenglon()
{
    global $conexion;

    $sql="SELECT * FROM `calificaciones`";
    $resultado=$conexion->query($sql);
    //var_dump($resultado->fetch());
    $fila= $resultado->fetch();
    //accede por numero de indice
    echo $fila[0].'<br>';
    echo $fila[1].'<br>';
    echo $fila[2].'<br>';
    //accede por nombre
    echo $fila['id'].'<br>';
    echo $fila['materia'].'<br>';
    echo $fila['calificacion'].'<br>';
}
