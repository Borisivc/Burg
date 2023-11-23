<?php
require_once("models/usuarios_model.php");

$user = new usuarios_model();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_form'])) {
    $correo = trim($_POST['correo']);
    $password = trim($_POST['password']);

    if (!empty($correo) && !empty($password)) {
        $usuario_valido = $user->validar_usuario($correo, $password);

        if ($usuario_valido) {
            header("Location: https://burg.cl/");
            exit();
        } else {
            $error_message = "Credenciales incorrectas.";
        }
    } else {
        $error_message = "Por favor, ingresa correo y contraseña.";
    }
}
?>
