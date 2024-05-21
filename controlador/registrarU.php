<?php

if(isset($_POST["user"])) {
  
    include "modelo/conexion.php";

    
    $nombre_usuario = $_POST["nombre_usuario"];
    $contraseña = $_POST["contraseña"];
    $correo_electronico = $_POST["correo_electronico"];

    if(!empty($nombre_usuario) && !empty($contraseña) && !empty($correo_electronico)) {
      
        $sql = "INSERT INTO Usuarios (nombre_usuario, contraseña, correo_electronico) VALUES ('$nombre_usuario', '$contraseña', '$correo_electronico')";

      
        if($conexion->query($sql) === TRUE) {
          
            header("Location: usuarios.php");
            exit;
        } else {
         
            echo '<div class="alert alert-danger">Error al registrar el usuario: ' . $conexion->error . '</div>';
        }
    } else {

        echo '<div class="alert alert-warning">Por favor completa todos los campos.</div>';
    }
}
?>