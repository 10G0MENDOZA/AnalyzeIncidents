<?php
require_once __DIR__ . '/../bd.php';

// Consulta SQL para contar las peticiones por criticidad
$sql = "SELECT nombre, criticidad, COUNT(*) as cantidad FROM quejas GROUP BY nombre, criticidad";
$result = $conexion->query($sql);

// Arreglos para almacenar los datos de la gráfica
$labels = [];
$data = [];
$backgroundColors = [];

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Mostrar los datos en la tabla
    while ($row = $result->fetch_assoc()) {
        // Almacenar los datos en los arreglos
        $labels[] = ucfirst($row["nombre"]); // Convertir la primera letra en mayúscula
        $data[] = $row["cantidad"];

        // Asignar colores dependiendo de la criticidad
        switch (strtolower($row["criticidad"])) {
            case 'alta':
                $backgroundColors[] = 'rgba(255, 99, 132, 0.2)';
                break;
            case 'normal':
                $backgroundColors[] = 'rgba(54, 162, 235, 0.2)';
                break;
            case 'baja':
                $backgroundColors[] = 'rgba(255, 206, 86, 0.2)';
                break;
            case 'critica':
                $backgroundColors[] = 'rgba(75, 192, 192, 0.2)';
                break;
            default:
                $backgroundColors[] = 'rgba(0, 0, 0, 0.2)';
        }
    }
} else {
    echo "No hay datos disponibles para mostrar.";
}

// Cerrar la conexión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficas</title>
    <link rel="stylesheet" href="css/graficas.css">
    <link rel="icon" href="img/Logo_Avance.png">
    <!-- Incluir la librería Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!-- Contenedor de la gráfica -->
    <div class="graficas-container">
        <h2>Gráfica de Criticidad</h2>
        <a href="soluciones.php" class="graficas-button">Ingresar Soluciones</a>
        <!-- Canvas donde se dibujará la gráfica -->
        <canvas id="graficaCriticidad"></canvas>
        <!-- Leyenda de criticidad -->
        <div class="leyenda">
            <span class="criticidad-alta">Alta</span>
            <span class="criticidad-normal">Normal</span>
            <span class="criticidad-baja">Baja</span>
            <span class="criticidad-critica">Crítica</span>
        </div>
    </div>

    <script>
        // Datos de la gráfica obtenidos desde PHP
        var datos = {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Criticidad de peticiones',
                backgroundColor: <?php echo json_encode($backgroundColors); ?>,
                borderColor: 'rgba(0, 0, 0, 1)',
                borderWidth: 1,
                data: <?php echo json_encode($data); ?>
            }]
        };

        // Configuración de la gráfica
        var opciones = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };

        // Crear la gráfica
        var ctx = document.getElementById('graficaCriticidad').getContext('2d');
        var graficaCriticidad = new Chart(ctx, {
            type: 'bar', // Tipo de gráfica (barras en este caso)
            data: datos, // Datos de la gráfica
            options: opciones // Opciones de configuración
        });
    </script>
</body>

</html>