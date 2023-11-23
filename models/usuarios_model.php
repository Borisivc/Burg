<?php
require_once "db/db.php";

class usuarios_model 
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function validar_usuario($correo, $password)
    {
        $consulta = $this->db->prepare("SELECT pass FROM usuarios WHERE email = ?");
        $consulta->bind_param("s", $correo);

        if ($consulta->execute()) {
            $resultado = $consulta->get_result();

            if ($resultado->num_rows === 1) {
                $usuario = $resultado->fetch_assoc();
                $hashContrasena = $usuario['pass'];

                // Validamos la contraseña sin encriptar
                if ($password == $hashContrasena) {
                    return true;
                } else {
                    error_log("Error: La verificación de contraseña no coincide. Correo: $correo");
                }
            } else {
                error_log("Error: No se encontró ninguna fila con el correo proporcionado. Correo: $correo");
            }
        } else {
            error_log("Error al ejecutar la consulta de validación de usuario. Correo: $correo");
        }

        return false;
    }
}
?>
