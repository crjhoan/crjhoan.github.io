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
    //var_dump($resultado);
    if($resultado==false){
        die("Error al momento de insertar en la base de datos");
    }
    header("Location: index.php");
}

?>
<?php include 'encabezaado.php'?>
    <div class="row">
    <div class="col-md-10">
      <table class="table">
          <thead>
              <tr>
                  <th>Numero</th>
                  <th>Materia</th>
                  <th>Calificacion</th>
                  <th>Operaciones</th>
              </tr>
          </thead>
          <tbody>
          <?php foreach($calificaciones as $calificacion): ?>
              <tr>
                  <td scope="row"><?php echo $calificacion['id'];?></td>
                  <td scope="row"><?=$calificacion['materia']?></td>
                  <td scope="row"><?= $calificacion['calificacion']?></td>
                  <td scope="row"><a href="eliminar.php?id=<?=$calificacion['id'];?>">Eliminar</a></td>
              </tr>
              <?php endforeach ?>
          </tbody>
      </table>
        <a href="agregar.php" class="btn btn-primary">Agregar nueva materia</a>
      </div>
      </div>
 <?php include 'pie.php';