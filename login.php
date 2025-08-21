<?php
session_start(); // Inicia la sesión para acceder a $_SESSION
$error = "";

// Verificar si existe un mensaje de error en la sesión
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error']; // Se asigna el mensaje de error
    unset($_SESSION['error']); // Limpiamos la sesión para evitar que persista en siguientes peticiones
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
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
                    <i class='bx bx-user'></i>
                    <label>Usuario</label>
                </div>

                <div class="username" style="position: relative;">
                    <input type="password" id="contrasena" name="contrasena" required>
                    <i class="bx bx-lock"></i>
                    <label>Contraseña</label>
                    <span class="toggle-password" onclick="togglePassword()">
                        <i id="eyeIcon" class="bx bx-show"></i>
                    </span>
                </div>

                <!-- Aquí mostramos el mensaje de error si existe -->
                <?php if (!empty($error)): ?>
                    <div class="error-msg" id="error-box">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <input type="submit" value="Entrar">
            </form>
        </div>
    </div>

    <script src="js/login.js"></script>
    <script src="js/ver_contraseña.js"></script>
    <script src="js/verificar_contraseña.js"></script>
</body>

</html>