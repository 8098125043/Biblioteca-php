// Función para cargar el contenido de una sección utilizando AJAX
function cargarContenido(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            callback(xhr.responseText);
        }
    };
    xhr.open('GET', url, true);
    xhr.send();
}

// Función para manejar los clics en los enlaces del menú
function manejarClicEnlace(event) {
    event.preventDefault();
    var enlace = event.target;
    var destino = enlace.getAttribute('href').substring(1); // Eliminar el '#'
    cargarContenido(destino + '.html', function (respuesta) {
        document.getElementById('main-content').innerHTML = respuesta;
    });
}

// Agregar un listener de eventos a todos los enlaces del menú
var enlacesMenu = document.querySelectorAll('nav ul li a');
enlacesMenu.forEach(function (enlace) {
    enlace.addEventListener('click', manejarClicEnlace);
});
