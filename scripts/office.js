$(document).ready(function () {
    // Función para construir la tabla basada en los datos
    function buildTable(data) {
        // Verificar si hay datos para construir la tabla
        if (data.length > 0) {
            // Crear la tabla
            var table = '<table border="1">';
            table += '<tr><th>ID</th><th>Correo</th><th>Contraseña</th><th>Curso</th></tr>';

            // Iterar sobre los resultados y agregar filas a la tabla
            for (var i = 0; i < data.length; i++) {
                var row = data[i];

                table += '<tr>';
                table += '<td>' + row['noffice'] + '</td>'; // Asegúrate de que coincida con el nombre de tu columna en la base de datos
                table += '<td>' + row['correo'] + '</td>';
                table += '<td>' + row['contrasena'] + '</td>';
                table += '<td>' + row['curso'] + '</td>';
                table += '</tr>';
            }

            table += '</table>';

            // Limpiar el contenido anterior y agregar la tabla al contenedor
            $('#search-results').html(table);
        } else {
            // Limpiar el contenido anterior si no hay resultados
            $('#search-results').html('No se encontraron resultados.');
        }
    }

    function performSearch(searchTerm) {
        console.log('Realizando la búsqueda con término:', searchTerm);
        $.ajax({
            type: 'POST',
            url: '/viroapp/conexiones/conectoffice.php',
            data: { search: searchTerm },
            dataType: 'json',
            success: function (data) {
                console.log('Respuesta recibida:', data);
                // Llamar a la función para construir la tabla
                buildTable(data);
            },
            error: function (error) {
                console.error('Error en la petición AJAX:', error);
            }
        });
    }

    // Manejar el evento de cambio en el ComboBox
    $('#curso').change(function () {
        // Obtener el valor seleccionado en el ComboBox
        var selectedCurso = $(this).val();

        // Realizar la solicitud AJAX para obtener los resultados filtrados por curso
        $.ajax({
            type: 'POST',
            url: '/viroapp/conexiones/conectoffice.php',
            data: { curso: selectedCurso },
            success: function (response) {
                // Actualizar los resultados en la página
                $('#search-results').html(response);
            }
        });
    });

    // Manejar el evento de escritura en el campo de búsqueda
    $('#search').on('input', function () {
        // Obtener el valor del campo de búsqueda
        var searchTerm = $(this).val();

        // Llamar a la función para realizar la búsqueda
        performSearch(searchTerm);
    });

    // Inicializar la búsqueda sin término al cargar la página
    performSearch('');
});
