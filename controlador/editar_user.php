<?php
include "modelo/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user"])) {

    $camposValidos = !empty($_POST["nombre_usuario"]) && !empty($_POST["contraseña"]) &&  !empty($_POST["correo_electronico"]);
    if ($camposValidos) {
        $nombre_usuario = $_POST["nombre_usuario"];
        $contraseña = $_POST["contraseña"];
        $correo_electronico = $_POST["correo_electronico"];

        // Verificar si el parámetro "id" está presente y no está vacío en la URL
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            $ID = $_GET["id"];


            $query = $conexion->prepare("UPDATE Usuarios SET nombre_usuario=?, contraseña=?, correo_electronico=? WHERE id=?");
            if ($query) {
                $query->bind_param("sssi", $nombre_usuario, $contraseña,  $correo_electronico, $ID);
                $query->execute();


                if ($query->affected_rows > 0) {
                    echo "<div class='alert alert-success'>Datos modificados exitosamente</div>";
                    // Redireccionar después de una pausa breve
                    header("refresh:1;url=usuarios.php");
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
