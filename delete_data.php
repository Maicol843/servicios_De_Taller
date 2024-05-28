<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kilres_srl";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del registro a eliminar
$id = $_POST['id'];

// Eliminar el registro de la base de datos
$sql = "DELETE FROM usuarios WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "Error al eliminar el registro: " . $conn->error;
}

$conn->close();
?>
