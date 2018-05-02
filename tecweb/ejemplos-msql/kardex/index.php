<?php
//include == copy-paste
include 'conexion.php';
$sql ="SELECT *FROM `calificaciones`";
$resultado = $conexion->query($sql);
if($resultado!=false)
{
    //fetchAll trae todos los elementos y los regresa en un arreglo
    $calificaciones = $resultado->fetchAll(PDO :: FETCH_NAMED);
}else 
{
    die('Error en la consulta');
}

//var_dump($calificaciones);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $materia=$_POST['materia'];
    $calificacion=$_POST['calificacion'];
    $sql="INSERT INTO `calificaciones` (`id`, `materia`, `calificacion`) VALUES (NULL, '$materia', '$calificacion')";
    $resultado=$conexion->query($sql);
    var_dump($resultado);
    if($resultado==false){
        die("Error al momento de insertar en la base de datos");
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
    <div class="row">
    <div class="col-md-8">
      <table class="table">
          <thead>
              <tr>
                  <th>Numero</th>
                  <th>Materia</th>
                  <th>Calificacion</th>
              </tr>
          </thead>
          <tbody>
          <?php foreach($calificaciones as $calificacion): ?>
              <tr>
                  <td scope="row"><?php echo $calificacion['id'];?></td>
                  <td scope="row"><?=$calificacion['materia']?></td>
                  <td scope="row"><?= $calificacion['calificacion']?></td>
              </tr>
              <?php endforeach ?>
          </tbody>
      </table>
      </div>
      <div class="col-md-4">
      <form action="" method='POST'>
            <div class="form-group">
                <label for="">Materia</label>
                <input type="text"class="form-control" name="materia" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
              <label for="">Calificación</label>
              <input type="number"
                class="form-control" name="calificacion" id="" aria-describedby="helpId" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
      </form>
      </div>
      </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>