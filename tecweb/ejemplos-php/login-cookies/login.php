<?php
include 'conexion.php';
$errores="";
if(isset($_POST['usuario']) && isset($_POST['contraseña'])){
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
    $sql="SELECT * FROM `usuarios` WHERE `usuario`='$usuario'";
    $resultado=$conexion->query($sql);
    $result=$resultado->fetch(PDO::FETCH_ASSOC);
    if(count($result)>0 && $contraseña==$result['contrasena']){
        setcookie('usuario',"$usuario");
        header('Location: index.php');
        return;
    }else{
        $errores="Usuario o contraseña no válido";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="" method=POST>
    <input type="text" name="usuario" placeholder="Nombre de usuario">
    <input type="password" name="contraseña" placeholder="Contraseña">
    <button type="submit">Acceder</button>
    <p><a href="registrar.php">Regístrate</a></p>
    </form>
    <?php if($errores!=""): ?>
    <p> <?=$errores?> </p>
    <?php endif ?>
</body>
</html>