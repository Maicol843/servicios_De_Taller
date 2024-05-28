<?php
session_start();
header('Content-Type: application/json');
$servername = "localhost"; // Cambia esto a tu servidor MySQL
$username = "root"; // Cambia esto a tu nombre de usuario MySQL
$password = ""; // Cambia esto a tu contraseña MySQL
$dbname = "kilres_srl";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

$dni = $_SESSION['dni'];
$patente = $_SESSION['patente'];

$sql = "UPDATE usuarios SET particular = 0 WHERE dni = ? AND patente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $dni, $patente);
$success = $stmt->execute();

if ($success) {
  echo json_encode(['success' => true]);
} else {
  echo json_encode(['success' => false, 'message' => 'Error al actualizar los datos']);
}

$stmt->close();
$conn->close();
?>
