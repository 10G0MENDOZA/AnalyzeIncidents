function togglePassword() {
    const input = document.getElementById("contrasena"); // referencia al input de la contraseña
    const eyeIcon = document.getElementById("eyeIcon");  // referencia al ícono del ojo

    if (input.type === "password") {
        // Si la contraseña está oculta (●●●●)
        input.type = "text"; // la mostramos en texto normal
        eyeIcon.classList.remove("bx-show"); // quitamos el ojo abierto
        eyeIcon.classList.add("bx-hide");    // ponemos el ojo tachado
    } else {
        // Si la contraseña está visible
        input.type = "password"; // la volvemos a ocultar (●●●●)
        eyeIcon.classList.remove("bx-hide"); // quitamos el ojo tachado
        eyeIcon.classList.add("bx-show");    // ponemos el ojo abierto
    }
}
