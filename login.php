<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista con dos mitades</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container">
        <div class="izquierda">
            <h1>Bienvenido</h1>
            <img src="img/mesa_ayuda.jpg" alt="imagen mesa de ayuda">
        </div>
        <div class="derecha">
            <h2>Iniciar Sesión</h2>
            <form action="procesar_login.php">
                <div class="username">
                    <input type="text" name="usuario" placeholder="ingrese usuario">
                    <label>Usuario</label>
                    <div class="username">
                        <input type="password" name="usuario" placeholder="ingrese contraseña">
                        <label>Contrasena</label>

                        <input type="submit" value="Enviar">
                    </div>
            </form>
        </div>
    </div>
</body>

</html>