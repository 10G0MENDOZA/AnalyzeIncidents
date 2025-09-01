 function toggleMenu() {
        const menu = document.getElementById('options');
        menu.classList.toggle('show');
    }

    function Desaparecerfoto() {
        const img = document.getElementById("imagen-responsive");
        if (img.src.includes("icons_menu.png")) {
            img.src = "img/icons_close.png"; // Cambia al ícono de cerrar
        } else {
            img.src = "img/icons_menu.png"; // Vuelve al ícono del menú
        }
    }