<?php
session_start(); // Inicia la sesión para manejar los errores y redirecciones

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
            // Si la contraseña es correcta, redirigimos al administrador
            header("Location: administrador.php");
            exit();
        } else {
            // Contraseña incorrecta
            $_SESSION['error'] = "Contraseña incorrecta.";
        }
    } else {
        // Usuario no encontrado
        $_SESSION['error'] = "Usuario O contraseña Incorrecta.";
    }

    // Redirigir de vuelta al login con el mensaje de error
    header("Location: login.php");
    exit();
} else {
    echo "⚠️ Datos incompletos.";
}
?>