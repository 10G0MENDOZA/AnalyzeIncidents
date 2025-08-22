<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

session_start();
require_once __DIR__ . '/../bd.php';

// 🔹 Forzar UTF-8 en la conexión a MySQL
mysqli_set_charset($conexion, "utf8");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usuario'], $_POST['contrasena'], $_POST['correo'])) {
    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);
    $correo = trim($_POST['correo']);

    // Hashear la contraseña antes de guardar
    $contrasenaHasheada = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar en la BD
    $sql = $conexion->prepare("INSERT INTO administradores (usuario, contrasena, correo) VALUES (?, ?, ?)");
    if (!$sql) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $sql->bind_param("sss", $usuario, $contrasenaHasheada, $correo);

    if ($sql->execute()) {
        // ---- Enviar correo ----
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'diegomendoza2609@gmail.com';
            $mail->Password = 'ulro qpzx vohx xktu';     
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->CharSet = 'UTF-8'; // 🔹 Asegurar codificación correcta en el correo

            $mail->setFrom('diegomendoza2609@gmail.com', 'Sistema AnalyzeIncidents');
            $mail->addAddress($correo); 
            $mail->Subject = '✅ Usuario creado con éxito';
            $mail->isHTML(true);

            // Cuerpo del correo
            $mail->Body = "
            <!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <title>Usuario creado</title>
                <style>
                    body { font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; }
                    .card { background: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
                    h2 { color: #04CF9E; }
                </style>
            </head>
            <body>
                <div class='card'>
                    <h2>Usuario creado exitosamente 🎉</h2>
                    <p>Hola <strong>" . htmlspecialchars($usuario, ENT_QUOTES, "UTF-8") . "</strong>, tu cuenta en <b>AnalyzeIncidents</b> fue creada correctamente.</p>
                    <p><strong>Usuario:</strong> " . htmlspecialchars($usuario, ENT_QUOTES, "UTF-8") . "</p>
                    <p><strong>Contraseña:</strong> " . htmlspecialchars($contrasena, ENT_QUOTES, "UTF-8") . "</p>
                    <p>Puedes acceder al sistema desde el siguiente enlace:</p>
                    <p><a href='http://localhost/AnalyzeIncidents/login.php'>Iniciar sesión</a></p>
                </div>
            </body>
            </html>
            ";

            $mail->send();
        } catch (Exception $e) {
            die("⚠️ Error al enviar el correo: " . $mail->ErrorInfo);
        }

        // Redirigir si todo va bien
        header("Location: exito.php");
        exit();
    } else {
        die("❌ Error al insertar usuario: " . $sql->error);
    }

    $sql->close();
    $conexion->close();
} else {
    die("⚠️ No se recibieron datos válidos del formulario.");
}
?>
