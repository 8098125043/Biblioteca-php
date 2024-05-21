<?php
include "modelo/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnLibros"])) {
    // Validar campos del formulario
    $camposValidos = !empty($_POST["titulo"]) && !empty($_POST["autor_id"]) &&  !empty($_POST["categoria_id"]) && !empty($_POST["sinopsis"]);
    if ($camposValidos) {
        $titulo = $_POST["titulo"];
        $autor_id = $_POST["autor_id"];
        $categoria_id = $_POST["categoria_id"];
        $sinopsis = $_POST["sinopsis"];

        // Verificar si el parámetro "id" está presente y no está vacío en la URL
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            $ID = $_GET["id"];

            // Preparar y ejecutar la actualización
            $query = $conexion->prepare("UPDATE Libros SET titulo=?, autor_id=?,  categoria_id=?, sinopsis=? WHERE id=?");
            if ($query) {
                $query->bind_param("sissi", $titulo, $autor_id,  $categoria_id, $sinopsis, $ID);
                $query->execute();

                // Verificar si la consulta se ejecutó correctamente
                if ($query->affected_rows > 0) {
                    echo "<div class='alert alert-success'>Datos modificados exitosamente</div>";
                    // Redireccionar después de una pausa breve
                    header("refresh:1;url=libros.php");
                    exit;
                } else {
                    echo "<div class='alert alert-danger'>Error al modificar los datos</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Error al preparar la consulta</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>No se proporcionó un ID válido</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Estás introduciendo campos vacíos</div>";
    }
}
