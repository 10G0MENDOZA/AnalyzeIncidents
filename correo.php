<?php
// Cargar las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos del remitente (tú)
    $correo_remitente = 'diegomendoza2609@gmail.com'; 

    // Dirección de correo a la que se enviará la queja
    $correo_destinatario = 'auxsoporte@avancelegal.com.co';

    // Verifica si se han enviado los datos del formulario
    if (isset($_POST["nombre"]) && isset($_POST["cartera"]) && isset($_POST["queja"]) && isset($_POST["criticidad"])) {
        $nombre = $_POST["nombre"];
        $cartera = $_POST["cartera"];
        $queja = $_POST["queja"];
        $criticidad = $_POST["criticidad"];

        // Archivo adjunto
        $nombre_archivo = $_FILES["adjunto"]["name"];
        $ruta_temporal = $_FILES["adjunto"]["tmp_name"];

        // Obtener la fecha actual
        $fecha_creacion = date("Y-m-d H:i:s");

        // Construir el mensaje HTML
        $mensaje = "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Nueva queja registrada</title>
        <style>
            /* Estilos globales */
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                padding: 20px;
                margin: 0;
            }
            
            /* Estilos para el contenedor del mensaje */
            .mensaje-container {
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                padding: 20px;
                margin: 20px auto;
                max-width: 600px;
            }
            
            /* Estilos para los elementos del mensaje */
            h2 {
                color: #04CF9E;
                margin-top: 0;
            }
            
            p {
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class='mensaje-container'>
            <h2>Nueva queja registrada</h2>
            <p><strong>Nombre:</strong> $nombre</p>
            <p><strong>Cartera:</strong> $cartera</p>
            <p><strong>Criticidad:</strong> $criticidad</p>
            <p><strong>Queja:</strong> $queja</p>
        </div>
    </body>
    </html>
    ";

        // Configuración de PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configura el servidor de correo (para Gmail)
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'diegomendoza2609@gmail.com';
            $mail->Password = 'ulro qpzx vohx xktu';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Detalles del correo
            $mail->setFrom($correo_remitente);
            $mail->addAddress($correo_destinatario);
            $mail->Subject = 'Nueva queja registrada';
            $mail->isHTML(true);
            $mail->Body = $mensaje;

            // Adjuntar el archivo
            $mail->addAttachment($ruta_temporal, $nombre_archivo);

            // Envía el correo electrónico
            $mail->send();

            require_once("bd.php");

            // Preparar la consulta
            $sql = "INSERT INTO quejas (nombre, cartera, inconveniente, criticidad, fecha_creacion)
        VALUES (?, ?, ?, ?, ?)";

            $stmt = $conexion->prepare($sql);

            if (!$stmt) {
                die("Error en prepare(): " . $conexion->error);
            }

            // Enlazar parámetros
            $stmt->bind_param("sssss", $nombre, $cartera, $queja, $criticidad, $fecha_creacion);

            // Ejecutar
            if ($stmt->execute()) {
                echo "La queja se registró correctamente en la base de datos.";
            } else {
                echo "Error al registrar la queja: " . $stmt->error;
            }

            // Cerrar
            $stmt->close();
            $conexion->close();

            // Redirigir a éxito
            header("Location: exito.php");
            exit();
        } catch (Exception $e) {
            echo "Ocurrió un error: " . $e->getMessage();
        }
    }
}
?>