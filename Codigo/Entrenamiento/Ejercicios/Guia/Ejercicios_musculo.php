<?php
session_start();
include("../../../Auxiliares/conecta.php");

if (!isset($_SESSION['email'])) {
  header('Location: ../../../formulario/login.php');
  exit;
} else {
  // ¡Muestra la página a los usuarios!
}

// Verificar si se proporcionó el parámetro id_ejercicio en la URL
if (!isset($_GET['id_ejercicio'])) {
  echo "No se proporcionó el ID del ejercicio.";
  exit;
}

// Obtener el ID del ejercicio desde la URL
$idEjercicio = $_GET['id_ejercicio'];

// Preparar la consulta SQL utilizando una sentencia preparada para evitar la inyección de SQL
$sql = "SELECT nombre, descripcion, grupo_muscular, equipo_necesario, imagen FROM ejercicios WHERE id_ejercicio = ?";
$stmt = $conn->prepare($sql);

// Verificar si ocurrió un error al preparar la consulta
if (!$stmt) {
  echo "Ocurrió un error al preparar la consulta: " . $conn->error;
  exit;
}

$stmt->bind_param("i", $idEjercicio);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
  // Obtener los detalles del ejercicio y asignarlos a las variables correspondientes
  $row = $resultado->fetch_assoc();
  $nombre = $row['nombre'];
  $descripcion = $row['descripcion'];
  $grupoMuscular = $row['grupo_muscular'];
  $equipoNecesario = $row['equipo_necesario'];
  $imagen = $row['imagen'];
}

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../../style.css">
  <link rel="icon" href="../../../fotos/logosolo.png">
  <title><?php echo htmlspecialchars($nombre) ?></title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


  <!-- Nav del logo -->

  <header>
    <nav class="navbar navbar-dark bg-dark navbar-expand-md">
      <div class="container">
        <div class="col-1 text-left pl-md-0 ">
          <a href="../../../Inicio.php">
            <img src="../../../fotos/logosolo.png" width="60" height="60" alt="logo">
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse-3" aria-controls="navbarNav6" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-start col-md-7 navbar-collapse-3">
          <ul class="navbar-nav justify-content-center align-items-md-center text-center">
            <li class="nav-item active">
              <a class="nav-link" href="../../../Inicio.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../../Navegacion/Entrenamiento.php">Entrenamiento</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../../Navegacion/Estadisticas.php">Estadisticas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../../Navegacion/SobreNosotros.php">Sobre nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../../Navegacion/Contacto.php">Contacto</a>
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
                  <li><a class="dropdown-item text-light" href="../../../usuario/perfil.php">Perfil</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="../../../Auxiliares/logout.php" class="text-decoration-none">
                  <button type="button" class="btn btn-sm btn-outline-danger rounded-3 d-flex align-items-center">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Cerrar sesión
                  </button>
                </a>
              </li>
            <?php } else { ?>
              <li class="nav-item pb-3 ps-2 ps-md-0 pb-md-0 text-center">
                <a href="../../../formulario/login.php">
                  <button type="button" class="btn btn-sm btn-outline-primary me-2 rounded-3">
                    Iniciar sesión
                  </button>
                </a>
              </li>
              <li class="nav-item pb-3 ps-3 ps-md-0 pb-md-0 text-center">
                <a href="../../../formulario/register.php">
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

  <!-- Migas de pan -->
  <div style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb ms-5 me-3 mt-4">
      <li class="breadcrumb-item"><a href="../../../Inicio.php"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="dark" class="bi bi-house-door-fill mb-1" viewBox="0 0 16 16">
            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
          </svg></a></li>
      <li class="breadcrumb-item"><a href="../../../Navegacion/Entrenamiento.php" class="text-decoration-none text-dark">Entrenamiento</a></li>
      <li class="breadcrumb-item"><a href="../../../Entrenamiento/Ejercicios/Grupo_muscular.php?grupoMuscular=<?php echo $grupoMuscular ?>" class="text-decoration-none text-dark"><?php echo $grupoMuscular ?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($nombre); ?></li>
    </ol>
  </div>
  <!-- Migas de pan -->
  <header>
    <div class="container azul">
      <section class="text-center p-3">
        <h2><?php echo htmlspecialchars($nombre); ?></h2>
      </section>
    </div>
    <div class="text-center">
      <img src="<?php echo '../../../fotos/Ejercicios/' . $grupoMuscular . '/' . $imagen; ?>" class="img-fluid" alt="<?php echo $nombre; ?>">
    </div>
    </div>
  </header>

  <div class="container azul">
    <h2 class="text-center p-3">Guía para realizar el ejercicio</h2>
  </div>
  <div class="container mb-5 pb-5">
    <div class="row">
      <div class="col-md-8 col-lg-6">
        <div>
          <h4>Posición inicial y ejecución</h4>
          <p><?php echo nl2br(htmlspecialchars($descripcion)); ?></p>
        </div>
      </div>
      <div class="col-md-4 col-lg-6 d-flex justify-content-sm-start justify-content-md-end">
        <div>
          <h4 class="pt-3">Equipo Necesario</h4>
          <span><?php echo htmlspecialchars($equipoNecesario); ?></span>
          <h4 class="pt-3">Músculos principales</h4>
          <span><?php echo htmlspecialchars($grupoMuscular); ?></span>
        </div>
      </div>
    </div>
  </div>

  <footer class="bg-dark text-white d-flex flex-column align-items-center justify-content-center">

    <div class="container p-1">
      <div class="row my-4">

        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
          <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 130px; height: 130px;">
            <img src="../../../fotos/logosolo.png" height="100" alt="" loading="lazy" />
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