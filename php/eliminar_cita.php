<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/iniciar-sesion.html");
    exit();
}

include 'config.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM citas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: listar_citas.php?deleted=true");
        exit();
    } else {
        echo "Error al eliminar la cita: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
