window.onload = function() {
    fetch('../servidor/obtener_datos.php')
    .then(response => response.json())
    .then(data => {
        const datosContainer = document.getElementById('datos-container');
        // Procesar los datos y mostrarlos en el contenedor
        // Por ejemplo, puedes crear tablas o listas para mostrar los datos
    })
    .catch(error => console.error('Error al recuperar los datos:', error));
};
