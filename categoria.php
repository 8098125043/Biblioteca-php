<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link rel="stylesheet" href="./styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <h1 class="text-center p-3">Categorías</h1>
    </header>
    <?php
    include "modelo/conexion.php";
    include "controlador/eliminar_categoria.php";
    ?>

    <div class="container-fluid row">
        <form class="col-4" method="POST">
            <?php
            include "modelo/conexion.php";
            include "controlador/registrar_categoria.php";
            ?>
            <div class="mb-3">
                <label for="nombreC" class="form-label">Nombre de categoría</label>
                <input type="text" class="form-control" id="nombreC" name="nombreC" aria-describedby="nombreC">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion">
            </div>
            <button name="btnEC" type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <div class="col-8 p-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">DESCRIPCIÓN</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "modelo/conexion.php";
                    $sql = $conexion->query("SELECT * FROM Categorias");
                    while ($datos = $sql->fetch_object()) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $datos->id; ?></th>
                        <td><?php echo $datos->nombre; ?></td>
                        <td><?php echo $datos->descripcion; ?></td>
                        <td>
                            <a href="editar_cat.php?id=<?= $datos->id ?>" class="btn btn-small btn-warning">Editar</a>
                            <a href="categoria.php?id=<?= $datos->id ?>" class="btn btn-small btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>