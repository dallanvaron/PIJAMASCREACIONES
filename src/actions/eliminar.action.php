<?php

session_start();

if (!isset($_SESSION['email'])) {
    header('Location: ../../productos.php');
}

include('../db/db.infinity.php');

$db = new DbInfinity();

$id = $_GET['id'];

$db->eliminarProducto($id);

header('Location: ../../productos.php');

?>