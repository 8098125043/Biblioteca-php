<?php
include "modelo/conexion.php";

$ID = $_GET["id"];

$sql = $conexion->query("SELECT * FROM Usuarios WHERE id = $ID");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <header>
        <h1 class="text-center p-3">Usuarios</h1>
    </header>

    <form class="col-4 m-auto" method="POST">
        <h3>Actualizar Usuario</h3>
        <?php
        include "./controlador/editar_user.php";

        while ($dato = $sql->fetch_object()) { ?>

        <div class="mb-3">
            <label for="nombre-u" class="form-label">Nombre Usuario</label>
            <input type="text" class="form-control" id="nombre-u" name="nombre_usuario"
                aria-describedby="nombre-usuario" value="<?= $dato->nombre_usuario ?>">
            <div id="nombreUsuario" class="form-text">No dejar campos vacios.</div>
        </div>

        <div class="mb-3">
            <label for="contraseña" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="contraseña" name="contraseña"
                value="<?= $dato->contraseña ?>">
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo_electronico"
                value="<?= $dato->correo_electronico ?>">
        </div>

        <?php
        }

        ?>
        <button name="user" type="submit" class="btn btn-primary">Modificar</button>
    </form>


    <footer>
        <p>&copy; 2024 Biblioteca Virtual. Todos los derechos reservados.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>