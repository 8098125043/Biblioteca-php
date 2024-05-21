<?php

if (isset($_POST["btnEC"])) {

    if (!empty($_POST["nombreC"]) && !empty($_POST["descripcion"])) {

        // Obtener los datos del formulario
        $nombre = $_POST["nombreC"];
        $descripcion = $_POST["descripcion"];

        $query = "INSERT INTO Categorias (nombre, descripcion) VALUES ('$nombre', '$descripcion')";

        $sql = $conexion->query($query);

        if ($sql == 1) {
            echo '<div class="alert alert-success">Autor Registrado</div>';

            // Redirigir al usuario después de mostrar el mensaje
            header("Location: categoria.php");
            exit; // Terminar la ejecución del script después de la redirección

        } else {
            echo '<div class="alert alert-danger">No se ha Registrado</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Algun campo quedo vacio</div>';
    }
}

?>