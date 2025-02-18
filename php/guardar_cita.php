<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/iniciar-sesion.html");
    exit();
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paciente_id = $_POST["paciente_id"];
    $nombre_paciente = $_POST["nombre_paciente"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $fecha_hora = $_POST["fecha_hora"];
    $tipo_consulta = $_POST["tipo_consulta"];

    $sql = "INSERT INTO citas (paciente_id, nombre_paciente, telefono, correo, fecha_hora, tipo_consulta) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("isssss", $paciente_id, $nombre_paciente, $telefono, $correo, $fecha_hora, $tipo_consulta);

        if ($stmt->execute()) {
            header("Location: listar_citas.php?success=true");
            exit();
        } else {
            echo "Error al agendar la cita: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la consulta: " . $conn->error;
    }

    $conn->close();
}
?>
