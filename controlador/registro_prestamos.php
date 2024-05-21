<?php
// Verificar si se ha enviado el formulario
if (isset($_POST["prestamo"])) {
    include "modelo/conexion.php";

    // Obtener los datos del formulario
    $usuario_id = $_POST["usuario_id"];
    $libro_id = $_POST["libro_id"];
    $fecha_prestamo = $_POST["fecha_prestamo"];
    $fecha_devolucion = $_POST["fecha_devolucion"];

    // Verificar si los campos no están vacíos
    if (!empty($usuario_id) && !empty($libro_id) && !empty($fecha_prestamo) && !empty($fecha_devolucion)) {
        // Verificar si el usuario y el libro existen en la base de datos
        $usuario_existente = $conexion->query("SELECT * FROM Usuarios WHERE id = $usuario_id")->num_rows;
        $libro_existente = $conexion->query("SELECT * FROM Libros WHERE id = $libro_id")->num_rows;

        // Si tanto el usuario como el libro existen, insertar el préstamo
        if ($usuario_existente > 0 && $libro_existente > 0) {
            $sql = "INSERT INTO Prestamos (usuario_id, libro_id, fecha_prestamo, fecha_devolucion) VALUES ($usuario_id, $libro_id, '$fecha_prestamo', '$fecha_devolucion')";

            if ($conexion->query($sql) === TRUE) {
                header("Location: prestamos.php");
                echo '<div class="alert alert-success">Préstamo registrado exitosamente.</div>';
                exit;
            } else {
                echo '<div class="alert alert-danger">Error al registrar el préstamo: ' . $conexion->error . '</div>';
            }
        } else {
            echo '<div class="alert alert-warning">El ID de usuario o libro proporcionado no es válido.</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Por favor completa todos los campos.</div>';
    }
}
