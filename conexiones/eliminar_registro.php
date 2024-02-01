<?php

// Conexión a la base de datos
$servername = "localhost";
$username = "manuel";
$password = "manuel";
$database = "listpc";

$conn = new mysqli($servername, $username, $password, $database);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el correo a eliminar del parámetro en la URL
$correoEliminar = $_GET["correo"];

// Preparar y ejecutar la consulta DELETE
$sql = "DELETE FROM officealumnos WHERE correo = '$correoEliminar'";

if ($conn->query($sql) === TRUE) {
    echo "Registro eliminado correctamente.";
} else {
    echo "Error al eliminar el registro: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
