<?php
session_start();
include("../Auxiliares/conecta.php");
include("../usuario/requisitosLogin.php");

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["email"])) {
  // Redirigir al usuario al formulario de inicio de sesión si no ha iniciado sesión
  header("Location: login.php");
  exit();
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
  <title>Perfil de <?php echo $_SESSION["nombre"]; ?></title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <!-- Nav del logo -->

  <header>
    <nav class="navbar navbar-dark bg-dark navbar-expand-md">
      <div class="container-fluid">
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
              <a class="nav-link" href="../Entrenamiento.php">Entrenamiento</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Estadisticas.php">Estadisticas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../SobreNosotros.php">Sobre nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Contacto.php">Contacto</a>
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
                  <li><a class="dropdown-item text-light" href="perfil.php">Perfil</a></li>
                </ul>
              <li class="nav-item">
                <a href="../Auxiliares/logout.php" class="text-decoration-none">
                  <button type="button" class="btn btn-sm btn-outline-danger me-2 rounded-3 d-flex align-items-center">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Cerrar sesion
                  </button>
                </a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a href="../formulario/login.php">
                  <button type="button" class="btn btn-sm btn-outline-primary me-2 rounded-3">
                    Inicia sesión
                  </button>
                </a>
              </li>
              <li class="nav-item">
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

  <div class="container mt-5">
    <div class="row">
      <h5 class="text-bg-dark text-center p-2">Información Personal:</h5>

      <div class="col col-md-6 mt-5">
        <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
        <input type="text" class="form-control mb-2" id="nombre" name="nombre" value="">
        <p><strong>Apellidos:</strong> <?php echo $apellidos; ?></p>
        <input type="text" class="form-control mb-2" id="apellidos" name="apellidos" value="">
        <p><strong>Fecha de Nacimiento:</strong> <?php echo $fechaNacimiento; ?></p>
        <input type="date" class="form-control mb-2" id="fecha_nacimiento" name="fecha_nacimiento" value="">
        <!-- Formulario de carga de foto de perfil -->
        <form action="guardarFoto.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="imagen_perfil" class="form-label ">
              <?php
              // Obtén la ruta de la foto almacenada en la base de datos
              $imagenPerfil = "../upload/"; // Reemplaza con la variable que contiene la ruta de la foto

              // Verifica si la foto existe en la ruta especificada
              if (file_exists($imagenPerfil)) {
                // Muestra la imagen
                echo '<img src="' . $imagenPerfil . '" alt="Foto de perfil">';
              } else {
                // Muestra una imagen por defecto o un mensaje de error
                echo 'Foto de perfil no encontrada';
              }
              ?></label>
            <input type="file" class="form-control" id="imagen_perfil" name="imagen_perfil">
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
      <div class="col col-md-6 mt-5">
        <p><strong>Altura:</strong> <?php echo $altura; ?> cm</p>
        <input type="text" class="form-control mb-2" id="altura" name="altura" value="">
        <p><strong>Peso:</strong> <?php echo $peso; ?> kg</p>
        <input type="text" class="form-control mb-2" id="peso" name="peso" value="">
        <p><strong>Provincia:</strong> <?php echo $provincia; ?></p>
        <input type="text" class="form-control mb-2" id="provincia" name="provincia" value="">
        <p><strong>Población:</strong> <?php echo $poblacion; ?></p>
        <input type="text" class="form-control mb-2" id="poblacion" name="poblacion" value="">

      </div>
    </div>
    <div class="container  d-flex justify-content-center align-items-center mb-5">
      <button type="submit" class="btn btn-success">Guardar cambios <i class="bi bi-check-lg"></i></button>
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