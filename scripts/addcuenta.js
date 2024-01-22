// script.js

function enviarFormulario() {
    // Obtener datos del formulario
    var correo = document.getElementById("correo").value;
    var contra = document.getElementById("contra").value;
    var cursonew = document.getElementById("cursonew").value;

    // Crear objeto FormData
    var formData = new FormData();
    formData.append("correo", correo);
    formData.append("contra", contra);
    formData.append("cursonew", cursonew);

    // Enviar datos con AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/viroapp/conexiones/ingresaroffice.php", true);
    xhr.onload = function () {
        if (xhr.status == 200) {
            // Manejar la respuesta del servidor (opcional)
            console.log(xhr.responseText);

            // Restablecer los valores de los campos
            document.getElementById("correo").value = "";
            document.getElementById("contra").value = "";
            document.getElementById("cursonew").value = "";
        } else {
            console.error("Error al enviar el formulario");
        }
    };
    xhr.send(formData);
}
