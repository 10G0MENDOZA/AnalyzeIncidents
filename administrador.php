<!DOCTYPE html>
<html>

<head>
    <title>Administrador</title>
    <link rel="stylesheet" href="css/administrador.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/Logo_Avance.png" type="image/jpg">
    <link rel="stylesheet" href="css/administrador.css">
</head>

<body>
    <div class="container">
        <div class="login-content">
            <!-- Opciones ocultas por defecto -->
            <div class="options" id="options">
                <a href="peticiones.php">Ver incidentes registrados</a>
                <a href="soluciones.php">Ver Soluciones Registradas</a>

            </div>

            <!-- Botón o ícono para mostrar opciones -->
            <button id="show-options-button" onclick="toggleOptions()"><i class='bx bx-down-arrow'></i></button>
        </div>
    </div>

    <script src="js/administrador.js"></script>
</body>

</html>