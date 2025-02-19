<?php
require __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

echo "Host: " . $_ENV['DB_HOST'] . "<br>";
echo "Usuario: " . $_ENV['DB_USER'] . "<br>";
echo "Base de Datos: " . $_ENV['DB_NAME'] . "<br>";
?>
