<?php
include "modelo/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnPrestamos"])) {
    // Validar campos del formulario
    $camposValidos = !empty($_POST["usuario_id"]) && !empty($_POST["libro_id"]) &&  !empty($_POST["fecha_prestamo"]) && !empty($_POST["fecha_devolucion"]);
    if ($camposValidos) {
        $usuario_id = $_POST["usuario_id"];
        $libro_id = $_POST["libro_id"];
        $fecha_prestamo = $_POST["fecha_prestamo"];
        $fecha_devolucion = $_POST["fecha_devolucion"];


        $query = $conexion->prepare("UPDATE Prestamos SET usuario_id=?, libro_id=?, fecha_prestamo=?, fecha_devolucion=? WHERE id=?");
        if ($query) {

            $ID = $_GET["id"];

            $query->bind_param("iissi", $usuario_id, $libro_id, $fecha_prestamo, $fecha_devolucion, $ID);
            $query->execute();


            if ($query->affected_rows > 0) {
                echo "<div class='alert alert-success'>Préstamo actualizado exitosamente</div>";

                header("refresh:1;url=prestamos.php");
                exit;
            } else {
                echo "<div class='alert alert-danger'>Error al actualizar el préstamo</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Error al preparar la consulta</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Por favor completa todos los campos</div>";
    }
}
