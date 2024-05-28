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

$sql = "SELECT * FROM usuarios WHERE dni = ? AND patente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $dni, $patente);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if ($data) {
  echo json_encode(['success' => true, 'dni' => $dni, 'patente' => $patente, 'particular' => $data['particular']]);
} else {
  echo json_encode(['success' => false, 'message' => 'Usuario no encontrado']);
}

$stmt->close();
$conn->close();
?>
