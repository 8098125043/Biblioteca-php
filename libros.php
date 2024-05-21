<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <link rel="stylesheet" href="./styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <h1 class="text-center p-2">Libros</h1>
    </header>
    <?php
    include "modelo/conexion.php";
    include "controlador/eliminar_libro.php";
    ?>
    <div class="container-fluid row">
        <form class="col-4" method="POST">
            <?php
            include "modelo/conexion.php";
            include "controlador/registrar_libros.php";
            ?>
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="titulo">
            </div>
            <div class="mb-3">
                <label for="autor_id" class="form-label">ID del Autor</label>
                <input type="text" class="form-control" id="autor_id" name="autor_id">
            </div>

            <div class="mb-3">
                <label for="categoria_id" class="form-label">ID de la Categoría</label>
                <input type="text" class="form-control" id="categoria_id" name="categoria_id">
            </div>
            <div class="mb-3">
                <label for="sinopsis" class="form-label">Sinopsis</label>
                <textarea class="form-control" id="sinopsis" name="sinopsis" rows="3"></textarea>
            </div>
            <button name="btnLibros" type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <div class="col-8 p-5 ">
            <table class="table" style="right: 100px">
                <thead>
                    <tr>
                        <th scope=" col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">ID del Autor</th>
                        <th scope="col">ID de la Categoría</th>
                        <th scope="col">Sinopsis</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "modelo/conexion.php";
                    $sql = $conexion->query("SELECT * FROM Libros");
                    while ($datos = $sql->fetch_object()) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $datos->id; ?></th>
                        <td><?php echo $datos->titulo; ?></td>
                        <td><?php echo $datos->autor_id; ?></td>
                        <td><?php echo $datos->categoria_id; ?></td>
                        <td><?php echo $datos->sinopsis; ?></td>
                        <td>

                            <a href="edit_libro.php?id=<?= $datos->id ?>"
                                class="btn btn-small btn-warning">Editar</a><br>
                            <br>
                            <a href="libros.php?id=<?= $datos->id ?>" class="btn btn-small btn-danger">Eliminar</a>
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