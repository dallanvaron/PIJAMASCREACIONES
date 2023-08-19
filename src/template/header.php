<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $GLOBALS['title']?> | Pijameria Infinity's</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <!-- Navegador -->
        <nav class="navbar navbar-expand-lg" style="background-color: rgb(199, 67, 117); font-size: 1.3rem;">
            <div class="container-fluid">
                <nav class="navbar" style="background-color: rgb(199, 67, 117);">
                    <div class="container-fluid">
                        <a class="navbar-brand text-light " href="index.php">
                            <img src="assets/img/logoooo.png" alt="Logo" width="170" height="120"
                                class="d-inline-block align-text-top">
                        </a>
                        <div class="text-light">Pijameria Infinity's</div>
                    </div>
                </nav>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation" data-bs-theme="dark">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <!-- Utilizando la clase ms-auto -->
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="index.php#quienes-somos">Quienes somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="productos.php">Nuestros productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="login.php">Ingresa</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>