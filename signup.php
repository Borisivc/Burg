<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Form</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <div id="signup-container">
        <h2>Registro de Usuario</h2>
        <form method="post" action="" name="signup-form">
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
