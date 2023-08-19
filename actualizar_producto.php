<?php
    session_start();

    $GLOBALS['title'] = 'Actualizar producto';

    if(!isset($_SESSION['email'])){
        header("Location: index.php");
    } else {
        include('src/template/header-login.php');
    }

    include('src/db/db.infinity.php');

    $db = new DbInfinity();

    if (isset($_GET['id'])) {
        $producto_id = $_GET['id'];
        $producto = $db->traerProducto($producto_id);

        if ($producto && $producto->num_rows > 0) {
            $row = $producto->fetch_assoc();
            $producto_nombre = $row['producto'];
            $descripcion = $row['descripcion'];
            $cantidad = $row['cantidad'];
            $precio = $row['precio_unidad'];
            $imagen = $row['imagen'];
        }
    }
?>

<div class="container text-center my-5">
    <h3>Actualizar Producto</h3>
</div>
<div class="row mb-5">
    <div class="col-3"></div>
    <div class="col-6 my-3">
        <form action="src/actions/actualizar.action.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $producto_id; ?>">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default input-producto">Producto</span>
                <input type="text" class="form-control" id="producto" name="producto"
                    value="<?php echo $producto_nombre; ?>" required>
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Inserte una breve descripción del producto"
                    id="floatingTextarea descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
                <label for="floatingTextarea" id="descripcion" name="descripcion">Descripción</label>
            </div>
            <div class="input-group mb-3 mt-3">
                <span class="input-group-text" id="inputGroup-sizing-default input-cantidad">Cantidad</span>
                <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo $cantidad; ?>"
                    required>
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
            </div>
            <div class="input-group mb-3 mt-3">
                <span class="input-group-text" id="inputGroup-sizing-default input-precio-unidad">Precio
                    unidad</span>
                <input type="number" class="form-control" id="precio" name="precio" value="<?php echo $precio; ?>"
                    required>
            </div>
            <div class="row">
                <button type="submit" class="btn my-1"
                    style="background-color: rgb(199, 67, 117); color: wheat;">Actualizar</button>
                <a href="index.php" class="btn my-1" style="background-color: gold; color:black">Cancelar</a>
            </div>
        </form>
    </div>
    <div class="col-3"></div>
</div>

<?php 
    include('src/template/footer.php')
?>



<?php 
    include('src/template/footer.php')
?>