<?php

include('../db/db.infinity.php');
session_start(); // Iniciar la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Conexión a la base de datos (debes configurar tus propios valores aquí)
    $db = new DbInfinity();
    $conn = $db->conexionDb();

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta para verificar las credenciales del usuario
    $query = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($password == $row["password"]) {
            // Usuario y contraseña válidos
            $_SESSION["email"] = $row["email"];
            $_SESSION["nombre"] = $row["nombre"];
            header("Location: ../../index.php"); // Redirige a la página de inicio
        } else {
            setErrorMessage("Contraseña incorrecta...");
        }
    } else {
        setErrorMessage("El email ingresado no existe...");
    }

    $conn->close();
}

function setErrorMessage($message) {
    $_SESSION["error_message"] = $message; // Almacena el mensaje de error en la sesión
    header("Location: ../../login.php");
    exit();
}
?>