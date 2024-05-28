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
$particular = $_POST['particular'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO usuarios (dni, patente, particular) VALUES ('$dni', '$patente', '$particular')";

if ($conn->query($sql) === TRUE) {
    // Obtener el ID del último registro insertado
    $last_id = $conn->insert_id;
    
    // Crear una fila HTML para mostrar los datos en la tabla
    $newRow = '<tr>';
    $newRow .= '<td>' . $last_id . '</td>';
    $newRow .= '<td>' . $dni . '</td>';
    $newRow .= '<td>' . $patente . '</td>';
    $newRow .= '<td>' . $particular . '</td>';
    $newRow .= '<td><button class="btn btn-primary edit-btn">Editar</button> <button class="btn btn-danger delete-btn">Eliminar</button></td>';
    $newRow .= '</tr>';
    
    // Devolver la fila creada para mostrar en la tabla
    echo $newRow;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
