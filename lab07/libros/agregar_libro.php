<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Obtenemos los valores del formulario
$año = $_POST['anio'];
$autor=$_POST['cmbAutor'];
$titulo = $_POST['titulo'];
$url = $_POST['url'];
$espec = $_POST['especialidad'];
$edit = $_POST['editorial'];

// Formamos la consulta SQL
$sql = "INSERT INTO libros (anio, autor, titulo, url, especialidad, editorial) VALUES ('$año', '$autor', '$titulo','$url','$espec','$edit')";

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
    <link rel="stylesheet" href="styleLibr.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Nuevo Libro</title>
</head>
<body>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h1>¡Nuevo libro añadido!</h1>
                    </div>
                    <div class="card-body">
                        <h3>
                            <?php

                            if (!$resultado) {
                                echo 'El libro no fue registrado';
                            }
                            else {
                                echo 'El libro ha sido registrado';
                            }

                            ?>
                        </h3>
                        <a href="libros.php" class="btn btn-primary btn-block">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
</body>
</html>