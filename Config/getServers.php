<?php
header('Content-Type: application/json');

// Incluir el archivo con las credenciales
$servers = include(__DIR__ . '/Servers.php');

// Devolver las credenciales como JSON para que JS pueda leerlas
echo json_encode($servers);
?>
