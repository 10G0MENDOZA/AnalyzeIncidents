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

        // Consulta SQL para obtener los problemas y soluciones de la base de datos
        $sql = "SELECT id, nombre, inconveniente FROM quejas";
        $result = $conn->query($sql);

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
        $conn->close();
        ?>
        <div class="error-message" id="error-message"></div> <!-- Div para mostrar el mensaje de error -->
    </div>

    <script>
        document.getElementById('enviar-soluciones').addEventListener('click', function() {
            var problemasSolucionados = [];
            var checkboxes = document.querySelectorAll('.check-solucion');
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    var id = checkbox.id.split('-')[1]; // Obtener el ID del problema
                    var solucion = document.getElementById('solucion-' + id).value;
                    problemasSolucionados.push({ id: id, solucion: solucion });
                }
            });

            // Enviar datos al archivo de registro
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'registros.php', true);
            xhr.open('POST', 'registros.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    window.location.href = 'registros.php'; // Redirigir a registros.php después de enviar las soluciones
                } else {
                    document.getElementById('error-message').textContent = 'Error al enviar las soluciones: ' + xhr.responseText;
                }
            };

            xhr.onerror = function() {
                document.getElementById('error-message').textContent = 'Error al enviar las soluciones: No se pudo realizar la solicitud.';
            };

            xhr.send(JSON.stringify(problemasSolucionados));
        });
    </script>
</body>
</html>
