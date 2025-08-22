<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación de usuario</title>
    <link rel="icon" href="img/Logo_Avance.png">
    <link rel="stylesheet" href="css/crear_usuario.css">
</head>

<body>
    <div class="container">
        <h1>Creación de Usuario</h1>
        <form action="procesar_usuario.php" method="post">
            <div class="usuario">
                <input type="text" name="usuario" required>
                <label>Nombre de usuario</label>
            </div>
            <div class="usuario">
                <input type="password" name="contrasena" required>
                <label>Contraseña</label>
            </div>
            <div class="usuario">
                <input type="email" name="correo" required>
                <label>Correo electrónico</label>
            </div>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>

</html>
