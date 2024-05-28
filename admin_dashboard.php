<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kilres_srl";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$dni = $_POST['dni'];
$patente = $_POST['patente'];
$particular_km = $_POST['particular'];

// Preparar la consulta SQL para insertar los datos
$sql = "INSERT INTO usuarios (dni, patente, particular) VALUES ('$dni', '$patente', '$particular')";

// Ejecutar la consulta y verificar
if ($conn->query($sql) === TRUE) {
    echo "Datos insertados correctamente.";
} else {
    echo "Error al insertar datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
