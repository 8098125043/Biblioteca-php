<?php
include "modelo/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnEC"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["descripcion"])) {
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];

        // Verificar si el parámetro "id" está presente y no está vacío en la URL
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            $ID = $_GET["id"];

            $query = $conexion->prepare("UPDATE Categorias SET nombre=?, descripcion=? WHERE id=?");
            $query->bind_param("ssi", $nombre, $descripcion, $ID);
            $query->execute();

            if ($query->affected_rows > 0) {
                echo "<div class='alert alert-success'>Datos modificados exitosamente</div>";
                // Redireccionar después de una pausa breve
                header("refresh:2;url=categoria.php");
                exit;
            } else {
                echo "<div class='alert alert-danger'>Error al modificar los datos</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>No se proporcionó un ID válido</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Estás introduciendo campos vacíos</div>";
    }
}
