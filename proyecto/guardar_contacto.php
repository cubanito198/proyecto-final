<?php
$servername = "localhost";
$username = "hola"; // Cambia esto si tu usuario de MySQL es diferente
$password = "hola"; // Cambia esto si tienes una contraseña para MySQL
$dbname = "contacto";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['mensaje'])) {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $mensaje = mysqli_real_escape_string($conn, $_POST['mensaje']);

    $sql = "INSERT INTO mensajes (nombre, correo, mensaje) VALUES ('$nombre', '$correo', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        sleep(3);
        header('Location: index.html'); // Redirigir al inicio después de enviar el mensaje
        exit(); // Asegurarse de que no se ejecute más código después de la redirección
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Faltan datos del formulario.";
}

    $conn->close();

?>
