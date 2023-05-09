<?php

include('../conexion.php');

$conexion = conectar();

$id=$_POST['txtID'];

mysqli_query($conexion, "DELETE FROM libros where libro_id='$id'") or die ("error al eliminar");

desconectar($conexion);

header("location:libros.php");

?>