<?php
// Verificar si se reciben los datos esperados
if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['mensaje'])) {
    // Conectar a la base de datos
    $conexion = mysqli_connect("localhost", "hola", "hola", "contacto");
    
    // Preparar la consulta SQL para actualizar un mensaje
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];
    $query = "UPDATE mensajes SET nombre = '$nombre', correo = '$correo', mensaje = '$mensaje' WHERE id = $id";
    
    // Ejecutar la consulta y verificar si fue exitosa
    if(mysqli_query($conexion, $query)) {
        echo "Mensaje actualizado correctamente.";
    } else {
        echo "Error al actualizar el mensaje: " . mysqli_error($conexion);
    }
    
    // Cerrar la conexión
    mysqli_close($conexion);
} else {
    echo "Faltan parámetros requeridos.";
}
?>
