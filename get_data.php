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

// Obtener los datos de la base de datos
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

// Mostrar los datos en la tabla
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"]. "</td>";
        echo "<td>" . $row["dni"]. "</td>";
        echo "<td>" . $row["patente"]. "</td>";
        echo "<td>" . $row["particular"]. "</td>";
        echo '<td><button class="btn btn-primary edit-btn">Editar</button> <button class="btn btn-danger delete-btn">Eliminar</button></td>';
        echo "</tr>";
    }
} else {
    echo "0 resultados";
}

// Cerrar conexión
$conn->close();
?>
