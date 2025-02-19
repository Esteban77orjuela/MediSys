<?php
require __DIR__ . '/../vendor/autoload.php';  // Cargar la librería dotenv

use Dotenv\Dotenv;

// Cargar las variables del .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Obtener credenciales desde el .env
$servername = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_NAME'];

// Crear conexión segura con MySQLi
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>