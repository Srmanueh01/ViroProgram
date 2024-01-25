<?php

// Conexión a la base de datos
$servername = "localhost";
$username = "manuel";
$password = "manuel";
$database = "listpc";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$correo = $_POST["correo"];
$contra = $_POST["contra"];
$curso = $_POST["cursonew"];

// Preparar y ejecutar la consulta INSERT
$sql = "INSERT INTO officealumnos (correo, contrasena, curso) VALUES ('$correo', '$contra', '$curso');";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo alumno creado correctamente.";
} else {
    echo "Error al crear el alumno: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

?>
