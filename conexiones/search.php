<?php
$servername = "localhost";
$username = "manuel";
$password = "manuel";
$database = "listpc";

// Conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta SQL
if (isset($_POST['search'])) {
    $search_term = mysqli_real_escape_string($conn, $_POST['search']);
    // Consulta SQL con filtro por número de serie
    $sql = "SELECT numpc, modelo, nserie, estado FROM pcsinfo WHERE nserie LIKE '%$search_term%'";
} else {
    // Consulta SQL sin filtro
    $sql = "SELECT numpc, modelo, nserie, estado FROM pcsinfo";
}

$result = mysqli_query($conn, $sql);

// Crear un array para almacenar los resultados
$results = array();

// Verificar si se encontraron resultados
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $results[] = $row;
    }
}

// Cerrar la conexión
mysqli_close($conn);

// Devolver los resultados como JSON solo si hay un término de búsqueda
if (isset($_POST['search'])) {
    echo json_encode($results);
}
?>
