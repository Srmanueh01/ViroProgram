var formularioVisible = false;

document.getElementById('mostrarFormulario').addEventListener('click', function() {
    var nuevaCuentaDiv = document.getElementById('nueva-cuenta');

    // Limpiar contenido anterior
    nuevaCuentaDiv.innerHTML = '';

    if (!formularioVisible) {
        // Crear elementos del formulario
        var labelTitulo = crearElemento('label', 'Añadir nueva cuenta', 'titulo');
        var label1 = crearElemento('label', 'Campo 1:', 'campo-label');
        var input1 = crearElemento('input', '', 'campo-input');
        var label2 = crearElemento('label', 'Campo 2:', 'campo-label');
        var input2 = crearElemento('input', '', 'campo-input');

        // Aplicar estilos
        nuevaCuentaDiv.style.display = 'block';
        nuevaCuentaDiv.style.position = 'absolute';
        nuevaCuentaDiv.style.left = '65%';
        nuevaCuentaDiv.style.top = '52%';
        nuevaCuentaDiv.style.transform = 'translate(-50%, -50%)';
        nuevaCuentaDiv.style.width = '300px';
        nuevaCuentaDiv.style.borderRadius = '10px';
        nuevaCuentaDiv.style.backgroundColor = '#fff';
        nuevaCuentaDiv.style.boxShadow = '0 2px 5px rgba(0, 0, 0, 0.1)';
        nuevaCuentaDiv.style.padding = '20px';
        nuevaCuentaDiv.style.textAlign = 'center';

        // Agregar márgenes entre los elementos
        labelTitulo.style.marginBottom = '15px';
        label1.style.marginBottom = '20px';
        input1.style.marginBottom = '15px';
        label2.style.marginBottom = '10px';
        input2.style.marginBottom = '15px';

        // Agregar elementos al formulario
        agregarElementos(nuevaCuentaDiv, [labelTitulo, crearElemento('br'), label1, input1, crearElemento('br'), label2, input2]);

    } else {
        // Ocultar el formulario
        nuevaCuentaDiv.style.display = 'none';
    }

    // Alternar el estado de visibilidad
    formularioVisible = !formularioVisible;
});

// Función para crear elementos con contenido y clases opcionales
function crearElemento(tag, contenido, clase) {
    var elemento = document.createElement(tag);
    if (contenido) {
        elemento.innerText = contenido;
    }
    if (clase) {
        elemento.classList.add(clase);
    }
    return elemento;
}

// Función para agregar múltiples elementos a un contenedor
function agregarElementos(contenedor, elementos) {
    elementos.forEach(function(elemento) {
        contenedor.appendChild(elemento);
    });
}
