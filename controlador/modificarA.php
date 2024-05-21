<?php
include "modelo/conexion.php";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnE"])) {
    if(!empty($_POST["nA"]) && !empty($_POST["nacionalidad"]) && !empty($_POST["FN"])) {
        $nombre = $_POST["nA"];
        $nacionalidad = $_POST["nacionalidad"];
        $fecha_nacimiento = $_POST["FN"];
        $ID = $_GET["id"]; 

       
        $query = "UPDATE Autores SET nombre='$nombre', nacionalidad='$nacionalidad', fecha_nacimiento='$fecha_nacimiento' WHERE id=$ID";
        $result = $conexion->query($query);

        if($result) {
            echo "<div class='alert alert-success'>Datos modificados exitosamente</div>";
            header("Location: autores.php"); 
            exit; 
        } else {
            echo "<div class='alert alert-danger'>Error al modificar los datos</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Estás introduciendo campos vacíos</div>";
    }
}
?>