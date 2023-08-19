<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../db/db.infinity.php');

    $db = new DbInfinity();
    $conn = $db->conexionDb();

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $productosInteres = $_POST["productos-interes"];

    $db->insertarCliente($nombre, $correo, $telefono, $productosInteres);

    $conn->close();

    $_SESSION['success-message'] = 0;
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);

} else {
    echo "Error al procesar el formulario.";
}
?>