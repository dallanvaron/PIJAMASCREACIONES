<?php
    session_start();

    $GLOBALS['title'] = 'Inicio';

    if(!isset($_SESSION['email'])){
        include('src/template/header.php');
    } else {
        include('src/template/header-login.php');
    }
    
?>

<!-- Contenedor carrusel -->
<div class="container-fluid test row mt-4">
    <div class="col-2"></div>
    <div class="col-8">
        <div id="carouselExampleDark" class="carousel carousel-dark slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="assets/img/Logo poni con redes.jpeg" class="d-block w-100" alt="..."
                        style="height: 550px;">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="assets/img/Pantuflas.jpeg" class="d-block w-100" alt="..." style="height: 550px;">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/Pijamas termicas.jpeg" class="d-block w-100" alt="..." style="height: 550px;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>
    <div class="col-2"></div>
</div>

<!-- Contenedor texto-->
<div class="container-fluid" id="quienes-somos">
    <h3 class="text-center pt-5">¿Quiénes somos?</h3>
    <div class="row">
        <div class="col-6 p-5">
            <p>
                Somos una empresa la cual está dedicada en el campo textil en base a la producción y
                comercialización de pijamas, babuchas, batas de baño y mucho más...
            </p>
        </div>
        <div class="col-6 p-5">
            <p>
                Creaciones inifinity's inicio por la necesidad familiar mediante la pandemia COVID 19, a inicios del
                año 2020, ya que como las personas no podían salir de sus casas por contagio, las ventas en
                modalidad virtual tuvo mayor impulso generando herramientas importantes en cuanto la
                comercialización.
            </p>
        </div>
    </div>
</div>

<!-- Seccion imagen pijama-->
<div class="container-fluid mb-4">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <img src="assets/img/La vida es prueba.jpg" alt="La vida es mejor en pijama" style="width: 100%">
        </div>
        <div class="col-3"></div>
    </div>
</div>

<!-- Sección mision y visión -->

<div class="container-fluid">
    <div class="row">
        <div class="col-6 p-5">
            <h4>Misión</h4>
            <p>
                Elaborar productos textiles de alta calidad con el fin de satisfacer las necesidades de nuestros
                clientes.

            </p>
        </div>
        <div class="col-6 p-5">
            <h4>Visión</h4>
            <p>
                impulsar el uso de nuestros productos llevando consigo la variedad de modelos al máximo de sitios
                posibles con el fin de darnos a conocer cada día más por nuestros productos y calidad.
            </p>
        </div>
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