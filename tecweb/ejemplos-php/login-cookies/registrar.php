<?php
include 'conexion.php';
$errores="";
if($_SERVER['REQUEST_METHOD']=='POST'){
 if($_POST['contraseña1']==$_POST['contraseña2']){
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña1'];
    $sql ="SELECT * FROM `usuarios` WHERE `usuario`='$usuario'";
    $resultado=$conexion->query($sql);
    if($resultado->fetch()==false){
        $sql1="INSERT INTO `usuarios` (`id_usuario`,`usuario`, `contrasena`) VALUES (NULL, '$usuario', '$contraseña')";
        $resultado2=$conexion->query($sql1);
        $errores= 'Usuario registrado';
    }
    else{
        $errores='Usario ya existe';
    }
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
</head>
<body>
    <h1>Registrar</h1>
    <form action="" method="POST">
    <input type="text" name="usuario" placeholder="Nombre de usuario">
    <input type="password" name="contraseña1" placeholder="Contraseña">
    <input type="password" name="contraseña2" placeholder="Confirme contraseña">
    <button type="submit">Registrar</button>
    <p><a href="index.php">Index</a></p>
    </form>
    <?php if($errores!=""): ?>
    <p> <?=$errores?> </p>
    <?php endif ?>
</body>
</html>