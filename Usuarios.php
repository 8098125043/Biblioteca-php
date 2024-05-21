<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>
    <header>
        <h1>Usuarios</h1>
    </header>


    <div class="container-fluid row">
        <form class="col-4" method="POST">
            <div class="mb-3">
                <label for="nombre_usuario" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario"
                    aria-describedby="nombre_usuario">
            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña">
            </div>
            <div class="mb-3">
                <label for="correo_electronico" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo_electronico" name="correo_electronico">
            </div>
            <button name="user" type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <div class="col-8 p-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE DE USUARIO</th>
                        <th scope="col">CONTRASEÑA</th>
                        <th scope="col">CORREO ELECTRÓNICO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            include "modelo/conexion.php";
            $sql = $conexion->query("SELECT * FROM Usuarios");
            while ($datos = $sql->fetch_object()) {
            ?>
                    <tr>
                        <th scope="row"><?php echo $datos->id; ?></th>
                        <td><?php echo $datos->nombre_usuario; ?></td>
                        <td><?php echo $datos->contraseña; ?></td>
                        <td><?php echo $datos->correo_electronico; ?></td>
                        <td>
                            <a href="editar_usuarios.php?id=<?= $datos->id ?>"
                                class="btn btn-small btn-warning">Editar</a>
                            <a href="eliminar_usuarios.php?id=<?= $datos->id ?>"
                                class="btn btn-small btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>



    </div>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>