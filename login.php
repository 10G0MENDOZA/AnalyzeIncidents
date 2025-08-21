<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="img/Logo_Avance.png" type="image/png">
</head>

<body>
    <div class="container">
        <div class="izquierda">
            <video autoplay muted loop playsinline>
                <source src="../video/video_fondo.mp4" type="video/mp4">
                Tu navegador no soporta el video.
            </video>
        </div>
        <div class="derecha">
            <h2 id="maquina"></h2>
            <form action="procesar_login.php" method="post">
                <div class="username">
                    <input type="text" name="usuario" required>

                    <label>Usuario</label>
                </div>

                <div class="username">
                    <input type="password" name="contrasena" required>
                    <label>Contraseña</label>
                </div>

                <input type="submit" value="Entrar">
            </form>

        </div>
    </div>
    <script src="js/login.js"></script>
</body>

</html>