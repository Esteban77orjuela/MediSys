<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/iniciar-sesion.html");
    exit();
}

include 'config.php';
$user_id = $_SESSION["user_id"];

$sql = "SELECT nombre_medicamento, dosis, frecuencia, duracion_tratamiento, fecha_creacion FROM recetasmedicas WHERE usuario_id = ?";
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
    <title>Recetas Médicas</title>
    <link rel="stylesheet" href="../css/estilo-recetas.css">
</head>
<body>
    <div class="container">
        <h1>Recetas Médicas Guardadas</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Medicamento</th>
                    <th>Dosis</th>
                    <th>Frecuencia</th>
                    <th>Duración</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["nombre_medicamento"]); ?></td>
                        <td><?php echo htmlspecialchars($row["dosis"]); ?></td>
                        <td><?php echo htmlspecialchars($row["frecuencia"]); ?></td>
                        <td><?php echo htmlspecialchars($row["duracion_tratamiento"]); ?></td>
                        <td><?php echo htmlspecialchars($row["fecha_creacion"]); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="navigation-buttons">
            <a href="bienvenido.php" class="btn-nav">Volver al Menú Principal</a>
            <a href="recetas.php" class="btn-nav">Crear Nueva Receta</a>
        </div>
    </div>
</body>
</html>
