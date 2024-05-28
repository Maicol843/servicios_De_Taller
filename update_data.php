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

// Obtener los datos del formulario
$id = $_POST['id'];
$particular = $_POST['particular'];

// Actualizar los datos en la base de datos
$sql = "UPDATE usuarios SET particular ='$particular' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Datos actualizados correctamente";
} else {
    echo "Error al actualizar datos: " . $conn->error;
}

$conn->close();
?>
