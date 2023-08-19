<?php
session_start();

$GLOBALS['title'] = 'Productos';

if (!isset($_SESSION['email'])) {
    include('src/template/header.php');
} else {
    include('src/template/header-login.php');
}

include('src/db/db.infinity.php');

$db = new DbInfinity();
$productos = $db->traerProductos();
?>

<!-- Contenido página-->
<div class="container-fluid">
    <div class="row mt-5">
        <h3 class="text-center">Conoce más sobre nosotros</h3>
    </div>
</div>
<div class="card-group m-5">
    <div class="card m-2">
        <img src="assets/img/WhatsApp Image 2023-07-15 at 1.12.08 PM.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Sitio emprender</h5>
            <p class="card-text">Somos punto de fabrica directo te damos los mejores precios del mercado, con el fin
                de que puedas emprender con nosotros.</p>
            <p class="card-text"><small class="text-body-secondary">Batas - Toallas</small></p>
        </div>
    </div>
    <div class="card m-2">
        <div class="card-body">
            <h5 class="card-title">¿Por qué comprar con nosotros?</h5>
            <p class="card-text">Encontrarás gran variedad en productos tales como: pijamas, babuchas, pantuflas,
                batas de baño en toalla.entre otros. Ideales para regalos o comenzar tu emprendimiento, contamos con
                excelente calidad y confección.</p>
            <p class="card-text"><small class="text-body-secondary">Batas con diseños</small></p>
        </div>
        <img src="assets/img/WhatsApp Image 2023-07-15 at 1.12.13 PM.jpeg" class="card-img-top" alt="...">
    </div>
    <div class="card m-2">
        <img src="assets/img/WhatsApp Image 2023-07-15 at 1.12.14 PM (2).jpeg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Calidad</h5>
            <p class="card-text">Todas nuestros productos son fabricados con telas nacionales de excelente calidad.
            </p>
            <p class="card-text"><small class="text-body-secondary">Manejamos todo tipo de personalización</small>
            </p>
        </div>
    </div>
</div>

<div class="container col-8 mb-5">
    <h3 class="py-3 text-center mb-4">Productos registrados
        <?php if (isset($_SESSION['email'])) { ?>
        <a href="agregar_producto.php" style="background-color: rgb(199, 67, 117); color: wheat;"
            class="btn btn-sm ms-2">+<i class="fas fa-plus"></i></a>
        <?php } ?>
    </h3>

    <div class="row">
        <?php
    if ($productos->num_rows > 0) {
        while ($row = $productos->fetch_assoc()) {
    ?>
        <div class="col-md-4 mb-3 d-flex align-items-stretch">
            <div class="card">
                <?php if(!empty($row['imagen'])) { ?>
                <img src="<?php echo $row['imagen']; ?>" class="card-img-top" alt="Producto">
                <?php } ?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['producto']; ?></h5>
                    <p class="card-text"><?php echo $row['descripcion']; ?></p>
                    <p class="card-text">Cantidad: <?php echo $row['cantidad']; ?></p>
                    <p class="card-text">Precio Unidad: <?php echo $row['precio_unidad']; ?></p>

                    <?php if (isset($_SESSION['email'])) { ?>
                    <div class="text-center">
                        <form method="get" action="actualizar_producto.php">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button class="btn btn-sm"
                                style="background-color: rgb(199, 67, 117); color: wheat;  width: 100px;"
                                value="<?php echo $row['id']; ?>">Actualizar</button>
                        </form>
                        <form method="get" action="src/actions/eliminar.action.php">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button class="btn btn-sm mt-2" style="background-color: gold; color:black; width: 100px;"
                                value="<?php echo $row['id']; ?>"
                                onclick="confirmDelete(<?php echo $row['id']; ?>); return false;">Eliminar</button>
                        </form>

                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
        <?php
        }
    } else {
    ?>
        <div class="col-12 text-center my-3">
            <div class="alert alert-danger" role="alert">
                ¡No hay registros en la base de datos!
            </div>
        </div>
        <?php
    }
    ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 
    if(isset($_SESSION['success-message'])){
        if($_SESSION['success-message'] == 0) {
            include('src/template/message.php');
            $_SESSION['success-message'] = 1;
        }
    }
    include('src/template/contacto.php');
    include('src/template/footer.php');
?>

<script>
function confirmDelete(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción eliminará el producto',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'rgb(199, 67, 117)',
        cancelButtonColor: 'gold',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'src/actions/eliminar.action.php?id=' + id;
        }
    });
}
</script>