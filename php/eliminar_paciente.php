<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/iniciar-sesion.html");
    exit();
}

include 'config.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM pacientes WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: pacientes.php?deleted=true");
            exit();
        } else {
            echo "Error al eliminar el paciente: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la consulta: " . $conn->error;
    }

    $conn->close();
}
?>
