<?php
    session_start();
    
    $GLOBALS['title'] = 'Login';

    if(!isset($_SESSION['email'])){
        include('src/template/header.php');
    } else {
        header("Location: index.php");
    }
    
?>


<div class="container my-5">
    <div class="row vh-95 justify-content-center align-items-center">
        <div class="col-md-6 col-lg-4 my-5">
            <?php
            if (isset($_SESSION["error_message"])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION["error_message"] . '</div>';
                unset($_SESSION["error_message"]); // Limpia el mensaje de error de la sesión
            }
            ?>
            <div class="text-center mb-4">
                <h3>Ingresa con tu usuario</h3>
            </div>
            <form action="src/actions/login.action.php" method="post">
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary border-0"
                        style="background-color: rgb(199, 67, 117); color: wheat;">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php 
    include('src/template/footer.php')
?>