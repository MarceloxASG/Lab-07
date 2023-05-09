<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();


$Id=$_GET["id"];

// Consulta SQL
$sql = "SELECT * FROM libros where libro_id='$Id'";

// Ejecutamos la consulta
$resultado = mysqli_query($conexion, $sql);

// Cerramos la conexión
desconectar($conexion);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Nuevo Libro</title>
</head>
<body>
    <div class="container mt-3 rounded border p-4">
        <h1 class="text-center mb-5">Nuevo libro</h1>
        <form name="formAutor" method="post" action="agregar_libro.php">
            <div class="form-container">
                <div class="form-group">
                    <label for="nombres">Año:</label>
                    <input type="text" class="form-control border-2" name="anio" required>
                </div>
                <div class="form-group mt-3">
                    <label for="ape_paterno">Autor:</label>
                    <select name="cmbAutor" class="form-control select-lg border-2">
                        <option value="" disabled selected>Selecciona un autor</option>
                        <?php
                        $conexion = conectar();

                        //Código para obtener los autores desde la base de datos y crear los options del select
                        $sql = "SELECT autor_id, nombres, ape_paterno, ape_materno FROM autores";
                        $result = mysqli_query($conexion, $sql);
                        while ($fila = mysqli_fetch_array($result)) {
                            $autor_id = $fila['autor_id'];
                            $nombres = $fila['nombres'];
                            $ape_patAutor = $fila['ape_paterno'];
                            $ape_matAutor = $fila['ape_materno'];
                            if ($libro['autor_id'] == $autor_id) {
                                echo "<option selected>$nombres  $ape_patAutor $ape_matAutor</option>";
                            } else {
                                echo "<option>$nombres  $ape_patAutor $ape_matAutor</option>";
                            }
                        }
                        desconectar($conexion);
                        ?>
                        
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="ape_materno">Titulo:</label>
                    <input type="text" class="form-control border-2" name="titulo">
                </div>
                <div class="form-group mt-3">
                    <label for="nombres">URL:</label>
                    <input type="text" class="form-control border-2" name="url">
                </div>
                <div class="form-group mt-3">
                    <label for="nombres">Especialidad:</label>
                    <input type="text" class="form-control border-2" name="especialidad">
                </div>
                <div class="form-group mt-3">
                    <label for="nombres">Editorial:</label>
                    <input type="text" class="form-control border-2" name="editorial">
                </div>
                <button type="submit" class="btn btn-primary mt-4">Guardar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>