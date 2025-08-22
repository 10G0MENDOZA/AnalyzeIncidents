<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once __DIR__ . '/../bd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);

    // Hashear la contraseña
    $contrasenaHasheada = password_hash($contrasena, PASSWORD_DEFAULT);

    // Preparar la consulta
    $sql = $conexion->prepare("INSERT INTO administradores (usuario, contrasena) VALUES (?, ?)");
    if (!$sql) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $sql->bind_param("ss", $usuario, $contrasenaHasheada);

    // Ejecutar y verificar
    if ($sql->execute()) {
        header("Location: exito.php");
        exit();
    } else {
        die("Error al insertar usuario: " . $sql->error);
    }

    // Cerrar recursos
    $sql->close();
    $conexion->close();
}