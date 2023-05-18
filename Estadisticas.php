<?php
session_start();
include("Auxiliares/conecta.php");
// Comprobar si hay un mensaje almacenado en la variable de sesión
if (isset($_SESSION["mensaje"])) {
  echo $_SESSION["mensaje"];

  // Eliminar el mensaje de la variable de sesión para que no se muestre nuevamente en futuras visitas a la página
  unset($_SESSION["mensaje"]);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="fotos/logosolo.png">
  <title>Estadisticas</title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="ScrollNav.js"></script>

  <!-- Nav del logo -->

  <header>
    <nav class="navbar navbar-dark bg-dark navbar-expand-md fixed-top visible">
      <div class="container-fluid">
        <div class="col-1 text-left pl-md-0 ">
          <a href="Inicio.php">
            <img src="fotos/logosolo.png" width="60" height="60" alt="logo">
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse-3" aria-controls="navbarNav6" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-start col-md-7 navbar-collapse-3">
          <ul class="navbar-nav justify-content-center align-items-md-center text-center">
            <li class="nav-item active">
              <a class="nav-link" href="Inicio.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Entrenamiento.php">Entrenamiento</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Estadisticas.php">Estadisticas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="SobreNosotros.php">Sobre nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Contacto.php">Contacto</a>
            </li>
          </ul>
        </div>
        <div class="collapse navbar-collapse ms-auto justify-content-center col-md-3 navbar-collapse-3">
          <ul class="navbar-nav justify-content-center align-items-center">

            <?php if (isset($_SESSION["nombre"])) { ?>
              <li class="nav-item dropdown me-3">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Bienvenido, <?php echo $_SESSION["nombre"]; ?>
                </a>
                <ul class="dropdown-menu text-bg-dark w-100" aria-labelledby="profileDropdown">
                  <li><a class="dropdown-item text-light" href="usuario/perfil.php">Perfil</a></li>
                </ul>
              <li class="nav-item">
                <a href="Auxiliares/logout.php" class="text-decoration-none">
                  <button type="button" class="btn btn-sm btn-outline-danger me-2 rounded-3 d-flex align-items-center">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Cerrar sesion
                  </button>
                </a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a href="formulario/login.php">
                  <button type="button" class="btn btn-sm btn-outline-primary me-2 rounded-3">
                    Inicia sesión
                  </button>
                </a>
              </li>
              <li class="nav-item">
                <a href="formulario/register.php">
                  <button type="button" class="btn btn-sm btn-primary me-3 rounded-3">Registrarse
                  </button>
                </a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- Nav del logo -->

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href=""
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Estadisticas</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="Estadisticas/RegistroEstadisticas.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi bi-calendar-event"></i> <span
                                    class="ms-1 d-none d-sm-inline">Registrar estadisticas</span>
                            </a>
                        </li>
                        <li>
                            <a href="Estadisticas/EstablecerObjetivos.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi bi-calendar2-check"></i> <span
                                    class="ms-1 d-none d-sm-inline">Establecer objetivos</span>
                            </a>
                        </li>
                        <li>
                            <a href="Estadisticas/HistorialProgreso.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi bi-bar-chart-line-fill"></i> <span
                                    class="ms-1 d-none d-sm-inline">Historial de progreso</span>
                            </a>
                        </li>
                    </ul>
                    <hr>

                </div>
            </div>
            <div class="col py-3 text-bg-light">
               <div class="container">
                  
               </div>
            </div>
        </div>
    </div>


    <footer class="bg-dark text-white d-flex flex-column align-items-center justify-content-center">

<div class="container p-1">
  <div class="row my-4">

    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
      <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 130px; height: 130px;">
        <img src="fotos/logosolo.png" height="100" alt="" loading="lazy" />
      </div>
      <h4 class="text-center">MadoFit</h4>
    </div>

    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
      <h5 class="text-uppercase mb-4 text-center">Contacto</h5>
      <ul class="list-unstyled text-center">
        <li>
          <p><i class="bi bi-geo-alt-fill pe-2"></i>Melilla</p>
        </li>
        <li>
          <p><i class="bi bi-phone pe-2"></i>651795733</p>
        </li>
        <li>
          <p><i class="bi bi-envelope pe-2 mb-0"></i>aleyrodi@hotmail.es</p>
        </li>
      </ul>
    </div>

  </div>
</div>

<div class="container-fluid text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
  © 2023 Copyright:
  <a class="text-white" href="https://MadoFit.com/">MadoFit.com</a>
</div>

</footer>
</body>

</html>