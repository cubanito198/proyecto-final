$(document).ready(function() {
    $('#formulario-contacto').submit(function(event) {
        event.preventDefault(); // Evitar que se recargue la página al enviar el formulario
        
        // Obtener los datos del formulario
        var nombre = $('#nombre').val();
        var correo = $('#correo').val();
        var mensaje = $('#mensaje').val();

        // Enviar los datos al archivo PHP para insertar en la base de datos
        $.post('../servidor/inserta.php', { nombre: nombre, correo: correo, mensaje: mensaje }, function(response) {
            $('#mensaje-enviado').text(response);
            // Limpiar el formulario después de enviar el mensaje
            $('#formulario-contacto')[0].reset();
        });
    });
});

