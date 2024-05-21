<?php
include "modelo/conexion.php";

// Verificar si el ID está presente en la URL
if (isset($_GET["id"])) {
    $ID = $_GET["id"];

    // Consultar la base de datos para obtener los datos del préstamo con el ID proporcionado
    $sql = $conexion->query("SELECT * FROM Prestamos WHERE id = $ID");
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar Usuario</title>
        <link rel="stylesheet" href="styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>
        <header>
            <h1 class="text-center p-3">Usuarios</h1>
        </header>

        <form class="col-4 m-auto" method="POST">
            <h3>Actualizar Usuario</h3>
            <?php
            include "modelo/conexion.php";
            include "./controlador/editar_prestamos.php";

            // Mostrar el formulario si se encontró el préstamo en la base de datos
            while ($dato = $sql->fetch_object()) { ?>

                <div class="mb-3">
                    <label for="usuario-id" class="form-label">ID Usuario</label>
                    <input type="text" class="form-control" id="usuario-id" name="usuario_id" aria-describedby="id-usuario" value="<?= $dato->usuario_id ?>">
                    <div id="idUsuario" class="form-text">Ingresa el ID del usuario.</div>
                </div>

                <div class="mb-3">
                    <label for="libro-id" class="form-label">ID Libro</label>
                    <input type="text" class="form-control" id="libro-id" name="libro_id" aria-describedby="id-libro" value="<?= $dato->libro_id ?>">
                    <div id="idLibro" class="form-text">Ingresa el ID del libro.</div>
                </div>

                <div class="mb-3">
                    <label for="fecha-prestamo" class="form-label">Fecha de préstamo</label>
                    <input type="date" class="form-control" id="fecha-prestamo" name="fecha_prestamo" value="<?= $dato->fecha_prestamo ?>">
                </div>

                <div class="mb-3">
                    <label for="fecha-devolucion" class="form-label">Fecha de devolución</label>
                    <input type="date" class="form-control" id="fecha-devolucion" name="fecha_devolucion" value="<?= $dato->fecha_devolucion ?>">
                </div>

            <?php } ?>

            <button name="btnPrestamos" type="submit" class="btn btn-primary">Modificar</button>
        </form>

        <footer>
            <p>&copy; 2024 Biblioteca Virtual. Todos los derechos reservados.</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    </body>

    </html>
<?php } ?>