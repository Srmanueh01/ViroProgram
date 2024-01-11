<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/viroapp/icon/viroicon.png">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="/viroapp/estilos/style.css">
    <link rel="stylesheet" href="/viroapp/estilos/tlstyle.css">
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
        <h1>Añadir PCs</h1>
        <p>En esta página se mostrará la lista de portátiles que tenemos actualmente, además se puede añadir alguno nuevo o eliminarlo.</p>
        
        <form id="search-form">
            <label for="search">Buscar por número de serie:</label>
            <input type="text" id="search" name="search" placeholder="Ingrese el número de serie">
        </form>

        <div id="search-results">
            <?php include 'C:\xampp\htdocs\viroapp\conexiones\search.php'; ?>
        </div>
    </div>

    <script src="/viroapp/scripts/menu.js"></script>
    <script src="/viroapp/scripts/search.js"></script>
</body>

</html>