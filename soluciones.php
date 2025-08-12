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
    <title>Soluciones</title>
    <link rel="icon" href="img/Logo_Avance.png">
    <link rel="stylesheet" href="css/soluciones.css">
</head>

<body>
    <div class="soluciones-container">
        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once __DIR__ . '/../bd.php';



        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (!empty($_POST["solucion"])) {
                foreach ($_POST["solucion"] as $id => $solucion) {
                    $solucion = $conexion->real_escape_string($solucion);
                    $conexion->query("UPDATE quejas SET solucion='$solucion' WHERE id=$id");
                }
                header("Location: registros.php");
                exit();
            } else {
                echo "<p style='color:red;'>No se enviaron soluciones.</p>";
            }
        }

        $sql = "SELECT id, nombre, inconveniente, solucion FROM quejas";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            echo "<form method='POST'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='problema'>";
                echo "<h3>" . htmlspecialchars($row["nombre"]) . "</h3>";
                echo "<p>" . htmlspecialchars($row["inconveniente"]) . "</p>";
                echo "<textarea name='solucion[" . $row["id"] . "]' class='solucion' placeholder='Escribe la solución aquí'>"
                    . htmlspecialchars($row["solucion"] ?? "") . "</textarea>";
                echo "<br><input type='checkbox' class='check-solucion'> Marcar como resuelto";
                echo "</div>";
            }
            echo "<button type='submit'>Enviar Soluciones</button>";
            echo "</form>";
        } else {
            echo "<p>No hay problemas registrados.</p>";
        }

        $conexion->close();
        ?>
        <div class="error-message" id="error-message"></div>
    </div>
</body>

</html>