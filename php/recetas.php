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
    <title>Crear Receta Médica</title>
    <link rel="stylesheet" href="../css/estilo-recetas.css">
</head>
<body>
    <div class="container">
        <h1>Crear Receta Médica</h1>
        <form action="guardar_receta.php" method="POST">
            <label for="nombre_medicamento">Nombre del Medicamento:</label>
            <input type="text" id="nombre_medicamento" name="nombre_medicamento" required>

            <label for="dosis">Dosis:</label>
            <input type="text" id="dosis" name="dosis" required>

            <label for="frecuencia">Frecuencia:</label>
            <select id="frecuencia" name="frecuencia" required>
                <option value="Cada 8 horas">Cada 8 horas</option>
                <option value="Cada 12 horas">Cada 12 horas</option>
                <option value="Una vez al día">Una vez al día</option>
                <option value="Una vez a la semana">Una vez a la semana</option>
            </select>

            <label for="duracion_tratamiento">Duración del Tratamiento:</label>
            <input type="text" id="duracion_tratamiento" name="duracion_tratamiento" required>

            <button type="submit">Guardar Receta Médica</button>
        </form>

        <div class="navigation-buttons">
            <a href="bienvenido.php" class="btn-nav">Volver al Menú Principal</a>
            <a href="listar_recetas.php" class="btn-nav">Ver Listado de Recetas</a>
        </div>
    </div>
</body>
</html>
