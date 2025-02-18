<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $correo = trim($_POST["correo"]);
    $cedula = trim($_POST["cedula"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Encriptar contraseña

    $sql = "INSERT INTO usuarios (nombre, apellido, correo, numero_identificacion, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("sssss", $nombre, $apellido, $correo, $cedula, $password);
        
        if ($stmt->execute()) {
            echo "Registro exitoso. <a href='../html/iniciar-sesion.html'>Iniciar sesión</a>";
        } else {
            echo "Error al registrar usuario: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close();
}
?>
