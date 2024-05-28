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
$dni = $_POST['dni'];
$patente = $_POST['patente'];
$particular = $_POST['particular'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO usuarios (dni, patente, particular) VALUES ('$dni', '$patente', '$particular')";

if ($conn->query($sql) === TRUE) {
    // Si la inserción fue exitosa, devolver una nueva fila para la tabla
    $newRow = '<tr><td>' . $conn->insert_id . '</td><td>' . $dni . '</td><td>' . $patente . '</td><td>' . $particular . '</td></tr>';
    echo $newRow;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
