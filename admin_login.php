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

// Credenciales de administrador (deberían estar almacenadas de manera segura en la base de datos)
$admin_user = "admin";
$admin_pass = "admin123"; // Asegúrate de usar un hash seguro en una aplicación real

// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Verificar las credenciales
if ($username === $admin_user && $password === $admin_pass) {
    header("Location: admin_dashboard.html");
} else {
    header("Location: admin_login.html?error=1");
}

$conn->close();
?>
