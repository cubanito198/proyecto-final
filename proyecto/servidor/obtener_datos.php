<?php
// Establecer la conexión con la base de datos
$conexion = mysqli_connect("localhost", "hola", "hola", "contacto");

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Consulta para obtener todos los registros de la tabla 'mensajes'
$sql = "SELECT * FROM mensajes";
$resultado = mysqli_query($conexion, $sql);

// Verificar si se encontraron registros
if (mysqli_num_rows($resultado) > 0) {
    // Inicializar un array para almacenar los datos
    $datos = array();

    // Recorrer los resultados y añadirlos al array
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $datos[] = $fila;
    }

    // Enviar los datos como respuesta en formato JSON
    echo json_encode($datos);
} else {
    // Si no se encontraron registros, enviar una respuesta vacía
    echo json_encode(array());
}

// Cerrar la conexión
mysqli_close($conexion);
?>
