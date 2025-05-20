<?php
$host = "localhost";
$dbname = "catalogo";
$user = "omar_diaz";
$pass = "87654321";

$host = "dpg-d076lls9c44c739o31lg-a.frankfurt-postgres.render.com";
$dbname = "catalogo_t804";
$user = "gsmarco";
$pass = "mm0XqtKjmX3TNEVdujzXZFZQfHP5hNDe";

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>