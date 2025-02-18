<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/iniciar-sesion.html");
    exit();
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_paciente = trim($_POST["nombre_paciente"]);
    $historia_clinica = trim($_POST["historia_clinica"]);
    $motivo_consulta = trim($_POST["motivo_consulta"]);
    $examen_fisico = trim($_POST["examen_fisico"]);
    $diagnostico = trim($_POST["diagnostico"]);
    $plan_tratamiento = trim($_POST["plan_tratamiento"]);
    $observaciones = trim($_POST["observaciones"]);
    $seguimiento = trim($_POST["seguimiento"]);
    $user_id = $_SESSION["user_id"];

    $sql = "INSERT INTO notas_medicas (usuario_id, nombre_paciente, historia_clinica, motivo_consulta, examen_fisico, diagnostico, plan_tratamiento, observaciones, seguimiento) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("issssssss", $user_id, $nombre_paciente, $historia_clinica, $motivo_consulta, $examen_fisico, $diagnostico, $plan_tratamiento, $observaciones, $seguimiento);
        
        if ($stmt->execute()) {
            header("Location: listar_notas.php?success=true");
            exit();
        } else {
            echo "Error al guardar la nota médica: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la consulta: " . $conn->error;
    }

    $conn->close();
}
?>
