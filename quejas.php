<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Quejas</title>
    <link rel="stylesheet" href="css/quejas.css">
    <link rel="icon" href="images/logovertical.jpg" type="image/png">
</head>
<body>
    <div class="quejas-container">
        <h2>Lista de incidentes</h2>
        <a href="graficas.php" class="graficas-button">Ver Gráficas</a>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Asesor@</th>
                        <th>Cartera</th>
                        <th>Inconveniente</th>
                        <th>Criticidad</th>
                        <th>Fecha de creación</th>
                    </tr>
                </thead>
                <tbody>
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

                // Consulta SQL para seleccionar todas las quejas
                $sql = "SELECT nombre, cartera, inconveniente, criticidad, fecha_creacion FROM quejas";
                $result = $conn->query($sql);

                // Verificar si se encontraron resultados
                if ($result->num_rows > 0) {
                    // Mostrar los datos en la tabla
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["cartera"] . "</td>";
                        echo "<td>" . $row["inconveniente"] . "</td>";
                        echo "<td>" . $row["criticidad"] . "</td>";
                        echo "<td>" . $row["fecha_creacion"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No hay quejas registradas.</td></tr>";
                }

                // Cerrar la conexión
                $conn->close();
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
