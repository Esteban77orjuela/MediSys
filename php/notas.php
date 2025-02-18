<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/iniciar-sesion.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nota Médica</title>
    <link rel="stylesheet" href="../css/estilo-notas.css">
</head>
<body>
    <div class="container">
        <h1>Crear Nota Médica</h1>
        <form action="guardar_nota_medica.php" method="POST">
            <label class="nombre_paciente" for="nombre_paciente1">Nombre del Paciente:</label>
            <input type="text" id="nombre_paciente" name="nombre_paciente" required>

            <label class="historia_clinica" for="historia_clinica">Historia Clínica:</label>
            <textarea id="historia_clinica" name="historia_clinica" rows="4" required></textarea>

            <label for="motivo_consulta">Motivo de la Consulta:</label>
            <textarea id="motivo_consulta" name="motivo_consulta" rows="3" required></textarea>

            <label for="examen_fisico">Examen Físico:</label>
            <textarea id="examen_fisico" name="examen_fisico" rows="4" required></textarea>

            <label for="diagnostico">Diagnóstico:</label>
            <textarea id="diagnostico" name="diagnostico" rows="3" required></textarea>

            <label for="plan_tratamiento">Plan de Tratamiento:</label>
            <textarea id="plan_tratamiento" name="plan_tratamiento" rows="3" required></textarea>

            <label for="observaciones">Observaciones:</label>
            <textarea id="observaciones" name="observaciones" rows="4"></textarea>

            <label for="seguimiento">Seguimiento:</label>
            <textarea id="seguimiento" name="seguimiento" rows="3" required></textarea>

            <button type="submit">Guardar Nota Médica</button>
        </form>

        <div class="navigation-buttons">
            <a href="bienvenido.php" class="btn-nav">Volver al Menú Principal</a>
            <a href="listar_notas.php" class="btn-nav">Ver Notas Médicas</a>
        </div>
    </div>
</body>
</html>
