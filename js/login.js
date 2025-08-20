// Espera a que todo el DOM esté cargado antes de ejecutar el código
document.addEventListener("DOMContentLoaded", () => {

    // Texto que se va a escribir en pantalla como efecto de máquina de escribir
    const texto = "Login";

    // Obtiene el elemento donde se escribirá el texto (el que tiene id="maquina")
    const destino = document.getElementById("maquina");

    // Índice para recorrer cada letra del texto
    let index = 0;

    // Bandera para saber si ya se escribió el texto (evita que se repita)
    let yaEscrito = true;

    // Función que escribe letra por letra en el elemento destino
    function escribir() {
        if (index < texto.length) {
            // Agrega una letra en cada llamada
            destino.innerHTML += texto.charAt(index);
            index++;
            // Llama de nuevo a la función con un retardo de 40ms
            setTimeout(escribir, 40);
        }
    }

    // Crea un observador para detectar cuando el elemento "destino" entra en pantalla
    const observer = new IntersectionObserver(entries =>  {
        entries.forEach(entry => {
            // ⚠️ Aquí tienes un error: pusiste "FileSystemEntry.isInteresecting"
            // debería ser "entry.isIntersecting"
            if (entry.isIntersecting && !yaEscrito) {
                escribir();      // Llama a la función de escritura
                yaEscrito = true; // Marca como ya escrito para que no se repita
            }
        });
    });

    // Indica al observador que observe el elemento destino
    observer.observe(destino);

});
