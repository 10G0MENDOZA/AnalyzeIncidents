<?php
require_once("bd.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['usuario']) && isset($_POST['contrasena'])) {

    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);

    $sql = $conexion->prepare("SELECT contrasena FROM administradores WHERE usuario = ?");

    if (!$sql) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    $sql->bind_param("s", $usuario);
    $sql->execute();
    $resultado = $sql->get_result();

    if ($resultado->num_rows === 1) {
        $fila = $resultado->fetch_assoc();
        $hashGuardado = $fila['contrasena'];

        if (password_verify($contrasena, $hashGuardado)) {
            header("Location: consulta_exitosa.php");
            exit();
        } else {
            die("Contraseña incorrecta");
        }
    } else {
        die("El usuario no existe");
    }

    $sql->close();
}
$conexion->close();
?>