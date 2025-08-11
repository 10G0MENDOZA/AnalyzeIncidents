<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("bd.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['usuario']) && isset($_POST['contrasena'])) {

    $usuario = trim(htmlspecialchars($_POST['usuario']));
    $contrasena = trim($_POST['contrasena']);

    $sql = $conexion->prepare("SELECT contrasena FROM administradores WHERE usuario = ?");
    if (!$sql) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    $sql->bind_param("s", $usuario);
    $sql->execute();
    $sql->bind_result($hashAlmacenado);
    $sql->fetch();

    if ($hashAlmacenado && password_verify($contrasena, $hashAlmacenado)) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("Location: administrador.php");
        exit;
    } else {
        echo "Usuario o contraseña incorrectos.";
    }

    $sql->close();
}
$conexion->close();
?>