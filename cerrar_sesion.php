<?php
session_start();
unset($_SESSION['usuario']);
unset($_SESSION['contrasena']);

session_destroy();

header("Location: login.php");
exit();
?>