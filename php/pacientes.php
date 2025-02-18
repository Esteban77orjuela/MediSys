<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/iniciar-sesion.html");
    exit();
}

include 'config.php';

$sql = "SELECT * FROM pacientes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Pacientes</title>
    <link rel="stylesheet" href="../css/estilo-pacientes.css">
</head>
<body>
    <div class="container">
        <h1>Gestión de Pacientes</h1>
        <div class="actions">
            <a href="crear_paciente.php" class="btn">Crear Paciente</a>
        </div>

        <h2>Lista de Pacientes</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['apellido']; ?></td>
                        <td><?php echo $row['telefono']; ?></td>
                        <td><?php echo $row['correo']; ?></td>
                        <td>
                            <a href="actualizar_paciente.php?id=<?php echo $row['id']; ?>" class="btn">Editar</a>
                            <a href="eliminar_paciente.php?id=<?php echo $row['id']; ?>" class="btn-delete">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="navigation-buttons">
            <a href="bienvenido.php" class="btn-nav">Volver al Menú Principal</a>
        </div>
    </div>
</body>
</html>
