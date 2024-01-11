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

// Verificar si se envió una solicitud de búsqueda
if (isset($_POST['search'])) {
    $search_term = mysqli_real_escape_string($conn, $_POST['search']);
    // Consulta SQL con filtro por número de serie
    $sql = "SELECT numpc, modelo, nserie, estado FROM pcsinfo WHERE nserie LIKE '%$search_term%'";
} else {
    // Consulta SQL sin filtro
    $sql = "SELECT numpc, modelo, nserie, estado FROM pcsinfo";
}

$result = mysqli_query($conn, $sql);

// Verificar si se encontraron resultados
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Número de PC</th><th>Modelo</th><th>Número de Serie</th><th>Estado</th></tr>";

    // Iterar sobre los resultados y mostrarlos en la tabla
    while ($row = mysqli_fetch_assoc($result)) {
        $class = ($row['estado'] == 'Disponible') ? 'disponible-row' : (($row['estado'] == 'Prestado') ? 'prestado-row' : (($row['estado'] == 'Fuera de Servicio') ? 'fuera-de-servicio-row' : (($row['estado'] == 'APALAN') ? 'apalan-row' : '')));
        
        echo "<tr class='$class'>";
        echo "<td>" . $row['numpc'] . "</td>";
        echo "<td>" . $row['modelo'] . "</td>";
        echo "<td>" . $row['nserie'] . "</td>";
        echo "<td>" . $row['estado'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
mysqli_close($conn);
?>
