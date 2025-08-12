<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
}
exit();
?>
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
        require_once("bd.php");

        // Consulta SQL para obtener los registros de soluciones
        $sql = "SELECT inconveniente, nombre, solucion FROM quejas";
        $result = $conexion->query($sql);

        if ($result === false) {
            echo "<p>Error en la consulta SQL: " . $conexion->error . "</p>";
        } else {
            // Verificar si se encontraron resultados
            if ($result->num_rows > 0) {
                // Mostrar los registros de soluciones
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='registro'>";
                    echo "<h3>" . htmlspecialchars($row["nombre"]) . "</h3>";
                    echo "<div class='problema'>";
                    echo "<p><strong>Inconveniente:</strong> " . htmlspecialchars($row["inconveniente"]) . "</p>";
                    echo "<p><strong>Solución:</strong> " . htmlspecialchars($row["solucion"]) . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay registros de soluciones.</p>";
            }
        }

        // Cerrar la conexión
        $conexion->close();
        ?>

    </div>
</body>

</html>