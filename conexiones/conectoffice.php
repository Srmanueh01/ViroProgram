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
    $sql = "SELECT correo, contrasena, curso FROM officealumnos WHERE correo LIKE '%$search_term%'";
} else {
    // Consulta SQL con filtro por curso si se proporciona un valor en el ComboBox
    if (isset($_POST['curso']) && !empty($_POST['curso'])) {
        $curso = mysqli_real_escape_string($conn, $_POST['curso']);
        $sql = "SELECT  correo, contrasena, curso FROM officealumnos WHERE curso LIKE '%$curso%'";
    } else {
        // Consulta SQL sin filtro
        $sql = "SELECT  correo, contrasena, curso FROM officealumnos";
    }
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
} else {
    // Si no hay término de búsqueda, devolver la tabla HTML directamente
    echo '<table border="1"><tr><th>Correo</th><th>Contraseña</th><th>Curso</th></tr>';//<th>ID</th>
    foreach ($results as $row) {
        echo '<tr><td>' . $row['correo'] . '</td><td>' . $row['contrasena'] . '</td><td>' . $row['curso'] . '</td></tr>';
    }
    //<td>' . $row['noffice'] . '</td>
    echo '</table>';
}
?>
