<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="img/Logo_Avance.png">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form method="post" action="procesar_login.php">
        <i class='bx bxs-user'></i>
            <input type="text" name="usuario" placeholder="Usuario" required><br>
            <i class='bx bxs-lock-alt'></i>
            <input type="password" name="contrasena" placeholder="Contraseña" required><br>
            <input type="submit" value="Ingresar">
        </form>
    </div>
</body>
</html>
