<?php
session_start();
include("../../Auxiliares/conecta.php");

// Realiza la conexión a la base de datos (reemplaza los valores con los tuyos)
$mysqli = new mysqli("localhost", "debianDB", "debianDB", "MadoFit");

// Verifica si ocurrió algún error en la conexión
if ($mysqli->connect_error) {
  die("Error en la conexión: " . $mysqli->connect_error);
}

// Obtén el valor del parámetro grupoMuscular
$grupoMuscular = $_GET['grupoMuscular'];

// Prepara la consulta utilizando una sentencia preparada para evitar ataques de inyección SQL
$sql = "SELECT nombre FROM ejercicios WHERE grupo_muscular = ?";

// Prepara la sentencia
$stmt = $mysqli->prepare($sql);

// Verifica si ocurrió algún error en la preparación de la sentencia
if (!$stmt) {
  die("Error en la preparación de la consulta: " . $mysqli->error);
}

// Vincula el parámetro y ejecuta la consulta
$stmt->bind_param("s", $grupoMuscular);
$stmt->execute();

// Obtiene los resultados de la consulta
$result = $stmt->get_result();

// Cierra la conexión y libera los recursos
$stmt->close();
$mysqli->close();

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../style.css">
  <link rel="icon" href="../../fotos/logosolo.png">
  <title>Pecho</title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


  <!-- Nav del logo -->

  <header>
    <nav class="navbar navbar-dark bg-dark navbar-expand-md">
      <div class="container-fluid">
        <div class="col-1 text-left pl-md-0 ">
          <a href="../../Inicio.php">
            <img src="../../fotos/logosolo.png" width="60" height="60" alt="logo">
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse-3" aria-controls="navbarNav6" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-start col-md-7 navbar-collapse-3">
          <ul class="navbar-nav justify-content-center align-items-md-center text-center">
            <li class="nav-item active">
              <a class="nav-link" href="../../Inicio.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../Entrenamiento.php">Entrenamiento</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../Estadisticas.php">Estadisticas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../SobreNosotros.php">Sobre nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../Contacto.php">Contacto</a>
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
                  <li><a class="dropdown-item text-light" href="../../usuario/perfil.php">Perfil</a></li>
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
                <a href="../../formulario/login.php">
                  <button type="button" class="btn btn-sm btn-outline-primary me-2 rounded-3">
                    Inicia sesión
                  </button>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../formulario/register.php">
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

  <!-- Migas de pan -->
  <div style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb ms-5 me-3 mt-4 text-center">
      <li class="breadcrumb-item"><a href="../../Inicio.php"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="dark" class="bi bi-house-door-fill mb-1" viewBox="0 0 16 16">
            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
          </svg></a></li>
      <li class="breadcrumb-item"><a href="../../Entrenamiento.php" class="text-decoration-none text-dark">Entrenamiento</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo isset($grupoMuscular) ? $grupoMuscular : "Grupo Muscular"; ?></li>
    </ol>
  </div>
  <!-- Migas de pan -->


  <div class="container p-5">
    <div class="row align-items-center">
      <div class="col-lg-4 col-md-12 d-flex justify-content-center mb-3 mb-md-0">
        <?php
        if (isset($_GET['grupoMuscular'])) {
          $nombreGrupoMuscular = $_GET['grupoMuscular'];

          // Construye la ruta de la foto del grupo muscular
          $rutaFotoGrupoMuscular = "../../fotos/Grupo Muscular/" . $nombreGrupoMuscular . ".png";

          // Verifica si la foto del grupo muscular existe en la carpeta
          if (file_exists($rutaFotoGrupoMuscular)) {
            echo '<img src="' . $rutaFotoGrupoMuscular . '" alt="' . $nombreGrupoMuscular . '" class="img-fluid">';
          } else {
            echo 'Foto del grupo muscular no encontrada.';
          }
        } else {
          echo 'Grupo muscular no seleccionado.';
        }
        ?>
      </div>
      <div class="col-lg-8 col-md-12 ps-md-5 pt-5 pt-md-0">
        <?php
        // Verifica si se encontraron resultados
        if ($result->num_rows > 0) {
          $counter = 1;

          // Itera sobre los resultados y muestra los nombres de los ejercicios en forma de fila
          while ($row = $result->fetch_assoc()) {
            $idEjercicio = $row['id_ejercicio'];
            $nombreEjercicio = $row['nombre'];

            // Agrega el enlace con el nombre del ejercicio en una columna de la fila
            echo '<div class="col-sm-7 pt-3"><h6><a href="../Ejercicios/Guia/Ejercicios_musculo.php?id_ejercicio=1' . $idEjercicio . '" class="ejercicio-link">' . $counter . '. ' . $nombreEjercicio . '</a></h6></div>';

            // Incrementa el contador
            $counter++;
          }
        } else {
          echo "No se encontraron ejercicios para el grupo muscular seleccionado.";
        }
        ?>
      </div>
    </div>
  </div>






  <footer class="bg-dark text-white d-flex flex-column align-items-center justify-content-center">

    <div class="container p-1">
      <div class="row my-4">

        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
          <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 130px; height: 130px;">
            <img src="../../fotos/logosolo.png" height="100" alt="" loading="lazy" />
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