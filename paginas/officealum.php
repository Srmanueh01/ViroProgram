<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/viroapp/icon/viroicon.png">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="/viroapp/estilos/style.css">
    <link rel="stylesheet" href="/viroapp/estilos/tloffice.css">
    <link rel="stylesheet" href="/viroapp/estilos/searchbar.css">
    <link rel="stylesheet" href="/viroapp/estilos/addcuenta.css">

    <title>Dep. Informática</title>
</head>

<body>
    <div class="menu-container" id="menu-container">
        <span class="open-btn" onclick="toggleMenu()">☰</span>
        <ul class="menu-items">
            <li class="menu-item"><a href="/viroapp/index.html">Inicio</a></li>
            <li class="menu-item"><a href="/viroapp/paginas/addpc.php">Añadir PC</a></li>
            <li class="menu-item"><a href="/viroapp/paginas/actdatos.html">Actualizar Datos</a></li>
            <li class="menu-item"><a href="/viroapp/paginas/officealum.php">Office</a></li>
        </ul>
    </div>

    <div class="main-content" id="main-content">
        <h1>Cuentas de Office</h1>
        <p>En esta página se mostrarán las cuentas de usuarios de Office, tanto de alumnos y docente.</p>
        
        <form id="search-form">
            <label for="search"></label>
            <input type="text" id="search" name="search" placeholder="Ingresa el Correo">

            <!-- En el archivo officealum.php, dentro del formulario -->
            <label for="curso"></label>
            <select id="curso" name="curso">
                <option value="">Todos los cursos</option>
                <option value="PRIM">Primaria</option>
                <option value="ESO">ESO</option>
                <option value="BATX">Bachillerato</option>
            </select>
        </form>
        <button id="mostrarFormulario">Añadir nueva cuenta</button>
        <div id="nueva-cuenta">
        </div>


        <div id="search-results">
            <?php include 'C:\xampp\htdocs\viroapp\conexiones\conectoffice.php'; ?>
        </div>

    </div>

    <script src="/viroapp/scripts/menu.js"></script>
    <script src="/viroapp/scripts/office.js"></script>
    <script src="/viroapp/scripts/addcuenta.js"></script>
</body>

</html>
