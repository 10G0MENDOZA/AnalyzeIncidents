<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion de usuario</title>
    <link rel="icon" href="img/Logo_Avance.png">
    <link rel="stylesheet" href="css/crear_usuario.css">
</head>

<body>
    <div class="container">
        <h1>Creacion de Usuario</h1>
        <form action="procesar_usuario.php" method="post">
            <div class="usuario">
                <input type="text" name="usuario">
                <label>Nombre del usuario</label>
            </div>
            <div class="usuario">
                <input type="password" name="contrasena">
                <label>Contraseña del usuario </label>
            </div>
            <input type="submit" value="Enviar">
        </form>
    </div>

</body>

</html>