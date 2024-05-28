<?php
session_start();
$servername = "localhost"; // Cambia esto a tu servidor MySQL
$username = "root"; // Cambia esto a tu nombre de usuario MySQL
$password = ""; // Cambia esto a tu contraseña MySQL
$dbname = "kilres_srl";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$dni = $_POST['dni'];
$patente = $_POST['patente'];

$sql = "SELECT * FROM usuarios WHERE dni = ? AND patente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $dni, $patente);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  // Datos válidos
  $_SESSION['dni'] = $dni;
  $_SESSION['patente'] = $patente;
  header("Location: servicios.html");
} else {
  // Datos inválidos
  echo "<script>
    alert('DNI o número de patente incorrectos. Por favor, intente de nuevo.');
    window.location.href = 'index.html';
  </script>";
}

$stmt->close();
$conn->close();
?>
