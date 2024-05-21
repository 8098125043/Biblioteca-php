<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <h1 class="text-center p-3">Autores</h1>

    </header>
    <?php
    include "modelo/conexion.php";
    include "controlador/eliminarP.php";
    ?>
    <div class="container-fluid row">

        <form class="col-4" method="POST">

            <h3>Registro Autores</h3>

            <?php
            include "modelo/conexion.php";
            include "controlador/registroAutores.php";
            ?>

            <div class="mb-3">
                <label for="nombre-a" class="form-label">Nombre Autor</label>
                <input type="text" class="form-control" id="nombre-a" name="nA" aria-describedby="nombre-autor">
                <div id="nombreAutor" class="form-text">No dejar campos vacios.</div>
            </div>

            <div class="mb-3">
                <label for="Nacionalidad" class="form-label">Nacionalidad</label>
                <input type="text" class="form-control" id="nacionalidad" name="nacionalidad">
            </div>

            <div class="mb-3">
                <label for="FechaN" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="FN" name="FN">
            </div>


            <button name="btnE" type="submit" class="btn btn-primary">Enviar</button>
        </form>


        <div class="col-8 p-4">
            <table class="table">


                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">NACIONALIDAD</th>
                    <th scope="col">FECHA DE NACIMIENTO</th>
                    <th></th>
                </tr>

                <tbody>
                    <?php
                    include "modelo/conexion.php";
                    include "Sevicio/autor_servico.php";


                    $sql = autor_servico::getAll($conexion);
                    // $sql = $conexion->query("select * from Autores");

                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <th scope="row"><?php echo $datos->id; ?></th>
                            <td><?php echo $datos->nombre; ?></td>
                            <td><?php echo $datos->nacionalidad; ?></td>
                            <td><?php echo $datos->fecha_nacimiento; ?></td>
                            <td>
                                <a href="modificar.php?id=<?= $datos->id ?>" class="btn btn-small btn-warning">Edit</a>
                                <a href="autores.php?id=<?= $datos->id ?>" class="btn btn-small btn-warning">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>


                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Biblioteca Virtual. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>