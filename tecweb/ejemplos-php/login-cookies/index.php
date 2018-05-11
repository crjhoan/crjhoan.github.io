<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
</head>
<body>
    <h1>Inicio</h1>
    <?php if(isset($_COOKIE['usuario'])): ?>
        <p>Bienvenido <?=$_COOKIE['usuario']?> </p>
        <a href="contenido.php">Accede al contenido</a>
    <?php else: ?>
        <p>Bienvenido invitado</p>
        <a href="login.php">Inicia sesión</a>
    <?php endif?>
</body>
</html>