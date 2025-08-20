<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="img/Logo_Avance.png" type="image/png">
</head>

<body>
    <div class="container">
        <div class="izquierda">
            <img src="img/mesa_ayuda.jpg" alt="imagen mesa de ayuda">
        </div>
        <div class="derecha">
            <h2>Iniciar Sesión</h2>
            <form action="procesar_login.php" method="post">
                <div class="username">
                    <input type="text" name="usuario" placeholder="Ingrese su usuario" required>
                    <label>Usuario</label>
                </div>

                <div class="username">
                    <input type="password" name="contrasena" placeholder="Ingrese su contraseña" required>
                    <label>Contraseña</label>
                </div>

                <input type="submit" value="Enviar">
            </form>

        </div>
    </div>
</body>

</html>