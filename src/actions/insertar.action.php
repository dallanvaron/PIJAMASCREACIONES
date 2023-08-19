<?php

session_start();

if(!isset($_SESSION['email'])){
    header('Location: ../../productos.php');
}

    include('../db/db.infinity.php');

    $db = new DbInfinity();

    $producto = $_POST['producto'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen_name = $_FILES['imagen']['name'];
        $imagen_tmp = $_FILES['imagen']['tmp_name'];

        $imagen_path = '../../assets/img/media/' . $imagen_name;

        move_uploaded_file($imagen_tmp, $imagen_path);

        $db->insertarProducto($producto, $descripcion, $cantidad, $precio, $imagen_path);
    } else {
        $db->insertarProducto($producto, $descripcion, $cantidad, $precio);
    }

    header('Location: ../../productos.php');
?>