<?php
    session_start();

    $GLOBALS['title'] = 'Agregar Producto';

    if(!isset($_SESSION['email'])){
        header("Location: index.php");
    } else {
        include('src/template/header-login.php');
    }
    
?>

<div class="container text-center my-5">
    <h3>Gestión de productos</h3>
</div>
<div class="row mb-5">
    <div class="col-3"></div>
    <div class="col-6 my-3">
        <form action="src/actions/insertar.action.php" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default input-producto">Producto</span>
                <input type="text" class="form-control" id="producto" name="producto" required>
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Inserte una breve descripción del producto"
                    id="floatingTextarea descripcion" name="descripcion"></textarea>
                <label for="floatingTextarea" id="descripcion" name="descripcion" required>Descripción</label>
            </div>
            <div class="input-group mb-3 mt-3">
                <span class="input-group-text" id="inputGroup-sizing-default input-cantidad">Cantidad</span>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
            </div>
            <div class="input-group mb-3 mt-3">
                <span class="input-group-text" id="inputGroup-sizing-default input-precio-unidad">Precio
                    unidad</span>
                <input type="number" class="form-control" id="precio" name="precio" required>
            </div>
            <div class="row">
                <button type="submit" class="btn my-1"
                    style="background-color: rgb(199, 67, 117); color: wheat;">Guardar</button>
                <button type="reset" class="btn my-1" style="background-color: gold; color:black">Limpiar</button>
            </div>
        </form>
    </div>
    <div class="col-3"></div>
</div>

<?php 
    include('src/template/footer.php')
?>