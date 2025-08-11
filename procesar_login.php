<?php
// Verificar si se envió el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Verificar si el usuario y la contraseña son válidos
    if (($usuario === "Auxsoporte" && $contrasena === "Avance24") || ($usuario === "Soporte" && $contrasena === "Avance24*")) {
        // Redirigir al usuario a la página de quejas
        header("Location: administrador.php");
        exit(); // Salir del script después de redirigir
    } else {
        // Mostrar mensaje de error si las credenciales son incorrectas
        echo "Usuario o contraseña incorrectos";
    }
}
?>
