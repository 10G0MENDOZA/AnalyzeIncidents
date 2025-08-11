<!DOCTYPE html>
<html>

<head>
    <title>Administrador</title>
    <link rel="stylesheet" href="Administrador-style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="images/Logovertical.jpg" type="image/jpg">
    <link rel="stylesheet" href="css/administrador.css">
</head>
<body>
    <div class="container">
        <div class="login-content">
            <!-- Opciones ocultas por defecto -->
            <div class="options" id="options">
                <a href="quejas.php">Ver  quejas registradas</a>

            </div>

            <!-- Botón o ícono para mostrar opciones -->
            <button id="show-options-button" onclick="toggleOptions()"><i class='bx bx-down-arrow'></i></button>
        </div>
    </div>

    <script>
    // Función para alternar la visibilidad de las opciones
    function toggleOptions() {
        var options = document.getElementById('options');
        if (options.style.display === 'block') {
            options.style.display = 'none';
        } else {
            options.style.display = 'block';
        }
    }
    </script>
</body>

</html>