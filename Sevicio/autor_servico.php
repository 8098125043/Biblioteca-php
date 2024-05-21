<?php
class autor_servico {
    
    public static function getAll($con){
        return $con->query("select * from Autores");
    }

    public static function insertAutor($con, $nombre, $nacionalidad, $fecha){
        return $con->query("insert into Autores(nombre, nacionalidad, fecha_nacimiento) values ('$nombre', '$nacionalidad', '$fecha')");
    }
}

?>