<?php
// Verificar si se ha enviado el formulario
if(isset($_POST["btnEC"])) {
    // Incluir el archivo de conexión a la base de datos
    include "modelo/conexion.php";

    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];

    // Verificar si los campos no están vacíos
    if(!empty($nombre) && !empty($descripcion)) {
        // Preparar la consulta SQL para insertar la categoría
        $sql = "INSERT INTO Categorias (nombre, descripcion) VALUES ('$nombre', '$descripcion')";

        // Ejecutar la consulta
        if($conexion->query($sql) === TRUE) {
            // Redireccionar a la página de categorías
            header("Location: categoria.php");
            exit;
        } else {
            // Mostrar mensaje de error si la consulta falla
            echo '<div class="alert alert-danger">Error al registrar la categoría: ' . $conexion->error . '</div>';
        }
    } else {
        // Mostrar mensaje si hay campos vacíos
        echo '<div class="alert alert-warning">Por favor completa todos los campos.</div>';
    }
}
?>