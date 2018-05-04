<?php
include 'conexion.php';

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
        <div class="col-md-8">
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
            <a href="index.php" class="btn btn-warning">Cancelar</a>
      </form>
      </div>
        </div>
        <?php include 'pie.php';