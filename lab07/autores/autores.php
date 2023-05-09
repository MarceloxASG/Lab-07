<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Consulta SQL
$sql = 'SELECT autor_id, nombres, ape_paterno, ape_materno FROM autores';

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
    <link rel="stylesheet" href="styleAUT.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Autores</title>
</head>
<body class="mt-4">
<div class="container">
    <h1 class="text-center">Autores</h1>

    <a href="agregar.html" class="btn btn-warning mb-3" style="font-size: 18px; padding: 10px; margin-top:12px">Nuevo autor</a>


    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $autor_id = $autor['autor_id'];
                $nombres = $autor['nombres'];
                $ape_paterno = $autor['ape_paterno'];
                $ape_materno = $autor['ape_materno'];
            ?>

            <?php
            // Recorremos el array con los datos de los alumnos
            while ($autor = mysqli_fetch_array($resultado)) {
                
                ?>

            <tr style="vertical-align: middle">
                <td style="font-size:18px"><?php echo $autor['autor_id'] ?></td>
                <td style="font-size:18px"><?php echo $autor['nombres'] ?></td>
                <td style="font-size:18px"><?php echo $autor['ape_paterno'] ?></td>
                <td style="font-size:18px"><?php echo $autor['ape_materno'] ?></td>

                <td style="font-size:17px; display: flex; align-items: center">
                    <!---Editar--->
                    <a class="btn" style="font-size:16px; margin-top:7px" href="editar.php?id=<?php echo $autor['autor_id'] ?>">Editar</a>

                    <!---Eliminar--->
                    <form action="eliminar.php" method="post">
                        <button style="margin-left:50%" type="submit" value="<?php echo $autor['autor_id']?>" name="txtID">Eliminar
                    </form>
                </td>
            
            </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
    <a href="../index.html" class="btn btn-primary btn-block" style="font-size: 18px; padding: 10px; margin-top:10px">Volver</a>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>