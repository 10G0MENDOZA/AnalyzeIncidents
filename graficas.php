<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficas</title>
    <link rel="stylesheet" href="graficas.css">
    <link rel="icon" href="images/Logovertical.jpg">
    <!-- Incluir la librería Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Contenedor de la gráfica -->
    <div class="graficas-container">
        <h2>Gráfica de Criticidad</h2>
        <!-- Canvas donde se dibujará la gráfica -->
        <canvas id="graficaCriticidad"></canvas>
    </div>

    <script>
    // Datos de ejemplo para la gráfica
    var datos = {
        labels: ['Baja', 'Normal', 'Alta'],
        datasets: [{
            label: 'Criticidad de Quejas',
            backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
            borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
            borderWidth: 1,
            data: [12, 19, 3] // Aquí deberías obtener los datos reales de tu base de datos
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
