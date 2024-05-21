<?php include "modelo/conexion.php";
$ID = $_GET["id"];
$sql = $conexion->query(("select * from Categorias where id = $ID"))

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
        <h1 class="text-center p-3">Categorias</h1>
    </header>

    <form class="col-4 m-auto" method="POST">
        <h3>Actualizar Categorias</h3>
        <?php
        include "./controlador/editar_categoria.php";

        while ($dato = $sql->fetch_object()) { ?>

            <div class="mb-3">
                <label for="nombreC" class="form-label">Nombre Categoria</label>
                <input type="text" class="form-control" id="nombreC" name="nombre" aria-describedby="nombre-autor" value="<?= $dato->nombre ?>">
                <div id="nombreCategoria" class="form-text">No dejar campos vacios.</div>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $dato->descripcion ?>">
            </div>

        <?php
        }

        ?>
        <button name="btnEC" type="submit" class="btn btn-primary">Modificar</button>
    </form>


    <footer>
        <p>&copy; 2024 Biblioteca Virtual. Todos los derechos reservados.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>