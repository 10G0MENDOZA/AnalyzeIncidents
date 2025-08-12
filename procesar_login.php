<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../bd.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['usuario']) && isset($_POST['contrasena'])) {

    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);

    // Preparar consulta
    $sql = $conexion->prepare("SELECT contrasena FROM administradores WHERE usuario = ?");
    if (!$sql) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    $sql->bind_param("s", $usuario);
    $sql->execute();
    $resultado = $sql->get_result();

    if ($resultado && $resultado->num_rows === 1) {
        $fila = $resultado->fetch_assoc();
        $hashGuardado = $fila['contrasena'];

        if (password_verify($contrasena, $hashGuardado)) {
            header("Location: administrador.php");
            exit();
        } else {
            echo "❌ Contraseña incorrecta.";
        }
    } else {
        echo "❌ El usuario no existe.";
    }

    $sql->close();
    $conexion->close();

} else {
    echo "⚠️ Datos incompletos.";
}
?>