<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Función para obtener todos los mensajes
function obtenerMensajes() {
    global $conn;
    $sql = "SELECT * FROM mensajes";
    $result = $conn->query($sql);
    $mensajes = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $mensajes[] = $row;
        }
    }
    return $mensajes;
}

// Función para insertar un nuevo mensaje
function insertarMensaje($nombre, $correo, $mensaje) {
    global $conn;
    $nombre = $conn->real_escape_string($nombre);
    $correo = $conn->real_escape_string($correo);
    $mensaje = $conn->real_escape_string($mensaje);
    $sql = "INSERT INTO mensajes (nombre, correo, mensaje) VALUES ('$nombre', '$correo', '$mensaje')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Función para eliminar un mensaje por ID
function eliminarMensaje($id) {
    global $conn;
    $sql = "DELETE FROM mensajes WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}
?>
