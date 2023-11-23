<?php
class Conectar {
    public static function conexion() {
        $conexion = new mysqli("localhost", "borisivc", "77454419", "burg_test");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>
