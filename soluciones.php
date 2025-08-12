<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soluciones</title>
    <link rel="icon" href="img/Logo_Avance.png">
    <link rel="stylesheet" href="css/soluciones.css">
</head>

<body>
    <div class="soluciones-container">
        <?php
        require_once("bd.php");
        // Consulta SQL para obtener los problemas y soluciones de la base de datos
        $sql = "SELECT id, nombre, inconveniente FROM quejas";
        $result = $conexion->query($sql);

        // Verificar si se encontraron resultados
        if ($result->num_rows > 0) {
            // Mostrar los problemas y proporcionar una caja de texto para la solución
            while ($row = $result->fetch_assoc()) {
                echo "<div class='problema'>";
                echo "<h3>" . $row["nombre"] . "</h3>";
                echo "<p>" . $row["inconveniente"] . "</p>";
                echo "<textarea id='solucion-" . $row["id"] . "' class='solucion' placeholder='Escribe la solución aquí'></textarea>";
                echo "<input type='checkbox' id='check-" . $row["id"] . "' class='check-solucion'>"; // Checkbox para marcar como resuelto
                echo "</div>";
            }
            echo "<button id='enviar-soluciones'>Enviar Soluciones</button>"; // Botón para enviar soluciones
        } else {
            echo "<p>No hay problemas registrados.</p>";
        }

        // Cerrar la conexión
        $conexion->close();
        ?>
        <div class="error-message" id="error-message"></div> <!-- Div para mostrar el mensaje de error -->
    </div>
    <script src="js/soluciones.js"></script>
</body>

</html>