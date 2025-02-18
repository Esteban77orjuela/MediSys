<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/iniciar-sesion.html");
    exit();
}

include 'config.php';

// Obtener lista de pacientes
$sql = "SELECT * FROM pacientes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita</title>
    <link rel="stylesheet" href="../css/estilo-citas.css">
</head>
<body>
    <div class="container">
        <h1>Agendar Cita</h1>
        <form action="guardar_cita.php" method="POST">
            <label for="paciente">Seleccionar Paciente:</label>
            <select id="paciente" name="paciente_id" required>
                <option value="">Seleccione un paciente</option>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <option value="<?php echo $row['id']; ?>"
                            data-nombre="<?php echo $row['nombre']; ?>"
                            data-telefono="<?php echo $row['telefono']; ?>"
                            data-correo="<?php echo $row['correo']; ?>">
                        <?php echo $row['nombre'] . " " . $row['apellido']; ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label for="nombre_paciente">Nombre del Paciente:</label>
            <input type="text" id="nombre_paciente" name="nombre_paciente" readonly>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" readonly>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" readonly>

            <label for="fecha_hora">Fecha y Hora:</label>
            <input type="datetime-local" id="fecha_hora" name="fecha_hora" required>

            <label for="tipo_consulta">Tipo de Consulta:</label>
            <select id="tipo_consulta" name="tipo_consulta" required>
                <option value="Consulta General">Consulta General</option>
                <option value="Seguimiento">Seguimiento</option>
            </select>

            <button type="submit">Agendar Cita</button>
        </form>

        <div class="navigation-buttons">
            <a href="bienvenido.php" class="btn-nav">Volver al Menú Principal</a>
            <a href="listar_citas.php" class="btn-nav">Ver Citas Agendadas</a>
        </div>
    </div>

    <script>
        document.getElementById("paciente").addEventListener("change", function() {
            let selected = this.options[this.selectedIndex];
            document.getElementById("nombre_paciente").value = selected.getAttribute("data-nombre");
            document.getElementById("telefono").value = selected.getAttribute("data-telefono");
            document.getElementById("correo").value = selected.getAttribute("data-correo");
        });
    </script>
</body>
</html>
