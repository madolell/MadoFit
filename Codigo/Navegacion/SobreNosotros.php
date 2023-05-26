<?php
session_start();
include("../Auxiliares/conecta.php");

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
  <link rel="stylesheet" href="../style.css">
  <link rel="icon" href="../fotos/logosolo.png">
  <title>Sobre Nosotros</title>
</head>

<body class="bg-light">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


  <!-- Nav del logo -->

  <header>
    <nav class="navbar navbar-dark bg-dark navbar-expand-md">
      <div class="container">
        <div class="col-1 text-left pl-md-0 ">
          <a href="../Inicio.php">
            <img src="../fotos/logosolo.png" width="60" height="60" alt="logo">
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse-3" aria-controls="navbarNav6" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-start col-md-7 navbar-collapse-3">
          <ul class="navbar-nav justify-content-center align-items-md-center text-center">
            <li class="nav-item active">
              <a class="nav-link" href="../Inicio.php">Inicio</a>
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
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION["nombre"] ?>
                </a>
                <ul class="dropdown-menu text-bg-dark w-100" aria-labelledby="profileDropdown">
                  <li><a class="dropdown-item text-light" href="../usuario/perfil.php">Perfil</a></li>
                </ul>
              <li class="nav-item">
                <a href="../Auxiliares/logout.php" class="text-decoration-none">
                  <button type="button" class="btn btn-sm btn-outline-danger rounded-3 d-flex align-items-center">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Cerrar sesion
                  </button>
                </a>
              </li>
            <?php } else { ?>
              <li class="nav-item pb-3 ps-2 ps-md-0 pb-md-0 text-center">
                <a href="../formulario/login.php">
                  <button type="button" class="btn btn-sm btn-outline-primary me-2 rounded-3">
                    Inicia sesión
                  </button>
                </a>
              </li>
              <li class="nav-item pb-3 ps-3 ps-md-0 pb-md-0 text-center">
                <a href="../formulario/register.php">
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

  <section id="sobre-nosotros" class="py-5 m-5">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-9   col-lg-6">
        <h2>Sobre Nosotros</h2>
        <p class="lead">En MadoFit nos dedicamos a ayudar a las personas a mejorar su salud y bienestar a través de la práctica de ejercicios físicos.</p>
        <p>Desde nuestra fundación en 2023, hemos estado comprometidos con nuestro objetivo de brindar a nuestros clientes un ambiente acogedor y motivador, donde puedan alcanzar sus metas y mejorar su calidad de vida.</p>
        <p>Nuestro equipo de entrenadores altamente capacitados está aquí para guiarlo y apoyarlo en cada paso del camino, ofreciéndole planes de entrenamiento personalizados para que pueda alcanzar su máximo potencial.</p>
      </div>
      <div class="col-md-auto col-lg-6 d-flex justify-content-center">
        <img src="../fotos/logoblancoynegro-removebg-preview.png" class="img-fluid" alt="Gimnasio MadoFit">
      </div>
    </div>
  </div>
</section>

<div class="container-fluid p-5 text-light azul">
  <div class="row d-flex justify-content-center align-items-center">
    <div class="col-12 col-md-2 text-center text-md-end">
      <img src="../fotos/ceo.jpg" class="img-fluid rounded-circle" width="120px" alt="CEO">
    </div>
    <div class="col-12 col-md-6 mt-4 mt-md-0 text-center">
      <h4>Alejandro Madolell Berrocal</h4>
      <span class="lead fs-6">Developer web <br> CEO de MadoFit</span>
    </div>
  </div>
</div>




  <footer class="bg-dark text-white d-flex flex-column align-items-center justify-content-center">

    <div class="container p-1">
      <div class="row my-4">

        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
          <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 130px; height: 130px;">
            <img src="../fotos/logosolo.png" height="100" alt="" loading="lazy" />
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