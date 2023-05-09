<?php

include('../conexion.php');

$conexion = conectar();

$id=$_POST['txtID'];

mysqli_query($conexion, "DELETE FROM autores where autor_id='$id'") or die ("error al eliminar");

desconectar($conexion);

header("location:autores.php");

?>