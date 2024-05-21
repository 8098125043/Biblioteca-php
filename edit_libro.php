<?php include "modelo/conexion.php";
$ID = $_GET["id"];
$sql = $conexion->query(("select * from Libros where id = $ID"))

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Categoria</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <header>
        <h1 class="text-center p-3">Libros</h1>
    </header>

    <form class="col-6 m-auto" method="POST" style="height: 800px;">
        <h3 style="color: white">Actualizar Libros</h3>
        <?php
        include "./controlador/editar_libros.php";

        while ($dato = $sql->fetch_object()) { ?>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="titulo-libro" value="<?= $dato->titulo ?>">
                <div id="tituloLibro" class="form-text">No dejar campos vacíos.</div>
            </div>

            <div class="mb-3">
                <label for="autor_id" class="form-label">ID del Autor</label>
                <input type="number" class="form-control" id="autor_id" name="autor_id" value="<?= $dato->autor_id ?>">
            </div>


            <div class="mb-3">
                <label for="categoria_id" class="form-label">ID de la Categoría</label>
                <input type="number" class="form-control" id="categoria_id" name="categoria_id" value="<?= $dato->categoria_id ?>">
            </div>

            <div class="mb-3">
                <label for="sinopsis" class="form-label">Sinopsis</label>
                <textarea class="form-control" id="sinopsis" name="sinopsis" rows="3"><?= $dato->sinopsis ?></textarea>
            </div>


        <?php
        }

        ?>
        <button name="btnLibros" type="submit" class="btn btn-primary">Actualizar</button>
    </form>


    <footer>
        <p>&copy; 2024 Biblioteca Virtual. Todos los derechos reservados.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>