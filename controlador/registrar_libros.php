<?php

if (isset($_POST["btnLibros"])) {

    include "modelo/conexion.php";


    $titulo = $_POST["titulo"];
    $autor_id = $_POST["autor_id"];
    $categoria_id = $_POST["categoria_id"];
    $sinopsis = $_POST["sinopsis"];

    if (!empty($titulo) && !empty($autor_id) && !empty($categoria_id) && !empty($sinopsis)) {

        $sql = "INSERT INTO Libros (titulo, autor_id,  categoria_id, sinopsis) VALUES ('$titulo', '$autor_id',  '$categoria_id', '$sinopsis')";


        if ($conexion->query($sql) === TRUE) {

            header("Location: libros.php");
            exit;
        } else {

            echo '<div class="alert alert-danger">Error al registrar el libro: ' . $conexion->error . '</div>';
        }
    } else {

        echo '<div class="alert alert-warning">Por favor completa todos los campos.</div>';
    }
}
