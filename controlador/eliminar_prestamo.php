<?php
include "modelo/conexion.php";


if (!empty($_GET["id"])) {
    $ID = $_GET["id"];

    $sql = $conexion->query(("delete from Prestamos where id = $ID"));

    if ($sql == 1) {
        echo "<div class='alert alert-success'>Datos eliminados exitosamente</div>";
    } else {
        echo "<div class='alert alert-success'>Error al eliminar autor</div>";
    }
}
