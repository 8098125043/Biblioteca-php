<?php


if (isset($_POST["btnE"])) {

    if (!empty($_POST["nA"]) && !empty($_POST["nacionalidad"]) && !empty($_POST["FN"])) {

        $nombre = $_POST["nA"];
        $nacionalidad = $_POST["nacionalidad"];
        $fecha_de_nacimiento = $_POST["FN"];

        $sql = $conexion->query("insert into Autores(nombre, nacionalidad, fecha_nacimiento) values ('$nombre', '$nacionalidad', '$fecha_de_nacimiento')");

        if ($sql == 1) {

            echo '<div class="alert alert-success">Autor Registrado</div>';

            // Redirigir al usuario después de mostrar el mensaje
            header("Location: autores.php");
            exit; // Terminar la ejecución del script después de la redirección

        } else {
            echo '<div class="alert alert-danger">No se ha Registrado</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Algun campo quedo vacio</div>';
    }
}
