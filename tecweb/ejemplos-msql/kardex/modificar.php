<?php
include 'conexion.php';
$errores="";
$correcto="";

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="SELECT * FROM calificaciones WHERE id=$id";
        $resultado=$conexion->query($sql);
        $datos=$resultado->fetch(PDO::FETCH_NAMED);
        if($datos==false){
            $errores="ID de registro no existente";
        }
        $materia= $datos['materia'];
        $calificacion=$datos['calificacion'];
    }else{
        $errores="Falta proporcionar parametro ID";
    }
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['id'])){
        $id=$_POST['id'];
        $materia=$_POST['materia'];
        $calificacion=$_POST['calificacion'];
        $sql="UPDATE calificaciones SET materia='$materia',calificacion='$calificacion' WHERE id=$id";
        $resultado=$conexion->exec($sql);
        if($resultado==false){
            $errores="Error al modificar";
        }
        else if($resultado!=1){
            $errores="No se deberia haber modificado más de uno";
        }
        else{
            $correcto="Registro actualizado";
            header("Location: index.php?correcto=$correcto");
        }
    }else{
        $errores="Falta proporcionar parametro ID";
    }
}
?>

<?php include 'encabezaado.php';?>

<?php if($correcto!=""):?>
<div class="alert alert-success" role="alert">
    <strong><?=$correcto?></strong>
</div>
<?php endif?>

<?php if($errores!=""):?>
<div class="alert alert-warning" role="alert">
    <strong><?=$errores?></strong>
</div>

<?php else:?>


<form action="" method="POST">
    <div class="form-group">
      <label for="materia">Materia</label>
      <input type="text"
        class="form-control" name="materia" id="materia" value="<?=$materia?>">
    </div>
    <div class="form-group">
      <label for="calificacion">Calificación</label>
      <input type="number"
        class="form-control" name="calificacion" id="calificacion" value="<?=$calificacion?>">
    </div>
    <input type="hidden" name="id" value="<?=$id?>">
    <button type="submit" class="btn btn-danger">Actualizar</button>
    <a href="index.php" class="btn btn-info">Cancelar</a>
</form>
<?php endif?>

<?php include 'pie.php';?>