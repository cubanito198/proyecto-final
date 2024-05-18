<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "hola", "hola", "contacto");

// Preparar la consulta SQL para obtener todos los mensajes
$query = "SELECT * FROM mensajes";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $query);

// Verificar si se encontraron resultados
if(mysqli_num_rows($resultado) > 0) {
    // Crear un array para almacenar los mensajes
    $mensajes = array();
    
    // Iterar sobre los resultados y añadir cada mensaje al array
    while($fila = mysqli_fetch_assoc($resultado)) {
        $mensajes[] = $fila;
    }
    
    // Convertir el array a formato JSON y mostrarlo
    echo json_encode($mensajes);
} else {
    echo "No se encontraron mensajes.";
}

// Cerrar la conexión
mysqli_close($conexion);
?>
