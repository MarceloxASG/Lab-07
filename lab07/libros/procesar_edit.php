<?php

include('../conexion.php');

$conexion = conectar();

$ID=$_POST['txtID'];
$ANI=$_POST['txtAño'];
$AUT=$_POST['cmbAutor'];
$TITU=$_POST['txtTitulo'];
$URL=$_POST['txtUrl'];
$ESPEC=$_POST['txtEspecialidad'];
$EDIT=$_POST['txtEditorial'];


mysqli_query($conexion, "UPDATE `libros` SET `anio` = '$ANI', `autor` = '$AUT', `titulo` = '$TITU', `url` = '$URL', `especialidad` = '$ESPEC', `editorial` = '$EDIT' WHERE `libros`.`libro_id` = '$ID'") or die ("Error de actualización");

desconectar($conexion);

header("Location:libros.php");
?>