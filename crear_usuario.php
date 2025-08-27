<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación de usuario</title>
    <link rel="icon" href="img/Logo_Avance.png">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/crear_usuario.css">
</head>

<body>
    <div class="container">
        <h1>Creación de Usuario</h1>
        <form action="procesar_usuario.php" method="post">
            <div class="usuario">
                <input type="text" name="usuario" required>
                <label>Nombre de usuario</label>
                <i class='bxr  bx-user'></i>
            </div>
            <div class="usuario">
                <input type="password" name="contrasena" required>
                <label>Contraseña</label>
                <i class='bxr  bx-lock'></i>
            </div>
            <div class="usuario">
                <input type="email" name="correo" required>
                <label>Correo electrónico</label>
                <i class='bxr  bx-envelope-open'></i>
            </div>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>

</html>