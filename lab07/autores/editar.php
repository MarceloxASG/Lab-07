<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();


$Id=$_GET["id"];

// Consulta SQL
$sql = "SELECT * FROM autores where autor_id='$Id'";

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
    <link rel="stylesheet" href="styleEDI.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Autores</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar</h1>

        <table class="table table-striped table-hover">
        
        <tbody>
            <?php

                $alumno_id = $alumno['autor_id'];
                $nombres = $alumno['nombres'];
                $ape_paterno = $alumno['ape_paterno'];
                $ape_materno = $alumno['ape_materno'];
            ?>

            <?php
            // Recorremos el array con los datos de los alumnos
            
            while ($alumno = mysqli_fetch_array($resultado)) {
                
                ?>

                <form action="procesar_edit.php" method="POST">
                    <input type="hidden" value="<?php echo $alumno['autor_id'] ?>" name="txtID">
                    <p>Nombre: </p>
                    <input type="text" value="<?php echo $alumno['nombres'] ?>" name="txtNombre">
                    <p>Apellido paterno: </p>
                    <input type="text" value="<?php echo $alumno['ape_paterno'] ?>" name="txtApe_paterno">
                    <p>Apellido materno: </p>
                    <input type="text" value="<?php echo $alumno['ape_materno'] ?>" name="txtApe_materno">
                
               
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