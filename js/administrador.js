// Definimos la función toggleOptions() que cambia la visibilidad de un elemento
function toggleOptions() {
    // Usamos getElementById para obtener el elemento con el id 'options'
    var options = document.getElementById("options");

    // Verificamos si el estilo 'display' de ese elemento es 'block', es decir, si está visible
    if (options.style.display === 'block') {
        // Si es 'block', cambiamos su estilo 'display' a 'none' para ocultarlo
        options.style.display = 'none';
    } else {
        // Si no es 'block' (es decir, está oculto), cambiamos el estilo a 'block' para mostrarlo
        options.style.display = 'block';
    }
}
