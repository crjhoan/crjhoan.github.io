<?php 


if (isset($_GET['usuario']) && !empty($_GET['usuario']))   {
    $fuente = "mysql:host=localhost;dbname=kardexdb";
    $usuario = "root";
    $contraseña = "root";
    try {
        $conexion = new PDO($fuente, $usuario, $contraseña);
    }   catch (PDOException $ex)    {
        echo 'Error en la conexion ' . $ex->getMessage();
        die();
    }
    $usuario = filter_input(INPUT_GET,'usuario',FILTER_SANITIZE_STRING);
    
    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindValue(':usuario', $usuario);
    if ($sentencia->execute() === false)    {
        die("Algo salio mal");
    }
    if ($sentencia->fetch() === false)  {
        echo '0';   // El usuario no existe
    }
    else    {
        echo '1';  // El usuario si existe
    }
}
else {
    echo '-1'; // Se debe proporcionar el nombre de un usuario
}
?>