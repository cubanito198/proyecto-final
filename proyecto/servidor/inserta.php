<?php
// Verificar si se reciben los datos esperados
if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['mensaje'])) {
    // Conectar a la base de datos
    $conexion = mysqli_connect("localhost", "hola", "hola", "contacto");
    
    // Preparar la consulta SQL para insertar un nuevo mensaje
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];
    $query = "INSERT INTO mensajes (nombre, correo, mensaje) VALUES ('$nombre', '$correo', '$mensaje')";
    
    // Ejecutar la consulta y verificar si fue exitosa
    if(mysqli_query($conexion, $query)) {
        echo "Mensaje insertado correctamente.";
    } else {
        echo "Error al insertar el mensaje: " . mysqli_error($conexion);
    }
    
    // Cerrar la conexión
    mysqli_close($conexion);
} else {
    echo "Faltan parámetros requeridos.";
}
?>
