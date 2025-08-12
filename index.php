<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de peticiones</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="images/logovertical.jpg" type="image/png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <form method="post" action="correo.php" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <i class='bx bxs-user'></i>
        <input type="text" name="nombre" required><br>

        <label for="cartera">Cartera:</label>
        <i class='bx bxs-bank'></i>
        <select name="cartera" required>
            <option value="Propia">Propia</option>
            <option value="Occidente">Occidente</option>
            <option value="Libertador">Libertador</option>
            <option value="Abogados">Abogados</option>
        </select><br>

        <label for="queja">Inconveniente:</label>
        <textarea name="queja" rows="4" required></textarea><br>

        <label for="criticidad">Criticidad:</label>
        <i class='bx bxs-error'></i>
        <select name="criticidad" required>
            <option value="" selected disabled>- Seleccionar -</option>
            <option value="alta">Alta</option>
            <option value="normal">Normal</option>
            <option value="baja">Baja</option>
            <option value="critica">Crítica</option>
        </select><br>

        <!-- Botón para adjuntar archivo -->
        <label for="adjunto">Adjuntar archivo:</label>
        <input type="file" name="adjunto"><br>

        <input type="submit" value="Enviar Queja">
    </form>
</body>

</html>