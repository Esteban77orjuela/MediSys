<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/iniciar-sesion.html");
    exit();
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $telefono = trim($_POST["telefono"]);
    $correo = trim($_POST["correo"]);

    $sql = "INSERT INTO pacientes (nombre, apellido, telefono, correo) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $nombre, $apellido, $telefono, $correo);

        if ($stmt->execute()) {
            header("Location: pacientes.php?success=true");
            exit();
        } else {
            echo "Error al registrar paciente: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la consulta: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Paciente</title>
    <link rel="stylesheet" href="../css/estilo-pacientes.css">
</head>
<body>
    <div class="container">
        <h1>Registrar Paciente</h1>
        <form action="crear_paciente.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required>

            <button type="submit">Registrar Paciente</button>
        </form>
        <a href="pacientes.php" class="btn-nav">Volver a Gestión de Pacientes</a>
    </div>
</body>
</html>
