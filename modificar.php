<?php
include "modelo/conexion.php";

$ID =$_GET["id"];

$sql = $conexion->query(("select * from Autores where id = $ID"))

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Autor</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <header>
        <h1 class="text-center p-3">Autores</h1>
    </header>

    <form class="col-4 m-auto" method="POST">
        <h3>Actualizar Autor</h3>
        <?php
include "./controlador/modificarA.php" ;

while($dato =$sql->fetch_object()){?>

        <div class="mb-3">
            <label for="nombre-a" class="form-label">Nombre Autor</label>
            <input type="text" class="form-control" id="nombre-a" name="nA" aria-describedby="nombre-autor"
                value="<?= $dato->nombre ?>">
            <div id="nombreAutor" class="form-text">No dejar campos vacios.</div>
        </div>

        <div class="mb-3">
            <label for="Nacionalidad" class="form-label">Nacionalidad</label>
            <input type="text" class="form-control" id="nacionalidad" name="nacionalidad"
                value="<?= $dato->nacionalidad ?>">
        </div>

        <div class="mb-3">
            <label for="FechaN" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="FN" name="FN" value="<?= $dato->fecha_nacimiento ?>">
        </div>

        <?php
}

?>
        <button name="btnE" type="submit" class="btn btn-primary">Modificar</button>
    </form>


    <footer>
        <p>&copy; 2024 Biblioteca Virtual. Todos los derechos reservados.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>