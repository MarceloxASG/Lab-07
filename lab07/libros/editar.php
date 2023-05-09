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
    <link rel="stylesheet" href="styleEDIT.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Editar Libros</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar</h1>

        <table class="table table-striped table-hover">
        
        <tbody>
            <?php

                $libro_id = $libro['libro_id'];
                $nombres = $libro['anio'];
                $ape_paterno = $libro['autor'];
                $ape_materno = $libro['titulo'];
                $ape_materno = $libro['url'];
                $ape_materno = $libro['especialidad'];
                $ape_materno = $libro['editorial'];
            ?>

            <?php
            // Recorremos el array con los datos de los alumnos
            
            while ($libro = mysqli_fetch_array($resultado)) {
                
                ?>

                <form action="procesar_edit.php" method="POST">
                    <input type="hidden" value="<?php echo $libro['libro_id'] ?>" name="txtID">
                    <p>Año: </p>
                    <input type="text" value="<?php echo $libro['anio'] ?>" name="txtAño">
                    <p>Autor: </p>
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
                    <p class="mt-3">Titulo: </p>
                    <input type="text" value="<?php echo $libro['titulo'] ?>" name="txtTitulo">
                    <p>URL: </p>
                    <input type="text" value="<?php echo $libro['url'] ?>" name="txtUrl">
                    <p>Especialidad: </p>
                    <input type="text" value="<?php echo $libro['especialidad'] ?>" name="txtEspecialidad">
                    <p>Editorial: </p>
                    <input type="text" value="<?php echo $libro['editorial'] ?>" name="txtEditorial">
                
               
                <?php
            }

                ?>
    <input type="submit" value="ACTUALIZAR">
    </form>
        </tbody>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>