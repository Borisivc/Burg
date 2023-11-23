<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <div id="signup-container">
        <h2>Registro de Usuario</h2>
        
        <?php
        // Manejar el registro cuando se envía el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
            // Obtener los datos del formulario
            $nombre = trim($_POST['nombre']);
            $apellido = trim($_POST['apellido']);
            $correo = trim($_POST['correo']);
            $password = trim($_POST['password']);
            $confirm_password = trim($_POST['confirm_password']);

            // Validar los datos (puedes agregar más validaciones según tus necesidades)

            // Verificar si la contraseña y la confirmación coinciden
            if ($password != $confirm_password) {
                $error_message = "La contraseña y la confirmación no coinciden.";
            } else {
                // Crear una instancia del modelo de usuarios
                require_once("models/usuarios_model.php");
                $user = new usuarios_model();

                // Verificar si el correo ya está registrado
                if ($user->correo_existente($correo)) {
                    $error_message = "El correo proporcionado ya está registrado.";
                } else {
                    // Hash de la contraseña antes de almacenarla en la base de datos
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    // Llamar a la función del modelo para agregar el nuevo usuario
                    if ($user->registrar_usuario($nombre, $apellido, $correo, $hashed_password)) {
                        // Redirigir a la página de bienvenida o a donde sea apropiado
                        header("Location: welcome.php");
                        exit();
                    } else {
                        $error_message = "Error al registrar el usuario. Por favor, inténtalo de nuevo.";
                    }
                }
            }
        }
        ?>

        <!-- Mostrar mensajes de error si los hay -->
        <?php if (isset($error_message)) : ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <!-- Formulario de registro -->
        <form method="post" action="signup.php" name="signup-form">
            <div class="form-element">
                <label>Nombre</label>
                <input type="text" name="nombre" required />
            </div>
            <div class="form-element">
                <label>Apellido</label>
                <input type="text" name="apellido" required />
            </div>
            <div class="form-element">
                <label>Email</label>
                <input type="email" name="correo" required />
            </div>
            <div class="form-element">
                <label>Password</label>
                <input type="password" name="password" required />
            </div>
            <div class="form-element">
                <label>Confirmar Password</label>
                <input type="password" name="confirm_password" required />
            </div>
            <div class="button-container">
                <button type="submit" name="signup" value="signup">Registrarse</button>
                <a href="login.php"><button type="button">Volver</button></a>
            </div>
        </form>
    </div>
</body>

</html>
