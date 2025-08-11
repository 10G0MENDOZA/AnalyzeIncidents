<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Soluciones</title>
    <link rel="icon" href="img/Logo_Avance.png">
    <link rel="stylesheet" href="css/registros.css">
</head>
<body>
    <div class="registros-container">
        <h2>Registros de Soluciones</h2>
        <?php
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "solicitudes";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consulta SQL para obtener los registros de soluciones
        $sql = "SELECT nombre, solucion FROM quejas";
        $result = $conn->query($sql);

        // Verificar si se encontraron resultados
        if ($result->num_rows > 0) {
            // Mostrar los registros de soluciones
            while ($row = $result->fetch_assoc()) {
                echo "<div class='registro'>";
                echo "<h3>" . $row["nombre"] . "</h3>";
                echo "<div class='problema'>";
                echo "<p><strong>Nombre:</strong> " . $row["nombre"] . "</p>";
                echo "<p><strong>Solución:</strong> " . $row["solucion"] . "</p>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>No hay registros de soluciones.</p>";
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </div>
</body>
</html>
