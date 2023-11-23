<?php
require_once("db/db.php");
require_once("controllers/usuarios_controller.php");

if (isset($_POST['login_form'])) {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $usuario_valido = $user->validar_usuario($correo, $password);

    if ($usuario_valido) {
        header("Location: welcome.php");
        exit();
    } else {
        $error_message = "Credenciales incorrectas.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <div id="login-container">
        <h2>Login de Usuario</h2>

        <!-- Muestra el mensaje de error si existe -->
        <?php if (!empty($error_message)) : ?>
            <div class="message-container error-message">
                <p><?php echo $error_message; ?></p>
            </div>
        <?php endif; ?>

        <form method="post" action="login.php" name="signin-form">
            <div class="form-element">
                <label>Email</label>
                <input type="email" name="correo" required />
            </div>
            <div class="form-element">
                <label>Password</label>
                <input type="password" name="password" required />
            </div>
            <div class="button-container">
                <button type="submit" name="login_form" value="1">Log In</button>
                <a href="signup.php"><button type="button">Sign Up</button></a>
            </div>
        </form>

        <!-- Muestra el mensaje de registro exitoso si existe -->
        <?php if (isset($_GET['registro_exitoso']) && $_GET['registro_exitoso'] == 'true') : ?>
            <div class="message-container success-message">
                <p>Registro exitoso. Redirigiendo al inicio de sesión...</p>
                <script>
                    setTimeout(function () {
                        window.location.href = "login.php";
                    }, 3000);
                </script>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
