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
  <title>MadoFit</title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="js/ScrollNav.js"></script>

  <!-- Nav del logo -->

  <header>
    <nav class="navbar navbar-dark bg-dark navbar-expand-md fixed-top visible">
      <div class="container">
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
              <a class="nav-link" href="Navegacion/Entrenamiento.php">Entrenamiento</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Navegacion/Estadisticas.php">Estadisticas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Navegacion/SobreNosotros.php">Sobre nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Navegacion/Contacto.php">Contacto</a>
            </li>
          </ul>
        </div>
        <div class="collapse navbar-collapse ms-auto justify-content-center col-md-3 navbar-collapse-3">
          <ul class="navbar-nav justify-content-center align-items-center">
            <?php if (isset($_SESSION["nombre"])) { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo $_SESSION["nombre"] ?>
                </a>
                <ul class="dropdown-menu text-bg-dark w-100" aria-labelledby="profileDropdown">
                  <li><a class="dropdown-item text-light" href="usuario/perfil.php">Perfil</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="Auxiliares/logout.php" class="text-decoration-none">
                  <button type="button" class="btn btn-sm btn-outline-danger rounded-3 d-flex align-items-center">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Cerrar sesión
                  </button>
                </a>
              </li>
            <?php } else { ?>
              <li class="nav-item pb-3 ps-2 ps-md-0 pb-md-0 text-center">
                <a href="formulario/login.php">
                  <button type="button" class="btn btn-sm btn-outline-primary me-2 rounded-3">
                    Iniciar sesión
                  </button>
                </a>
              </li>
              <li class="nav-item pb-3 ps-3 ps-md-0 pb-md-0 text-center">
                <a href="formulario/register.php">
                  <button type="button" class="btn btn-sm btn-primary me-3 rounded-3">Registrarse</button>
                </a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- Nav del logo -->

  <!--Carousel-->
  <div class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active c-item" data-bs-interval="6000">
        <img src="fotos/carousel1.jpg" class="d-block w-100 c-img" alt="...">
      </div>
      <div class="carousel-item c-item" data-bs-interval="6000">
        <img src="fotos/carousel2.jpg" class="d-block w-100 c-img" alt="...">
      </div>
      <div class="carousel-item c-item" data-bs-interval="6000">
        <img src="fotos/carousel3.jpg" class="d-block w-100 c-img" alt="...">
      </div>
    </div>
  </div>
  <!--Carousel-->

  <div class="container-fluid bg-light border-bottom ">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-lg-2 col-md-4 col-sm-4 d-flex flex-column align-items-center p-4">
        <a href="https://www.adidas.es">
          <img src="fotos/Marcas/adidas.png" width="100" class="img-fluid imagen-blanco-negro imagen-zoom" alt="adidas">
        </a>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 d-flex flex-column align-items-center p-4">
        <a href="https://www.asics.com/es/">
          <img src="fotos/Marcas/asics-logo.png" width="100" class="img-fluid imagen-blanco-negro imagen-zoom" alt="asics">
        </a>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 d-flex flex-column align-items-center p-4">
        <a href="https://www.prozis.com/es/es">
          <img src="fotos/Marcas/prozis.png" width="100" class="img-fluid imagen-blanco-negro imagen-zoom" alt="prozis">
        </a>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 d-flex flex-column align-items-center p-4">
        <a href="https://www.underarmour.es/es-es/">
          <img src="fotos/Marcas/armour.png" width="100" class="img-fluid imagen-blanco-negro imagen-zoom" alt="armour">
        </a>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 d-flex flex-column align-items-center p-4">
        <a href="https://www.amix.es">
          <img src="fotos/Marcas/LOGO-AMIX.png" width="100" class="img-fluid imagen-blanco-negro imagen-zoom" alt="amix">
        </a>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 d-flex flex-column align-items-center p-4">
        <a href="https://www.kappa.es">
          <img src="fotos/Marcas/logo-Kappa.png" width="100" class="img-fluid imagen-blanco-negro imagen-zoom" alt="kappa">
        </a>
      </div>
    </div>
  </div>



  <div class="container">
    <div class="text-center rounded text-light azul py-4 m-5">
      <h1 class="display-6 d-none ">Ejercicios <br> MadoFit</h1>
      <h1 class="display-6 d-md-block">Ejercicios MadoFit</h1>
      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-chevron-bar-down" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M3.646 4.146a.5.5 0 0 1 .708 0L8 7.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zM1 11.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z" />
      </svg>
    </div>
    <div class="row gx-4 d-flex justify-content-center align-content-center text-center px-5 pt-5">
      <div class="col-md-4 shadow p-3 mb-5 bg-body rounded-5">
        <img src="fotos/inicio.jpg" class="img-fluid" alt="Ejercicios">
        <h5 class="lead">Variedad de ejercicios</h5>
        <p class="text-muted">Define tu objetivo y selecciona el programa perfecto para lograrlo.
        </p>
      </div>
      <div class="col-md-4 shadow p-3 mb-5 bg-body rounded-5 pos">
        <img src="fotos/inicio1.jpg" class="img-fluid" alt="Progreso">
        <h5 class="lead">Controla tu progreso</h5>
        <p class="text-muted">Sólo lo que se mide se mejora. Lleva seguimiento de tu calendario, récords y
          resultados en
          un mismo lugar.
        </p>
      </div>
      <div class="col-md-4 shadow p-3 mb-5 bg-body rounded-5">
        <img src="fotos/inicio2.jpg" class="img-fluid" alt="Rutina perfecta">
        <h5 class="lead">Ejercicio en casa</h5>
        <p class="text-muted">Tienes todo para lograr tus objetivos en casa; el calentamiento, la música y los
          movimientos.
        </p>
      </div>
    </div>
    <div class="d-flex justify-content-center align-content-center m-4">
      <a href="formulario/login.php">
        <button type="button" class="btn btn-primary rounded-5">Comienza hoy</button>
      </a>
    </div>
  </div>


  <div class="container-fluid bg-light my-5 p-5">
    <div class="container">
      <div class="row d-flex justify-content-start align-items-center">
        <div class="col-md-6 col-sm-12 text-center order-1 pt-5 pt-md-0">
          <img src="fotos/Cuidatucuerpo.png" class="img-fluid rounded-2" width="500" alt="cuida tu cuerpo">
        </div>
        <div class="col col-md-6 col-sm-12 order-md-2">
          <h2 class="fw-bold">CUIDA TU <span class="text-primary">CUERPO</span></h2><br>
          <p class="lh-base"><i class="bi bi-forward-fill fs-5"></i> Haz ejercicio donde quieras y cuando
            quieras<br><br>
            <i class="bi bi-forward-fill fs-5"></i> Ahorra tiempo con rutinas de 10 a 30 minutos<br><br>
            <i class="bi bi-forward-fill fs-5"></i> Un programa de ejercicio físico adaptado a tus necesidades y
            constancia en tus hábitos <br><br>
            <i class="bi bi-forward-fill fs-5"></i> Para todos los <strong>objetivos y niveles</strong>
          </p>
          <div class="d-flex justify-content-center align-items-center pt-4">
            <a href="formulario/login.php">
              <button type="button" class="btn btn-primary rounded-5">Comienza hoy</button>
            </a>
          </div>
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