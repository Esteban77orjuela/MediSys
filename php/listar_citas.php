<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/iniciar-sesion.html");
    exit();
}

include 'config.php';

$sql = "SELECT * FROM citas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas Agendadas</title>
    <link rel="stylesheet" href="../css/estilo-citas.css">
</head>
<body>
    <div class="container">
        <h1>Citas Agendadas</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Paciente</th>
                    <th>Fecha y Hora</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["nombre_paciente"]); ?></td>
                        <td><?php echo htmlspecialchars($row["fecha_hora"]); ?></td>
                        <td><?php echo htmlspecialchars($row["tipo_consulta"]); ?></td>
                        <td><a href="eliminar_cita.php?id=<?php echo $row['id']; ?>" class="btn-delete">Eliminar</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="navigation-buttons">
            <a href="bienvenido.php" class="btn-nav">Volver al Menú Principal</a>
            <a href="citas.php" class="btn-nav">Agendar Nueva Cita</a>
        </div>
    </div>
</body>
</html>
