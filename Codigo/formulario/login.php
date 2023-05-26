<?php
session_start();
include('../Auxiliares/conecta.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../formulario/login.css">
    <link rel="icon" href="../fotos/logosolo.png">
    <title>Inicia sesión</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <div class="background-image overflow-hidden login_margin">
        <div class="container px-5 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 d-none d-lg-block mb-5 mb-lg-0 " id="demoObject" style="z-index: 10">
                    <h1 class="my-2 text-xl-center">
                        <img src="../fotos/logonegroyblanco-removebg-preview.png" class="img-fluid" alt="logo">
                    </h1>
                    <p class="text-light text-center">
                        ¿Quieres conseguir tus objetivos? Este es el lugar, registrate y comienza ahora.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card bg-glass ">
                        <div class="card-body px-4 py-5 px-md-5">
                            <?php if (isset($_SESSION["mensajeError"])) : ?>
                                <div class="alert alert-danger text-center" id="mensaje-error">
                                    <?php
                                    echo $_SESSION["mensajeError"];
                                    unset($_SESSION["mensajeError"]);
                                    ?>
                                </div>
                            <?php endif; ?>
                            <!-- Formulario de inicio de sesión -->
                            <form method="POST" action="../Auxiliares/logeo.php">
                                <div class="row">
                                    <!-- Email -->
                                    <div class="form-outline mb-4">
                                        <input class="form-control" type="email" id="email" name="email" required />
                                        <label class="form-label" for="email">Correo electrónico</label>
                                    </div>

                                    <!-- Password -->
                                    <div class="form-outline mb-4">
                                        <input class="form-control" type="password" id="password" name="password" required />
                                        <label class="form-label" for="password">Contraseña</label>
                                    </div>

                                    <!-- Submit -->
                                    <button type="submit" value="Iniciar sesión" class="btn btn-dark btn-block mb-5">
                                        Iniciar sesión
                                    </button>

                                    <div>
                                        <p>¿No tienes una cuenta todavia? <a href="../formulario/register.php" class="text-dark fw-bold">Registrate</a></p>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>