<?php
session_start();

// Verificar si el usuario está autenticado
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
    <title>Bienvenido</title>
    <link rel="stylesheet" href="../css/estilo-bienvenido.css">
</head>
<body>
    <div class="container">
        <h1>¡Bienvenido al Sistema Médico!</h1>
        <p>Selecciona una opción para continuar:</p>

        <div class="options">
            <a href="recetas.php" class="option">
                <img src="../img/icon_recetas.png" alt="Recetas Médicas">
                <span>Crear Recetas Médicas</span>
            </a>
            <a href="notas.php" class="option">
                <img src="../img/icon_notas.png" alt="Notas Médicas">
                <span>Crear Notas Médicas</span>
            </a>
            <a href="pacientes.php" class="option">
                <img src="../img/icon_pacientes.png" alt="Pacientes">
                <span>Gestionar Pacientes</span>
            </a>
            <a href="citas.php" class="option">
                <img src="../img/icon_citas.png" alt="Citas">
                <span>Agendar Citas</span>
            </a>
        </div>

        <div class="logout">
            <a href="cerrar-sesion.php" class="btn-logout">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>
