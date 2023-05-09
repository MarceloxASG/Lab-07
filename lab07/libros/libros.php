<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Consulta SQL
$sql = 'SELECT libro_id, anio, autor, titulo, url, especialidad, editorial FROM libros';

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
    <link rel="stylesheet" href="styleLIB.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Libros</title>
</head>
<body class="mt-4">
<div class="container">
    <h1 class="text-center">Libros</h1>

    <a href="agregar.php" class="btn btn-warning mb-3" style="font-size: 18px; padding: 10px; margin-top:12px">Nuevo libro</a>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Año</th>
                <th>Autor</th>
                <th>Título</th>
                <th>URL</th>
                <th>Especialidad</th>
                <th>Editorial</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
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
            // Recorremos el array con los datos de los libros
            while ($libro = mysqli_fetch_array($resultado)) {
                
                ?>

            <tr style="vertical-align: middle">
                <td><?php echo $libro['libro_id'] ?></td>
                <td><?php echo $libro['anio'] ?></td>
                <td><?php echo $libro['autor'] ?></td>
                <td><?php echo $libro['titulo'] ?></td>
                <td ><a class="btn btn-primary btn-block" href="<?php echo $libro['url'] ?>">Leer Libro</a></td>
                <td><?php echo $libro['especialidad'] ?></td>
                <td><?php echo $libro['editorial'] ?></td>

                <td>
                    <!---Editar--->
                    <a class="btn" href="editar.php?id=<?php echo $libro['libro_id'] ?>">Editar</a>

                    <!---Eliminar--->
                    <form action="eliminar.php" method="post">
                        <button type="submit" value="<?php echo $libro['libro_id']?>" name="txtID">Eliminar
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