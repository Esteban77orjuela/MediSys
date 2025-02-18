<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/iniciar-sesion.html");
    exit();
}

include 'config.php';
$user_id = $_SESSION["user_id"];

$sql = "SELECT nombre_paciente, historia_clinica, motivo_consulta, examen_fisico, diagnostico, plan_tratamiento, observaciones, seguimiento, fecha_creacion 
        FROM notas_medicas WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas Médicas</title>
    <link rel="stylesheet" href="../css/estilo-notas.css">
</head>
<body>
    <div class="container">
        <h1>Notas Médicas Registradas</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Paciente</th>
                    <th>Motivo</th>
                    <th>Diagnóstico</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["nombre_paciente"]); ?></td>
                        <td><?php echo htmlspecialchars($row["motivo_consulta"]); ?></td>
                        <td><?php echo htmlspecialchars($row["diagnostico"]); ?></td>
                        <td><?php echo htmlspecialchars($row["fecha_creacion"]); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="navigation-buttons">
            <a href="bienvenido.php" class="btn-nav">Volver al Menú Principal</a>
            <a href="notas.php" class="btn-nav">Crear Nueva Nota</a>
        </div>
    </div>
</body>
</html>
