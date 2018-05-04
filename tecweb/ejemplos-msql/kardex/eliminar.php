<?php
include 'conexion.php';

$id=$_GET['id'];
$sql="SELECT * FROM calificaciones WHERE id=$id";
$resultado=$conexion->query($sql);
$datos=$resultado->fetch(PDO::FETCH_NAMED);
$materia= $datos['materia'];
$calificacion=$datos['calificacion'];

if($_SERVER['REQUEST_METHOD']=='POST'){
$sql="DELETE FROM calificaciones WHERE id=$id";
var_dump($sql);
$resultado=$conexion->exec($sql);
if($resultado==false){
    echo 'Error al eliminar';
}
else if($resultado!=1){
    echo 'No se deberia haber eliminado más de uno';
}
else{
    echo 'Registro eliminado';
}
header("Location: index.php");
}
?>

<?php include 'encabezaado.php';?>

<?php
echo $materia.'<br>'.$calificacion.'<br>';
echo '¿Esta seguro?';
?>

<form action="" method="POST">
    <button type="submit" class="btn btn-danger">Eliminar</button>
    <a href="index.php" class="btn btn-info">Cancelar</a>
</form>

<?php include 'pie.php';?>