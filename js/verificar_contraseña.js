// Función que se llama al cargar la página para mostrar y ocultar el mensaje
function iniciarOcultadoMensaje() {
    document.addEventListener("DOMContentLoaded", function () {
        ocultarMensaje(); // Llamamos a la función que maneja el ocultado del mensaje
    });
}

// Función que maneja la visibilidad del mensaje de error
function ocultarMensaje() {
    const errorBox = document.getElementById("error-box");

    if (errorBox) {
        errorBox.style.opacity = "1"; // Hacemos visible el mensaje de error
        setTimeout(() => {
            errorBox.style.opacity = "0"; // Ocultamos el mensaje después de 2 segundos
        }, 2000);
    }
}

// Iniciar el proceso de ocultado del mensaje al cargar la página
iniciarOcultadoMensaje();
