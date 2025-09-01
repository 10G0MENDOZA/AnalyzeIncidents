<!DOCTYPE html>
<html>

<head>
    <title>Administrador</title>
    <link rel="stylesheet" href="css/administrador.css">
    <link rel="icon" href="img/Logo_Avance.png" type="image/jpg">
</head>

<body>
    <div class="container">
        <div class="login-content">
            <!-- Opciones ocultas por defecto -->
            <div class="options" id="options">
                <a href="peticiones.php">Ver incidentes registrados</a>
                <a href="registros.php">Ver Soluciones Registradas</a>
                <a href="crear_usuario.php">Cerrar Sesión</a>
            </div>

            <nav id="navbar-links" class="navbar-links">
                <button id="botn-menu" class="menu-toggle" onclick="toggleMenu(); Desaparecerfoto();">
                    <img id="imagen-responsive" src="img/icons_menu.png" alt="Imagen" class="img-menu">
                </button>
            </nav>
        </div>
    </div>
    <script src="js/ocultar.menu.js"></script>
</body>

</html>