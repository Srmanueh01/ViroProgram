function abrirVentana() {
    // Abrir ventana para ingresar el correo
    var correo = prompt("Ingrese el correo a eliminar:");

    if (correo) {
        // Si se ingresa un correo, enviarlo al servidor
        eliminarRegistro(correo);
    } else {
        // Si se cancela, mostrar un mensaje o realizar otra acción
        alert("Operación cancelada");
    }
}

function eliminarRegistro(correo) {
    // Enviar el correo al servidor para eliminar el registro
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/viroapp/conexiones/eliminar_registro.php?correo=" + correo, true);
    xhr.onload = function () {
        if (xhr.status == 200) {
            // Manejar la respuesta del servidor
            alert(xhr.responseText);
        } else {
            console.error("Error al eliminar el registro");
        }
    }
    xhr.send();
}
