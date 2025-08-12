 document.getElementById('enviar-soluciones').addEventListener('click', function () {
            var problemasSolucionados = [];
            var checkboxes = document.querySelectorAll('.check-solucion');
            checkboxes.forEach(function (checkbox) {
                if (checkbox.checked) {
                    var id = checkbox.id.split('-')[1]; // Obtener el ID del problema
                    var solucion = document.getElementById('solucion-' + id).value;
                    problemasSolucionados.push({ id: id, solucion: solucion });
                }
            });

            // Enviar datos al archivo de registro
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'registros.php', true);
            xhr.open('POST', 'registros.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 300) {
                    window.location.href = 'registros.php'; // Redirigir a registros.php después de enviar las soluciones
                } else {
                    document.getElementById('error-message').textContent = 'Error al enviar las soluciones: ' + xhr.responseText;
                }
            };

            xhr.onerror = function () {
                document.getElementById('error-message').textContent = 'Error al enviar las soluciones: No se pudo realizar la solicitud.';
            };

            xhr.send(JSON.stringify(problemasSolucionados));
        });