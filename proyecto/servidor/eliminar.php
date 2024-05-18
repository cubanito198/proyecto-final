<?php
// Verificar si se recibe el nombre del mensaje a eliminar
if(isset($_GET['nombre'])) {
    // Conectar a la base de datos
    $conexion = mysqli_connect("localhost", "hola", "hola", "contacto");
    
    // Preparar la consulta SQL para eliminar el mensaje por nombre
    $nombre = $_GET['nombre'];
    $query = "DELETE FROM mensajes WHERE nombre = '$nombre'";
    
    // Ejecutar la consulta y verificar si fue exitosa
    if(mysqli_query($conexion, $query)) {
        echo "Mensaje eliminado correctamente.";
    } else {
        echo "Error al eliminar el mensaje: " . mysqli_error($conexion);
    }
    
    // Cerrar la conexión
    mysqli_close($conexion);
} else {
    echo "Falta el parámetro requerido 'nombre'.";
}
?>

