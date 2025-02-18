<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST["correo"]);
    $password = trim($_POST["password"]);

    $sql = "SELECT id, password FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();
            
            if (password_verify($password, $hashed_password)) {
                $_SESSION["user_id"] = $id;
                header("Location: bienvenido.php"); // Redirigir al usuario al dashboard
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "No se encontró una cuenta con ese correo.";
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close();
}
?>
