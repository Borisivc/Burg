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
        <form method="post" action="https://burg.cl/" name="signin-form">
            <div class="form-element">
                <label>Email</label>
                <input type="email" name="correo" required />
            </div>
            <div class="form-element">
                <label>Password</label>
                <input type="password" name="password" required />
            </div>
            <div class="button-container">
                <button type="submit" name="login" value="login">Log In</button>
                <a href="signup.php"><button type="button">Sign Up</button></a>
            </div>
        </form>
    </div>
</body>

</html>
