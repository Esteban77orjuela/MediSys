<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/iniciar-sesion.html");
    exit();
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medicamento = trim($_POST["nombre_medicamento"]);
    $dosis = trim($_POST["dosis"]);
    $frecuencia = trim($_POST["frecuencia"]);
    $duracion = trim($_POST["duracion_tratamiento"]);
    $user_id = $_SESSION["user_id"];

    $sql = "INSERT INTO recetasmedicas (usuario_id, nombre_medicamento, dosis, frecuencia, duracion_tratamiento) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("issss", $user_id, $medicamento, $dosis, $frecuencia, $duracion);
        
        if ($stmt->execute()) {
            header("Location: listar_recetas.php?success=true");
            exit();
        } else {
            echo "Error al guardar la receta: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la consulta: " . $conn->error;
    }

    $conn->close();
}
?>
