<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamos</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <h1>Prestamos</h1>
    </header>
    <?php
    include "modelo/conexion.php";
    include "controlador/eliminar_prestamo.php";
    ?>

    <div class="container-fluid row">

        <form class="col-4" method="POST">
            <?php
            include "modelo/conexion.php";
            include "controlador/registro_prestamos.php";
            ?>
            <div class="mb-3">
                <label for="usuario_id" class="form-label">ID de Usuario</label>
                <input type="number" class="form-control" id="usuario_id" name="usuario_id"
                    aria-describedby="usuario_id">
            </div>
            <div class="mb-3">
                <label for="libro_id" class="form-label">ID de Libro</label>
                <input type="number" class="form-control" id="libro_id" name="libro_id">
            </div>
            <div class="mb-3">
                <label for="fecha_prestamo" class="form-label">Fecha de Préstamo</label>
                <input type="date" class="form-control" id="fecha_prestamo" name="fecha_prestamo">
            </div>
            <div class="mb-3">
                <label for="fecha_devolucion" class="form-label">Fecha de Devolución</label>
                <input type="date" class="form-control" id="fecha_devolucion" name="fecha_devolucion">
            </div>
            <button name="prestamo" type="submit" class="btn btn-primary">Registrar Préstamo</button>
        </form>
        <!-- Tabla que muestra los préstamos existentes -->
        <div class="col-8 p-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ID de Usuario</th>
                        <th scope="col">ID de Libro</th>
                        <th scope="col">Fecha de Préstamo</th>
                        <th scope="col">Fecha de Devolución</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    include "modelo/conexion.php";
                    $sql = $conexion->query("SELECT * FROM Prestamos");
                    while ($datos = $sql->fetch_object()) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $datos->id; ?></th>
                        <td><?php echo $datos->usuario_id; ?></td>
                        <td><?php echo $datos->libro_id; ?></td>
                        <td><?php echo $datos->fecha_prestamo; ?></td>
                        <td><?php echo $datos->fecha_devolucion; ?></td>
                        <td>
                            <a href="edit_prestamos.php ?id=<?= $datos->id ?>"
                                class="btn btn-small btn-warning">Editar</a>
                            <a href="prestamos.php?id=<?= $datos->id ?>" class="btn btn-small btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>